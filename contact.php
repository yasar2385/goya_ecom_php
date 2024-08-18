<?php

    include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>Contact Us</title>
</head>

<body>
    <div class="con-head">
        <h2>Contact Us</h2>
        <hr>
    </div>
    <div class="contact-form-container">
        <p class="contact-message">
            For assistance with our products/services, or if you're experiencing any issues, please contact our support team directly.
        </p>

        <!-- Form submission handled by PHP -->
        <form class="contact-form" action="contact.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit">Submit</button>
        </form>

        <?php
        echo "<script>console.log('before');</script>";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<script>console.log('after');</script>";
            
            // ? Retrieve form data
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $message = htmlspecialchars(trim($_POST['message']));

            // ? Validate email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // ? Email information
                $to = "your-email@example.com"; // Replace with your email
                $subject = "Contact Form Submission from $name";
                $body = "Name: $name\nEmail: $email\nMessage:\n$message";
                // ? Send email
                sendEmail($email, $to, $name, $subject, $body);
                // if (mail($to, $subject, $body, $headers)) {
                //     echo "<p style='color:green;'>Thank you for contacting us, $name. We will get back to you soon.</p>";
                // } else {
                //     echo "<p style='color:red;'>Error: Unable to send your message. Please try again later.</p>";
                // }
            } else {
                echo "<p style='color:red;'>Invalid email format. Please try again.</p>";
            }
        }
        ?>
    </div>
</body>
</html>