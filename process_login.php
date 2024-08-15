<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection and login processing code here
    // This only runs when the form is submitted
} else {
    // Redirect back to the login form if accessed directly
    header("Location: login.php");
    exit;
}
