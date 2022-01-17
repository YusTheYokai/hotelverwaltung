<?php
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    $validator = new Validator(
        new TextValidateable("CONTENT", $_POST, 1, 2000),
        new NumberValidateable("TICKET_ID", $_POST, 0, PHP_INT_MAX),
        new NumberValidateable("USER_ID", $_POST, 0, PHP_INT_MAX)
    );

    error_log(print_r($_POST, TRUE));

    $validator->validate();
    if ($validator->hasFailed()) {
        if (isset($_POST["TICKET_ID"])) {
            $ticketId = $_POST["TICKET_ID"];
            header("Location: ticketDetails.php?id=$ticketId&" . $validator->generateUrlErrorParams());
        } else {
            header("Location: tickets.php?" . $validator->generateUrlErrorParams());
        }
        exit;
    }

    $query = "INSERT INTO comment (CONTENT, TICKET_ID, USER_ID) VALUES (?, ?, ?);";
    $statement = $db->prepare($query);
    $statement->bind_param("sii", $_POST["CONTENT"], $_POST["TICKET_ID"], $_POST["USER_ID"]);
    $statement->execute();

    header("Location: ticketDetails.php?id=" . $_POST["TICKET_ID"] . "&type0=INFO&msg0=CREATED");
?>