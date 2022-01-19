<?php
    session_start();

    require_once "../../guard.php";
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    guardAdmin();

    $validator = new Validator(
        new NumberValidateable("ACTIVE", $_GET, 0, 1),
        new NumberValidateable("USER_ID", $_GET, 0, PHP_INT_MAX)
    );
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: /pages/user/users.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    $location = "Location: /pages/user/users.php";
    if (isset($_GET["USER_ID"]) && isset($_GET["ACTIVE"])) {
        $toggleActiveQuery = "UPDATE user SET ACTIVE = ? WHERE ID = ?;";
        $toggleActiveStatement = $db->prepare($toggleActiveQuery);
        $toggleActiveStatement->bind_param("ii", $_GET["ACTIVE"], $_GET["USER_ID"]);
        $toggleActiveStatement->execute();

        if (isset($_GET["sortBy"]) && isset($_GET["order"])) {
            $location .= "?sortBy=" . $_GET["sortBy"] . "&order=" . $_GET["order"];
        }
    }
    
    header($location);
?>