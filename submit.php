<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid input
        echo "Please fill out all fields with valid data.";
        exit();
    }

    // Change the recipient email address to your own
    $to = 'jayanthansailentra8@gmail.com';
    $subject = 'Contact Form Submission';
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        // Email sent successfully
        header('Location: contact.html?success=true');
        exit();
    } else {
        // Email sending failed
        echo "An error occurred while sending your message. Please try again later.";
        exit();
    }
}
?>
