<?php
// Include the database configuration file
require_once 'config.php';

// Assuming the data is sent via POST method
$dbRepo = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input data
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

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
                $dbRepo = [
                    'status' => 'success',
                    'message' => 'Signup successful!',
                    'code'=> 200
                ];
            } else {
                // echo "Signup failed!";
                $dbRepo = [
                    'status' => 'error',
                    'message' => 'Signup failed!',
                    'code'=> 401
                ];
            }
        } catch (PDOException $e) {
            $dbRepo = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'code'=> 403
            ];
            // echo "Error: " . $e->getMessage();
        }
    } else {
        $dbRepo = [
            'status' => 'error',
            'message' => "Please fill in all required fields.",
            'code'=> 501
        ];
        
    }
}
$dbRepo['time'] = date('Y-m-d H:i:s'); // Current timestamp
// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($dbRepo);
?>
