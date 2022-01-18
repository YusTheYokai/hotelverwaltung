<?php
    session_start();

    require_once "../../guard.php";
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    guardTechnician();

    $validator = new Validator(
        new NumberValidateable("TICKET_ID", $_GET, 0, PHP_INT_MAX),
        new NumberValidateable("STATUS", $_GET, 0, 2)
    );
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: tickets.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    if (isset($_GET["TICKET_ID"]) && isset($_GET["STATUS"])) {
        $changeStatusQuery = "UPDATE ticket SET STATUS = ? WHERE ID = ?;";
        $changeStatusStatement = $db->prepare($changeStatusQuery);
        $changeStatusStatement->bind_param("ii", $_GET["STATUS"], $_GET["TICKET_ID"]);
        $changeStatusStatement->execute();
    }

    if (isset($_GET["ORIGIN"])) {
        header("Location: " . $_GET["ORIGIN"]);
    } else {
        header("Location: /pages/ticket/tickets.php");
    }
?>