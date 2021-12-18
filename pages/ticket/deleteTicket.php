<?php
    require "../../db/logintoDB.php";

    if(isset($_POST["ID"]) && $_POST['ID'] > 0){
        echo "Lösche Ticket mit ID: " + $
        $sql = "DELETE FROM ticket WHERE ID = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST['ID']);
        $stmt->execute();
        $db->close();

        header("Location: pages/ticket/tickets.php");
    }
?>