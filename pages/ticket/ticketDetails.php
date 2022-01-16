<?php
    session_start();
    require_once "../../db/logIntoDB.php";
    require_once "../../displayUtils.php";
    require_once "../../guard.php";

    guardLoggedIn();
    if (!isset($_GET["id"])) {
        header("Location: /pages/ticket/tickets.php");
        exit;
    }
    $query = "SELECT TITLE, CONTENT, PICTURE, STATUS, CREATION_TIME, ticket.user_id, FIRST_NAME, LAST_NAME, ticket.ID
                 FROM ticket JOIN user 
            ON (ticket.USER_ID = user.ID) WHERE ticket.ID = ?;";   
    $statement = $db->prepare($query);
    if(!$statement) {
        error_log($db->error);
        error_log("statement1");
    }         
    
    if(!$statement->bind_param("i", $_GET["id"])) {
        error_log($db->error);
        error_log("bind param does not work");
    }
    if(!$statement->execute()) {
        error_log($db->error);
        error_log("execute does not work");
    }
    if(!$statement->bind_result($TITLE, $CONTENT, $PICTURE, $STATUS, $CREATION_TIME, $USER_ID, $FIRST_NAME, $LAST_NAME, $ID)) {
        error_log($db->error);
    }
    error_log("$TITLE");
    error_log($CONTENT);
    error_log($PICTURE);
    error_log($CREATION_TIME);
    error_log("Ende des php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
</head>
<body>
    <?php
        include "../../menubar.php";
    ?>
    <h1><?=$TITLE?>hilfe</h1>
    <p><?=$CONTENT?></p>
    <div id="createCommentContainer" class="container mb-4 overlay news-post-container">
        <div class="row justify-content-start">
            
            <div class="col-lg-8" style="position: relative;">
                <h1><?=$TITLE?></h1>
                <p class="news-post-text"><?=$CONTENT?></p>
                
            </div>
        </div>
    </div>

    <div id="createCommentContainer" class="container-fluid overlay quarter-width">
        <h1><?=$TITLE?></h1>
        <form action="changeTicket.php" class="text-center" method="POST" enctype="multipart/form-data">
            <div class="form-group mt-3">
                <textarea id="comment" name="comment" class="input-text form-control" placeholder="Kommentar" minlength="1" maxlength="2000" required></textarea>
            </div>
            <?php
                include "ticketStatusButton.php";
            ?>
            <button type="submit" class="btn btn-primary mt-4">Hinzufügen</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>