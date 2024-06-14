<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST['volunteer-name'];
    $email = $_POST['volunteer-email'];
    $subject = $_POST['volunteer-subject'];
    $message = $_POST['volunteer-message'];

    // Check if a file is uploaded
    if(isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
        // Get uploaded file details
        $file_name = $_FILES['uploaded_file']['name'];
        $file_tmp = $_FILES['uploaded_file']['tmp_name'];

        // Destination directory for uploaded files
        $upload_dir = "doc/";

        // Move uploaded file to the destination directory
        move_uploaded_file($file_tmp, $upload_dir . $file_name);

        // Email attachment
        $file = $upload_dir . $file_name;
        $file_size = filesize($file);
        $file_type = mime_content_type($file);

        $handle = fopen($file, "r");
        $content = fread($handle, $file_size);
        fclose($handle);

        $content = chunk_split(base64_encode($content));

        $attachment = "Content-Type: $file_type; name=\"$file_name\"\r\n" .
                      "Content-Disposition: attachment; filename=\"$file_name\"\r\n" .
                      "Content-Transfer-Encoding: base64\r\n" .
                      "\r\n" . $content . "\r\n";
    } else {
        $attachment = ''; // No attachment
    }

    // Email address where you want to receive the form submissions
     $to = 'francis.hopeforlife@gmail.com';
    //  $to = 'cedricallan16@gmail.com';

    // Email subject
    $email_subject = 'New Volunteer Form Submission: ' . $subject;

    // Email content
    $email_body = "You have received a new volunteer form submission.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message: $message\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    // Attach file to email
    if(!empty($attachment)) {
        $email_body = "--boundary\r\n" .
                      "Content-Type: text/plain; charset=\"UTF-8\"\r\n" .
                      "Content-Transfer-Encoding: 7bit\r\n" .
                      "\r\n" . $email_body . "\r\n" .
                      "--boundary\r\n" .
                      $attachment;
    }

    // Send email
    mail($to, $email_subject, $email_body, $headers);

    // Redirect to a thank you page or display a thank you message
    header('Location: thank_you_page.php');
    exit;
}
?>
