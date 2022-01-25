<?php
    require_once "../../../util/validation/validation.php";

    $validator = new Validator(
        new NumberValidateable("COMMENT_ID", $_GET, 0, PHP_INT_MAX),
        new NumberValidateable("TICKET_ID", $_GET, 0, PHP_INT_MAX)
    );

    $validator->validate();
    if ($validator->hasFailed()) {
        if (isset($_GET["TICKET_ID"])) {
            header("Location: ../ticketDetails.php?TICKET_ID=" . $_GET["TICKET_ID"] . "&" . $validator->generateUrlErrorParams());
        } else {
            header("Location: ../tickets.php?" . $validator->generateUrlErrorParams());
        }
        exit;
    }

    require_once "../../../db/logIntoDB.php";
    $query  = "DELETE FROM comment WHERE ID = ?";
    $statement = $db->prepare($query);
    $statement->bind_param("i", $_GET["COMMENT_ID"]);
    $statement->execute();

    header("Location: ../ticketDetails.php?TICKET_ID=" . $_GET["TICKET_ID"] . "&type0=INFO&msg0=DELETED");
?>