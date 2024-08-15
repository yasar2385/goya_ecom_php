<?php
// logger.php

/**
 * Logs a message to a specified log file.
 *
 * @param string $message The message to log.
 * @param string $logFile The file to write the log to.
 */

 $currentDate = date('Y-m-d');
 $logFile = __DIR__ . "/../logs/{$currentDate}.log"; // Change the log file name and path as needed
 
function logMessage($message) {
    global $logFile;
    // Check if the log file exists, if not, create it
    if (!file_exists($logFile)) {
        $fileHandle = fopen($logFile, 'w');
        if ($fileHandle) {
            fclose($fileHandle);
        } else {
            // Handle the error if the file could not be created
            error_log("Could not create log file: $logFile", 0);
            return; // Exit the function if the log file cannot be created
        }
    }

    // Add a timestamp to the message
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[$timestamp] $message" . PHP_EOL;

    // Attempt to open the log file for appending
    $fileHandle = fopen($logFile, 'a');
    if ($fileHandle) {
        // Write the log entry to the file
        fwrite($fileHandle, $logEntry);
        fclose($fileHandle);
    } else {
        // Handle the error if the file could not be opened
        error_log("Could not open log file: $logFile", 0);
    }
}
