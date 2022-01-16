<?php
    session_start();
    require "../../db/logIntoDB.php";
    $moveToRoot = "../../";
    require "../../uploadPicture.php";
    $addQuery = "INSERT INTO ticket (TITLE, CONTENT, PICTURE, USER_ID) VALUES (?, ?, ?, ?);";
    $addStatement = $db->prepare($addQuery);
    if (!$addStatement) {
        error_log($db->error);
    }
    $addStatement->bind_param("sssi", $_POST["title"], $_POST["content"], $fileName, $_SESSION["user"]["ID"]);
    $addStatement->execute();
    header("Location: createTicketController.php");
?>