<?php
    session_start();
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    $userIdValidator = new Validator(new NumberValidateable("USER_ID", $_POST, 0, PHP_INT_MAX));
    $userIdValidator->validate();
    if ($validator->hasFailed()) {
        header("Location: ../user/users.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    $validatables = [];
    $editingOwnProfile = $_POST["USER_ID"] === $_SESSION["user"]["ID"];
    if ($editingOwnProfile) {
        $validatables = [new TextValidateable("PASSWORD_CURRENT", $_POST, 8, 50)];
    }
    array_push($validatables, 
            new TextValidateable("PASSWORD_NEW", $_POST, 8, 50),
            new TextValidateable("PASSWORD_NEW_CONFIRM", $_POST, 8, 50),
            new MatchValidateable("PASSWORD_NEW", "PASSWORD_NEW_CONFIRM", $_POST)
    );

    $validator = new Validator(...$validatables);
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: profile.php?USER_ID=" . $_POST["USER_ID"] . "&" . $validator->generateUrlErrorParams());
        exit;
    }
    
    $newPassword = sha1($_POST["PASSWORD_NEW"]);
    if ($editingOwnProfile) {
        if (sha1($_POST["PASSWORD_CURRENT"]) !== $_SESSION["user"]["PASSWORD"]) {
            header("Location: profile.php?USER_ID=" . $_POST["USER_ID"] . "&type0=ERROR&msg0=WRONG_PASSWORD");
            exit;
        } else if ($newPassword === $_SESSION["user"]["PASSWORD"]) {
            header("Location: profile.php?USER_ID=" . $_POST["USER_ID"] . "&type0=ERROR&msg0=NEW_PASSWORD_MUST_NOT_BE_CURRENT_PASSWORD");
            exit;
        }
    }

    $query = "UPDATE user SET password = ? WHERE id = ?;";
    $statement = $db->prepare($query);
    $statement->bind_param("si", $newPassword, $_POST["USER_ID"]);
    $statement->execute();

    header("Location: profile.php?USER_ID=" . $_POST["USER_ID"] . "&type0=INFO&msg0=PASSWORD_CHANGED");
?>