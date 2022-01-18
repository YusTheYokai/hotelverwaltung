<?php
    session_start();
    require "../../db/logIntoDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
</head>
<body>
    <?php
        require_once "../../menubar.php";
    ?>
    <div id="createTicketContainer" class="container-fluid overlay quarter-width">
        <h1>Ticket erstellen</h1>
        <form action="createTicket.php" class="text-center" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input id="inputTitle" name="TITLE" type="text" class="input-text form-control" placeholder="Titel" minlength="1" maxlength="100" required>
            </div>
            <div class="form-group mt-3">
                <textarea id="inputContent" name="CONTENT" class="input-text form-control" placeholder="Beschreibung" minlength="1" maxlength="2000" required></textarea>
            </div>
            <div class="form-group mt-3">
                <input id="inputPicture" name="PICTURE" class="input-text form-control" type="file" accept=".jpeg">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Erstellen</button>
        </form>
    </div>
    <?php
        require_once "../../util/bottomIncludes.php";
    ?>
</body>
</html>