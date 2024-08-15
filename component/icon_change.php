<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Fetching the user's icon URL from the database
    $user_id = $_SESSION['user_id'];
    // $db is database connection
    $query = "SELECT icon_url FROM users WHERE id = $user_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $icon_url = $row['icon_url'];
    
    echo "<script>
            document.getElementById('userIcon').src = '$icon_url';
          </script>";
}
?>
