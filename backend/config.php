<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$base_url = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/goya_php/";


require_once __DIR__ . '/server/vendor/autoload.php';
require_once __DIR__ . '/server/logger.php';


use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/server');
$dotenv->load();

$environment = "local";
$host = 'localhost';    // Database host
$db = '';           // Database name
$user = '';         // Database username
$pass = '';             // Database password
$timestamp = date('Y-m-d H:i:s');

function debug($var, $is_json = false)
{
    if ($is_json) {
        $output = json_encode($var, JSON_PRETTY_PRINT);
    } else {
        $output = print_r($var, true);
    }

    echo "<script>console.log(" . json_encode($output) . ");</script>";
}
function connect_db()
{

    global $environment, $db, $pass, $user, $host, $timestamp;
    if (strpos($host, 'localhost') !== false) {
        $environment = 'local';
    } elseif (strpos($host, 'uat') !== false) {
        $environment =  'uat';
    } else {
        $environment = 'live';
    }

    $db = $_ENV[strtoupper($environment) . '_DB_NAME'];
    $pass = $_ENV[strtoupper($environment) . '_DB_PASSWORD'];
    $user = $_ENV[strtoupper($environment) . '_DB_USER'];

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$db;charset=utf8mb4",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        // $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $conn = mysqli_connect($host, $user, $pass, $db);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $message = "User $db has $user at $timestamp.";
    logMessage($message);
    debug($message);
    return $pdo;
}

function sendEmail($from, $to, $name, $subject, $body) {	
	global $mailUser;
	global $appPassword;
	//echo "<script>console.log('User: ". $mailUser ."');</script>";
    try {
        $mail = new PHPMailer(true); // Set to true to enable exceptions
        // Server settings (adjust these as needed)
        $mail->SMTPDebug = 0; // Enable verbose debug output (optional)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;

        // Credentials (use app password, not your regular Gmail password)
        $mail->Username = $mailUser;
        $mail->Password = $appPassword; // Replace with your app password

        // Email content
        $mail->setFrom($from, $name);
        $mail->addAddress($to, 'RecipientName');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->isHTML(true); // Set to true if sending HTML content

        $mail->send();
        echo "<p style='color:green;'>Thank you for contacting us, $name. We will get back to you soon.</p>";
    } catch (Exception $e) {
        // echo "Error sending email: {$mail->ErrorInfo}";
        echo "<p style='color:red;'>Error: Unable to send your message. Please try again later.</p>";
        http_response_code(500);  // Set error status code
    }
}	