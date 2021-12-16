<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet">
    <link href="css/ticket.css" rel="stylesheet">
</head>
<body>
    <?php
        include "menubar.php";
    ?>
    <div id="createTicketContainer" class="container-fluid overlay quarter-width">
        <h1>Ticket erstellen</h1>
        <form class="text-center" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input id="inputTitle" name="title" type="text" class="input-text form-control" placeholder="Titel" required>
            </div>
            <div class="form-group mt-3">
                <textarea id="inputDescription" name="description" class="input-text form-control" placeholder="Beschreibung" required></textarea>
            </div>
            <div class="form-group mt-3">
                <input id="inputPicture" name="picture" type="file" accept=".jpeg">
            </div>
            <?php 
                include "createTicket.php";
            ?>
            <button type="submit" class="btn btn-primary mt-4">Erstellen</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>