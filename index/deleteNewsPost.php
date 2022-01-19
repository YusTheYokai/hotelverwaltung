<?php
    session_start();

    require_once "../guard.php";
    require_once "../db/logintoDB.php";

    guardAdmin();

    $location = "Location: ../index.php";
    if (isset($_GET["id"])) {
        $query = "DELETE FROM news_post WHERE ID = ?;";
        $statement = $db->prepare($query);
        $statement->bind_param("i", $_GET["id"]);
        $statement->execute();
        $statement->close();
        $location .= "?type0=INFO&msg0=DELETED";
    }

    header($location);
?>