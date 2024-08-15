<?php
ob_start();
// Include the database configuration file
require_once 'server/connect_db.php';
require_once 'server/logger.php'; // Ensure the path is correct relative to the current file


function isEmailExists($pdo, $email)
{
    $sql = "SELECT COUNT(*) FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

$postMethod = $_SERVER["REQUEST_METHOD"];
$timestamp = date('Y-m-d H:i:s');
$message = "Before post method $postMethod";
logMessage($message);
// Assuming the data is sent via POST method
$signUpRes = [];
if ($postMethod == "POST") {
    connect_db();
    $message = "Connecting database";
    logMessage($message);
    // Get the input data
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!$pdo) {
        $signUpRes = ['status' => 'error', 'message' => 'Database does not exist.', 'code' => 500];
    } else {
        // First, check if the email already exists
        if (isEmailExists($pdo, $email)) {
            $signUpRes = ['status' => 'error', 'message' => 'This email is already registered', 'code' => 205];
        } else {
            // Validate the inputs (you should add more validation based on your requirements)
            if (!empty($fullName) && !empty($email) && !empty($password)) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Prepare the SQL statement
                $sql = "INSERT INTO customers (fullName, email, password) VALUES (:fullName, :email, :password)";

                // Use a try-catch block to handle potential errors
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':fullName', $fullName);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $hashedPassword);

                    // Execute the statement
                    if ($stmt->execute()) {
                        // echo "Signup successful!";
                        $signUpRes = ['status' => 'success', 'message' => 'Signup successful!', 'code' => 200];
                    } else {
                        // echo "Signup failed!";
                        $signUpRes = ['status' => 'error', 'message' => 'Signup failed!', 'code' => 401];
                    }
                } catch (PDOException $e) {
                    $signUpRes = ['status' => 'error', 'message' => $e->getMessage(), 'code' => 403];
                    // echo "Error: " . $e->getMessage();
                }
            } else {
                $signUpRes = ['status' => 'error', 'message' => "Please fill in all required fields.", 'code' => 501];
            }
        }
    }
}
$signUpRes['time'] = date('Y-m-d H:i:s'); // Current timestamp

$message = "User creation attempt at customers table: Status: {$signUpRes['status']}, " .
    "Code: {$signUpRes['code']}, Message: {$signUpRes['message']}";
logMessage($message);
ob_end_clean();
// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($signUpRes);
