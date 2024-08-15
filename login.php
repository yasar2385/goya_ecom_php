<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
require_once 'backend/config.php';

// Function to check user credentials
function checkUserCredentials($conn, $email, $password)
{
    $sql = "SELECT id, password FROM customers WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return password_verify($password, $row['password']);
    }
    return false;
}

// Function to validate email
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password
function validatePassword($password)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

// Function to render login form
function renderLoginForm($error = null)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="assets/css/login.css">
    </head>

    <body>
        <div class="login-container">
            <div class="login-report">
                <?php if ($error): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
            </div>
            <form class="login-form" action="login.php" method="POST">
                <h2>Login</h2>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@gmail.com" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="more than 8 characters" required>
                </div>
                <div class="actions">
                    <label>
                        <input type="checkbox" id="remember-me" name="remember-me"> Remember me
                    </label>
                    <a href="fp.php" id="forgot-password">Forgot your password?</a>
                </div>
                <button type="submit" class="btn">Sign in</button>
                <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
    </body>

    </html>
<?php
}

$error = null;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connect_db();
    $timestamp = date('Y-m-d H:i:s');
    logMessage("Login attempt at $timestamp");

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $rememberMe = isset($_POST['remember-me']);

    // Validate email
    if (!validateEmail($email)) {
        $error = 'Please enter a valid email address.';
    }
    // Validate password
    elseif (!validatePassword($password)) {
        $error = "Password must be at least 8 characters long.";
    } else {
        // Check user credentials only after validation
        $validUser = checkUserCredentials($conn, $email, $password);
        if ($validUser) {
            $_SESSION['user_email'] = $email;
            if ($rememberMe) {
                // TODO Implement remember me functionality
            }
            // Redirect to dashboard or home page
            header("Location: home");
            exit;
        } else {
            $error = 'Invalid email or password.';
        }
    }

    $conn = null; // Close the database connection
}

// Render the login form (with error message if any)
renderLoginForm($error);
?>
