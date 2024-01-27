<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    $fname = $data->fname;
    $lname = $data->lname;
    $email = $data->email;
    $subject = $data->subject;
    $message = $data->message;

    // Simple validation (you may want to add more robust validation)
    if (!$fname || !$lname || !$email || !$subject || !$message) {
        http_response_code(400);
        echo json_encode(array("message" => "Incomplete form data. Please fill in all fields."));
        exit;
    }

    // Customize the email content
    $emailContent = "First Name: $fname\n";
    $emailContent .= "Last Name: $lname\n";
    $emailContent .= "Email: $email\n";
    $emailContent .= "Subject: $subject\n";
    $emailContent .= "Message:\n$message";

    // Customize your email headers
    $headers = "From: $email";

    // Your email address where the form submissions will be sent
    $to = "reddyrewat2103@gmail.com";

    // Use mail() function to send an email
    if (mail($to, "New Contact Form Submission", $emailContent, $headers)) {
        echo json_encode(array("message" => "Message sent successfully"));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Error sending the message. Please try again later."));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}

?>
