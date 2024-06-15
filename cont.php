<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email address where you want to receive the form submissions
     $to = 'cedricallan16@gmail.com';
    // $to = 'cedricallan16@gmail.com';
    // Email subject
    $email_subject = 'New Contact Form Submission';

    // Email content
    $email_body = "You have received a new contact form submission.\n\n".
                  "First Name: $first_name\n".
                  "Last Name: $last_name\n".
                  "Email: $email\n".
                  "Message:\n$message\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    mail($to, $email_subject, $email_body, $headers);

    // Redirect to a thank you page or display a thank you message
    header('Location: index.html');
    exit;
}
?>
