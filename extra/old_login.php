<?php
ob_start();
session_start(); // Start the session
require_once 'server/connect_db.php';
require_once 'server/logger.php';
ob_get_clean();


$loginRes = [];
$postMethod= $_SERVER["REQUEST_METHOD"];
$timestamp = date('Y-m-d H:i:s');
$message = "Before post method $postMethod";
logMessage($message);

if ($postMethod == "POST") {
    global $loginRes;
    connect_db();
    $message = "Connecting database pass";
    logMessage($message);
    // Get the input data
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate the inputs
    if (!empty($email) && !empty($password)) {
        try {
            // Prepare the SQL statement
            $sql = "SELECT id, password FROM customers WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, start a session
                // session_start();
                $_SESSION['user_id'] = $user['id'];
                // echo json_encode(['success' => true, 'message' => 'Login successful!']);
                $loginRes = ['success' => true, 'message' => 'Login successful!'];
            } else {
                // Invalid credentials
                // echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
                $loginRes = ['success' => false, 'message' => 'Invalid email or password.'];
            }
        } catch (PDOException $e) {
            // echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
            $loginRes = ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    } else {
        // echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        $loginRes = ['success' => false, 'message' => 'Please fill in all required fields.'];
    }
} else {
    $loginRes = ['success' => false, 'message' => 'Invalid request method.'];
}
$status = $loginRes['success'] ? 'Success' : 'Failure';
$safeEmail = str_replace(["\r", "\n"], '', $email);
$message = "User login attempt at customers table: Status: {$status}, Message: {$loginRes['message']} Email: {$safeEmail}, Password: [REDACTED]";
logMessage($message);

// Set response header to JSON
ob_get_clean();
header('Content-Type: application/json');
echo json_encode($loginRes);
