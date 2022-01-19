<?php
    session_start();
    require_once "db/logIntoDB.php";
    require_once "guard.php";

    // Wenn der logout-Parameter geschickt wird soll überprüft werden,
    // ob dieser true ist. Ist dies der Fall wird der User ausgeloggt.
    if (isset($_GET["logout"])) {
        $logout = $_GET["logout"];
        if (isset($logout) && $logout) {
            session_unset();
            session_destroy();
        }
    }

    $filter = "%";
    if (isset($_GET["filter"]) && !empty($_GET["filter"])) {
        $filter = "%" . htmlspecialchars_decode($_GET["filter"]) . "%";
    }

    // Laden aller News-Posts aus der Datenbank.
    $selectAllQuery = "SELECT news_post.ID, TITLE, CONTENT, PICTURE, CREATION_TIME, FIRST_NAME, LAST_NAME, USERNAME FROM news_post JOIN user ON (news_post.USER_ID = user.ID) WHERE TITLE LIKE ? OR CONTENT LIKE ? ORDER BY CREATION_TIME DESC;";
    $selectAllStatement = $db->prepare($selectAllQuery);
    $selectAllStatement->bind_param("ss", $filter, $filter);
    $selectAllStatement->execute();
    $selectAllStatement->bind_result($id, $title, $content, $picture, $creationTime, $firstName, $lastName, $username);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotelverwaltung</title>
        <link rel="icon" href="/icon/hotelIcon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/index.css" rel="stylesheet">
        <link href="/css/newsPost.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "menubar.php";
            if (isAdmin()) {
                require_once "index/newsPostDialog.php";
            }
        ?>
        <div id="actions" class="position-sticky">
            <?php
                if (isAdmin()) {
                    require_once "index/createNewsPostButton.php";
                }
            ?>
            <div>
                <input type="text" id="filterInput" class="input-text form-control hidden" placeholder="Filter" />
                <button id="filterButton" class="table-icon-button">
                    <img src="/icon/search.svg" alt="Such-Icon" title="Filtern" />
                </button>
                <?php
                    if (isset($_GET["filter"])) {
                        require_once "index/resetFilterButton.php";
                    }
                ?>
            </div>
        </div>
        <div class="footer-margin-bottom" style="margin-top: 20px;">
            <?php
                while ($selectAllStatement->fetch()) {
                    require "index/newsPost.php";
                }
            ?>
        </div>
        <?php
            require_once "/xampp/htdocs/util/bottomIncludes.php";
        ?>
        

        <script>
            let filterButton = document.getElementById("filterButton");
            let filterInput =  document.getElementById("filterInput");

            // Dem Filterbutton einen Klick-Listener hinzufügen, damit das Eingabefeld angezeigt wird
            filterButton.addEventListener("click", showInput);
            // Dem Eingabefeld für das Filtern einen Listener für das keypress Event hinzufügen.
            filterInput.addEventListener("keypress", filterOnEnter);

            function showInput(e) {
                filterButton.classList.add("inputShown")
                // Den Listener für das Anzeigen des Eingabefeldes entfernen.
                filterButton.removeEventListener("click", showInput);
                // Den Listener für das Filtern hinzufügen.
                filterButton.addEventListener("click", filter);

                filterInput.classList.remove("hidden");
                filterInput.focus();
            }

            /**
             * Setzt den URL-Parameter filter, wenn Enter gedrückt wurde.
             */
            function filterOnEnter(e) {
                // 13 = Enter
                if (e.keyCode === 13) {
                    filter();
                }
            }

            /**
             * URL-Parameter mit dem Eingabetext setzen
             */
            function filter() {
                location.href = "?filter=" + filterInput.value;
            }
        </script>
    </body>
</html>
