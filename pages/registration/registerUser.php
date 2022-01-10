<?php
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    $validator = new Validator(
        new TextValidateable("USERNAME", $_POST, 3, 20),
        new NumberValidateable("HONORIFIC", $_POST, 0, 2),
        new TextValidateable("LAST_NAME", $_POST, 2, 30),
        new TextValidateable("FIRST_NAME", $_POST, 2, 30),
        new EmailValidateable("EMAIL", $_POST, 5, 50),
        new TextValidateable("PASSWORD", $_POST, 8, 50),
        new NumberValidateable("ROLE", $_POST, 0, 1)
    );
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: registration.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    $password = sha1($_POST["PASSWORD"]);
    $query = "INSERT INTO USER (USERNAME, HONORIFIC, LAST_NAME, FIRST_NAME, EMAIL, PASSWORD, ROLE) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $statement = $db->prepare($query);
    $statement->bind_param("ssssssi", $_POST["USERNAME"], $_POST["HONORIFIC"], $_POST["LAST_NAME"], $_POST["FIRST_NAME"], $_POST["EMAIL"], $password, $_POST["ROLE"]);
    $statement->execute();

    header("Location: registration.php?type0=INFO&msg0=REGISTERED");
?>