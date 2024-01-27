function sendEmail() {
    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;

    // Simple validation
    if (!fname || !lname || !email || !subject || !message) {
        alert('Please fill in all fields.');
        return;
    }

    // You can customize the URL to your server endpoint
    const url = 'send_email.php';

    // Use fetch to send data to the server
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ fname, lname, email, subject, message }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
