<?php
header('Content-Type: application/json');
ob_start();
require_once 'vendor/autoload.php';
require_once 'logger.php';
ob_end_clean();

// Set the default timezone to your local timezone
date_default_timezone_set('Asia/Kolkata'); // Change 'Asia/Kolkata' to your desired timezone

use Dotenv\Dotenv;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$environment = "local";
$host = 'localhost';    // Database host
$db = '';           // Database name
$user = '';         // Database username
$pass = '';             // Database password
$mailUser="";
$appPassword="";
$mailReceiver="";

$pdo;

$timestamp = date('Y-m-d H:i:s');

// Determine environment based on domain
function getEnvironment($host)
{

    global $environment, $db, $pass, $user, $timestamp, $host, $mailUser, $appPassword, $mailReceiver;
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

    // Example usage of the logMessage function
    // logMessage('User has logged in.', $logFile);
    $message = "User $db has $user at $timestamp.";
    logMessage($message);

    // Retrieve environment variables
    $mailUser = $_ENV['FROM_MAIL'];
    $appPassword = $_ENV['APP_PASSWORD'];
    $mailReceiver = $_ENV['TO_MAIL'];

}

$dbRepo = [];
function connect_db(): void
{
    global $environment, $db, $pass, $user, $pdo, $host, $dbRepo;
    try {
        // Get the environment
        getEnvironment($_SERVER['HTTP_HOST']);
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Check if the database exists
        $stmt = $pdo->query("SHOW DATABASES LIKE '$db'");
        if ($stmt->rowCount() > 0) {
            $dbRepo = ['status' => 'success', 'message' => 'Database exists', 'code' => 200];
        } else {
            if ($environment == 'local') {
                // Read the SQL file
                $sql = file_get_contents('setup.sql');
                if ($sql === false) {
                    throw new Exception("Could not read SQL file.");
                }
                // Execute the SQL commands
                $pdo->exec($sql);
                $dbRepo = ['status' => 'success', 'message' => 'Database and tables created successfully', 'code' => 202];
            }
            $dbRepo = ['status' => 'error', 'message' => 'Database does not exist.', 'code' => 401];
        }
    } catch (PDOException $e) {
        $dbRepo = ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage(), 'code' => 500];
    } catch (Exception $e) {
        $dbRepo = ['status' => 'error', 'message' => 'Error: ' . $e->getMessage(), 'code' => 500];
    } finally {
        echo json_encode($dbRepo);
    }
}
