<?php
    session_start();
    require "../../db/logintoDB.php";

    $USER_ID = isset($_GET['USER_ID']) ? $_GET['USER_ID'] : 0;

    if ($USER_ID > 0) {
        $sql = "SELECT * FROM ticket WHERE USER_ID = ?;";
        $stmt = $db->prepare($sql);
        $stmt->bind_params("i", $USER_ID);
    } else {
        $sql = "SELECT * FROM ticket;";
        $stmt = $db->prepare($sql);
    }
    
    $stmt->execute();
    $stmt->bind_result($ID, $TITLE, $CONTENT, $PICTURE, $STATUS, $CREATION_TIME, $USER_ID);

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
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
</head>
<body>
    <div class = "container-fluid overlay" style="margin-top: 60px; width: 90vw;">

        <h1>Tickets</h1>

        <table class = "table">
            <tr><th>Titel</th><th>Bild</th><th>Inhalt</th><th>Tickets</th><th>Ersteller</th><th>Erstelldatum</th><th>Status</th><th>Entfernen</th></tr>
            <?php
                include "../../menubar.php";
                $username = $_SESSION["user"]["USERNAME"];
                while($stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>$TITLE</td>";
                    echo "<td><img src='../../uploads/$username/thumbnails/$PICTURE' alt='Ein Bild' class='img-thumbnail col-3' /> </td>";
                    echo "<td>$CONTENT</td>";
                    echo "<td><a href='tickets.php?userId=$USER_ID'>Tickets</a></td>";
                    echo "<td>$username</td>";
                    echo "<td>$CREATION_TIME</td>";
                    echo "<td>$STATUS</td>";
                    echo "<td><form action = 'deleteTicket.php' method = 'post'><input type='hidden' name='id' value = '$ID'/><input type='submit' value = 'delete'/></form></td>";
                    echo "<tr>";
                }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>