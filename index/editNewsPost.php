<?php
    require_once "../guard.php";
    require_once "../util/validation/validation.php";

    guardAdmin();

    $validator = new Validator(
        new NumberValidateable("NEWS_POST_ID", $_POST, 0, PHP_INT_MAX),
        new TextValidateable("TITLE", $_POST, 1, 100),
        new TextValidateable("CONTENT", $_POST, 1, 2000),
        new TextValidateable("UPDATE_PICTURE", $_POST, 4, 5)
    );

    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: ../index.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    if ($_POST["UPDATE_PICTURE"] === "true") {
        $pictureValidator = new Validator(new TextValidateable("PICTURE", $_POST, 1, 100));
        $pictureValidator->validate();
        if ($pictureValidator->hasFailed()) {
            header("Location: ../index.php?" . $validator->generateUrlErrorParams());
            exit;
        }

        $moveToRoot = "../";
        require_once "../uploadPicture.php";
        require_once "../db/logIntoDB.php";

        $query = "UPDATE news_post SET PICTURE = ? WHERE ID = ?;";
        $statement = $db->prepare($query);
        $statement->bind_param("si", $_POST["PICTURE"], $_POST["NEWS_POST_ID"]);
        $statement->execute();
    }

    require_once "../db/logIntoDB.php";

    $query = "UPDATE news_post SET TITLE = ?, CONTENT = ? WHERE ID = ?;";
    $statement = $db->prepare($query);
    $statement->bind_param("ssi", $_POST["TITLE"], $_POST["CONTENT"], $_POST["NEWS_POST_ID"]);
    $statement->execute();
    $statement->close();
    $db->close();

    header("Location: ../index.php?type0=INFO&msg0=EDITED");
?>