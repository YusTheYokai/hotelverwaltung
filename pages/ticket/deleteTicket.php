<?php
    session_start();

    require_once "../../guard.php";
    require_once "../../db/logintoDB.php";
    require_once "../../util/validation/validation.php";

    guardAdmin();

    $validator = new Validator(new NumberValidateable("TICKET_ID", $_POST, 0, PHP_INT_MAX));
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: tickets.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    if (isset($_POST["TICKET_ID"]) && $_POST["TICKET_ID"] > 0) {
        $sql = "DELETE FROM ticket WHERE ID = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST["TICKET_ID"]);
        $stmt->execute();
        $db->close();

        header("Location: tickets.php");
    }
?>