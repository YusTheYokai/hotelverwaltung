<?php
    require_once("db/dbaccess.php");
    $db = new mysqli($host, $user, $password, $database);
    if ($db->connect_error) {
        echo "Connection Error: " . $db->connect_error;
        exit();
    }
?>