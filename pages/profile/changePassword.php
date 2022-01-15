<?php
    session_start();
    require "../../db/logIntoDB.php";

    $userId = isset($_POST["userId"]) ? $_POST["userId"] : $_SESSION["user"]["ID"];
    if (isset($_POST["userId"])) {
        $currentPassword = $_SESSION["user"]["PASSWORD"];
    } else {
        $query = "SELECT password FROM user WHERE id = ?;";
        $statement = $db->prepare($query);
        $statement->bind_param("i", $userId);
        $statement->execute();
        $currentPassword = $statement->get_result()->fetch_assoc()["password"];
    }

    if (!isset($_POST["userId"]) && sha1($_POST["passwordCurrent"]) !== $currentPassword) {
        header("Location: profile.php?type=ERROR&msg=WRONG_PASSWORD");
        exit;
    }

    if ($_POST["passwordNew"] !== $_POST["passwordNewConfirm"]) {
        header("Location: profile.php?type=ERROR&msg=PASSWORDS_DO_NOT_MATCH");
        exit;
    }
    
    $newPassword = sha1($_POST["passwordNew"]);
    if ($newPassword === $currentPassword) {
        header("Location: profile.php?type=ERROR&msg=NEW_PASSWORD_MUST_NOT_BE_CURRENT_PASSWORD");
        exit;
    }

    $query = "UPDATE user SET password = ? WHERE id = ?;";
    $statement = $db->prepare($query);
    $statement->bind_param("si", $newPassword, $userId);
    $statement->execute();

    $userIdParam = isset($_POST["userId"]) ? "userId=" . $userId . "&" : "";
    header("Location: profile.php?" . $userIdParam . "type=INFO&msg=PASSWORD_CHANGED");
?>