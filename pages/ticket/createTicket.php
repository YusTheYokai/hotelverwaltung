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
    $test =$addStatement->bind_param("sssi", $_POST["title"], $_POST["content"], $fileName, $_SESSION["user"]["ID"]);
    if (!$test) {
        error_log($db->error);
    }
    $test2 = $addStatement->execute();
    if (!$test2) {
        error_log($db->error);
    }
    header("Location: createTicketController.php");
?>