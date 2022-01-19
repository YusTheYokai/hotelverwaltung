<?php
    require_once "../../guard.php";
    require_once "../../util/validation/validation.php";

    session_start();

    guardAdmin();

    $validator = new Validator(
        new NumberValidateable("ACTIVE", $_GET, 0, 1),
        new NumberValidateable("USER_ID", $_GET, 0, PHP_INT_MAX),
    );

    $validator->validate();

    error_log($_GET["USER_ID"] === $_SESSION["user"]["ID"]);
    if ($_GET["USER_ID"] == $_SESSION["user"]["ID"]) {
        $validationResult = new ValidationResult("USER_ID");
        $validationResult->addErrorMessage("MATCH_CANNOT_DEACTIVATE");
        $validator->addValidationResult($validationResult);
    }

    if ($validator->hasFailed()) {
        header("Location: /pages/user/users.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    require_once "../../db/logIntoDB.php";

    $toggleActiveQuery = "UPDATE user SET ACTIVE = ? WHERE ID = ?;";
    $toggleActiveStatement = $db->prepare($toggleActiveQuery);
    $toggleActiveStatement->bind_param("ii", $_GET["ACTIVE"], $_GET["USER_ID"]);
    $toggleActiveStatement->execute();
    
    $location = "Location: /pages/user/users.php?type0=INFO&msg0=CHANGED";
    if (isset($_GET["sortBy"]) && isset($_GET["order"])) {
        $location .= "&sortBy=" . $_GET["sortBy"] . "&order=" . $_GET["order"];
    }

    header($location);
?>