<?php
    require_once "../guard.php";
    require_once "../util/validation/validation.php";

    session_start();
    guardAdmin();

    $validator = new Validator(
        new TextValidateable("TITLE", $_POST, 1, 100),
        new TextValidateable("CONTENT", $_POST, 1, 2000)
    );

    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: ../index.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    $moveToRoot = "../";
    require_once "../uploadPicture.php";

    require_once "../db/logIntoDB.php";
    $addQuery = "INSERT INTO news_post (TITLE, CONTENT, PICTURE, USER_ID) VALUES (?, ?, ?, ?);";
    $addStatement = $db->prepare($addQuery);
    $addStatement->bind_param("sssi", $_POST["TITLE"], $_POST["CONTENT"], $fileName, $_SESSION["user"]["ID"]);
    $addStatement->execute();
    
    header("Location: ../index.php?type0=INFO&msg0=CREATED");
?>