<?php

header('Content-Type: application/json');
ob_start();
require_once 'vendor/autoload.php';
ob_end_clean();

use Dotenv\Dotenv;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$environment = "local";
$host = 'localhost';    // Database host
$db = '';           // Database name
$user = '';         // Database username
$pass = '';             // Database password

// Determine environment based on domain
function getEnvironment($host)
{
    global $environment, $db, $pass, $user, $logFile, $host;
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
}

$configRepo = [];
try {
    // Get the environment
    getEnvironment($_SERVER['HTTP_HOST']);
} catch (PDOException $e) {
}
$configRepo['time'] = date('Y-m-d H:i:s'); // Current timestamp
echo json_encode($configRepo);
