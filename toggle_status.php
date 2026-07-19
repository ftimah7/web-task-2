<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = $conn->query("SELECT status FROM users WHERE id=$id");
    if ($row = $result->fetch_assoc()) {
       
        $new_status = ($row['status'] == 0) ? 1 : 0;

        
        $conn->query("UPDATE users SET status=$new_status WHERE id=$id");

        
        echo $new_status;
    }
}
?>