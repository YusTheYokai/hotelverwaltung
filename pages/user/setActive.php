<?php
    session_start();

    include "../../guard.php";
    include "../../db/logIntoDB.php";


    guardAdmin();

    $location = "Location: /pages/user/users.php";
    if (isset($_GET["id"]) && isset($_GET["active"])) {
        $toggleActiveQuery = "UPDATE user SET ACTIVE = ? WHERE ID = ?;";
        $toggleActiveStatement = $db->prepare($toggleActiveQuery);
        $toggleActiveStatement->bind_param("ii", $_GET["active"], $_GET["id"]);
        $toggleActiveStatement->execute();

        if (isset($_GET["sortBy"]) && isset($_GET["order"])) {
            $location .= "?sortBy=" . $_GET["sortBy"] . "&order=" . $_GET["order"];
        }
    }
    
    header($location);
?>