<?php
    session_start();
    require_once "../../db/logIntoDB.php";
    $moveToRoot = "../../";
    require_once "../../uploadPicture.php";
    require_once "../../util/validation/validation.php";

    $validator = new Validator(
        new TextValidateable("title", $_POST, 1, 100),
        new TextValidateable("content", $_POST, 1, 2000),
    );
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: createTicketController.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    $addQuery = "INSERT INTO ticket (TITLE, CONTENT, PICTURE, USER_ID) VALUES (?, ?, ?, ?);";
    $addStatement = $db->prepare($addQuery);
    if (!$addStatement) {
        error_log($db->error);
    }
    $addStatement->bind_param("sssi", $_POST["title"], $_POST["content"], $fileName, $_SESSION["user"]["ID"]);
    $addStatement->execute();
    header("Location: createTicketController.php");
?>