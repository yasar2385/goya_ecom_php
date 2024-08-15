<?php

require_once __DIR__ . '/server/vendor/autoload.php';
require_once __DIR__ . '/server/logger.php';

use Dotenv\Dotenv;

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

