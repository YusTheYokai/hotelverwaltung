<?php
    session_start();
    require "../../db/logintoDB.php";
    require "../../displayUtils.php";

    $sql = "SELECT ticket.ID, ticket.TITLE, ticket.CONTENT, ticket.PICTURE,
            ticket.STATUS, ticket.CREATION_TIME, user.FIRST_NAME, user.LAST_NAME, user.USERNAME
            FROM ticket JOIN user ON (ticket.USER_ID = user.ID)";

    if ($_SESSION['user']['ROLE'] === 0) {
        $sql = $sql . " WHERE USER_ID = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user']['ID']);
    } else {
        $stmt = $db->prepare($sql);
    }
    
    $stmt->execute();
    $stmt->bind_result($ID, $TITLE, $CONTENT, $PICTURE, $STATUS, $CREATION_TIME, $FIRST_NAME, $LAST_NAME, $USERNAME);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
</head>
<body>
    <?php include "../../menubar.php";?>
    <div class="container-fluid overlay custom-table">

        <h1 id="tableTitle">Tickets</h1>
        <div class="table-responsive-lg">
        <table class="table" aria-describedby="tableTitle">
            <thead class="position-sticky" style="z-index: 1">
                <tr>
                    <th style="width: 10%;">Titel</th>
                    <th style="width: 20%;">Bild</th>
                    <th style="width: 100%;">Inhalt</th>
                    <th style="max-width: 10%;">Ersteller</th>
                    <th style="max-width: 10%;">Erstelldatum</th>
                    <th style="max-width: 10%;">Status</th>
                    <?php
                    if ($_SESSION['user']['ROLE'] > 0) {
                        echo"<th>Aktion</th>";
                    }
                    ?>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                while($stmt->fetch()) {
                    include "ticket.php";
                }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>