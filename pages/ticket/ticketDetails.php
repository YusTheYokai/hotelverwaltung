<?php
    session_start();
    require_once "../../util/validation/validation.php";
    require_once "../../displayUtils.php";
    require_once "../../guard.php";

    guardLoggedIn();

    $validator = new Validator(new NumberValidateable("TICKET_ID", $_GET, 0, PHP_INT_MAX));

    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: tickets.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    require_once "../../db/logIntoDB.php";
    $ticketQuery = "SELECT TITLE, CONTENT, PICTURE, STATUS, CREATION_TIME, FIRST_NAME, LAST_NAME, USERNAME FROM ticket JOIN user ON (ticket.USER_ID = user.ID) WHERE ticket.ID = ?;";
    $ticketStatement = $db->prepare($ticketQuery);
    $ticketStatement->bind_param("i", $_GET["TICKET_ID"]);
    $ticketStatement->execute();
    $ticket = $ticketStatement->get_result()->fetch_assoc();

    $pictureFileName = $ticket["PICTURE"];
    $picture = "../../images/noImage.png";
    if ($pictureFileName) {
        $username = $ticket["USERNAME"];
        $picture = "../../uploads/$username/$pictureFileName";
    }

    $commentsQuery = "SELECT comment.ID, CONTENT, CREATION_TIME, FIRST_NAME, LAST_NAME, user.ID FROM comment JOIN user ON (comment.USER_ID = user.ID) WHERE TICKET_ID = ? ORDER BY comment.CREATION_TIME DESC;";
    $commentsStatement = $db->prepare($commentsQuery);
    $commentsStatement->bind_param("i", $_GET["TICKET_ID"]);
    $commentsStatement->execute();
    $commentsStatement->bind_result($id, $content, $creationTime, $firstName, $lastName, $userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <link rel="icon" href="/icon/hotelIcon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
</head>
<body>
    <?php require_once "../../menubar.php"; ?>

    <div id="ticketDetailsContainer" class="container-fluid overlay position-sticky" style="margin-top: 10vh;">
        <div class="row justify-content-between">
            <div class="col-sm-6">
                <h1><?=$ticket["TITLE"]?></h1>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <?php
                    $ID = $_GET["TICKET_ID"];
                    $STATUS = $ticket["STATUS"];
                    $origin = "/pages/ticket/ticketDetails.php?TICKET_ID=" . $ID;
                    require_once "ticketStatusButton.php";
                ?>
            </div>
        </div>
        <p><?=$ticket["CONTENT"]?></p>
        <img src="<?=$picture?>" alt="Ticket-Bild" class="ticket-image" style="max-width: 100%;" />
        <div class="mt-4">
            <?=formatName($ticket["FIRST_NAME"], $ticket["LAST_NAME"])?> - <?=formatTimestamp($ticket["CREATION_TIME"])?>
        </div>
    </div>

    <div id="createCommentContainer" class="container-fluid overlay">
        <form class="text-center" method="POST" action="createComment.php">
            <div class="form-group">
                <textarea id="contentInput" name="CONTENT" class="input-text form-control" placeholder="Neuer Kommentar" required maxlength="2000"></textarea>
            </div>
            <input type="hidden" id="ticketIdInput" name="TICKET_ID" required value="<?=$_GET["TICKET_ID"]?>" />
            <input type="hidden" id="userIdInput" name="USER_ID" required value="<?=$_SESSION["user"]["ID"]?>" />
            <button type="submit" id="submitCommentButton" class="btn btn-primary mt-4">Erstellen</button>
        </form>
    </div>

    <div id="commentsContainer" class="container-fluid footer-margin-bottom">
        <?php
            while ($commentsStatement->fetch()) {
                require "comment/comment.php";
            }
        ?>
    </div>
    <?php require_once "../../util/bottomIncludes.php"; ?>
</body>
</html>