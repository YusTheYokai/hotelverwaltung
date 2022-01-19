<?php
    require_once "../../guard.php";
    require_once "../../util/validation/validation.php";

    session_start();
    guardAdmin();

    $validator = new Validator(new NumberValidateable("TICKET_ID", $_GET, 0, PHP_INT_MAX));

    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: tickets.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    require_once "../../db/logintoDB.php";
    $sql = "DELETE FROM ticket WHERE ID = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $_GET["TICKET_ID"]);
    $stmt->execute();

    header("Location: tickets.php?type0=INFO&msg0=DELETED");
?>