<?php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
require_once 'backend/config.php';

// Function to check if email exists in the database
function isEmailExists($conn, $email)
{
    $sql = "SELECT COUNT(*) FROM customers WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

// Function to render the sign-up form
function renderSignUpForm($error = null)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="assets/css/signup.css">
    </head>

    <body>
        <div class="signup-container">
            <form class="signup-form" action="signup.php" method="POST">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full-name" placeholder="John Doe" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    <span id="emailError" style="color: red;">
                        <?php if ($error): ?>
                            <?php echo htmlspecialchars($error); ?>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="At least 8 characters" required>
                </div>
                <button type="submit" class="btn">Sign up</button>
                <p class="signin-link">Already have an account? <a href="login">Sign in</a></p>
            </form>
        </div>
    </body>

    </html>
<?php
}

// Initialize error variable
$error = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = connect_db();
    $timestamp = date('Y-m-d H:i:s');
    logMessage("Signup attempt at $timestamp");

    // Fetch and sanitize input data
    $fullName = trim($_POST['full-name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate the inputs
    if (empty($fullName) || empty($email) || empty($password)) {
        $error = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (isEmailExists($conn, $email)) {
        $error = "This email is already registered.";
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.';
        // $error = "Password must be at least 8 characters long.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $sql = "INSERT INTO customers (fullName, email, password) VALUES (:fullName, :email, :password)";

        // Use a try-catch block to handle potential errors
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: login");
                exit;
            } else {
                $error = "Signup failed. Please try again later.";
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }

    $conn = null; // Close the database connection
}

// Render the sign-up form with any error message
renderSignUpForm($error);
?>