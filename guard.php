<?php

    /**
     * Prüft, ob ein User eingeloggt ist.
     * Ist dies nicht der Fall wird auf die 401-Error-Seite weitergeleitet.
     * Beim Prüfen wird auf die Session-Variable zugegriffen, dementsprechend muss
     * die Session vor Aufruf der Funktion gestartet werden.
     */
    function guardLoggedIn() {
        if (!isset($_SESSION["user"])) {
            header("Location: /pages/errorPages/401.php");
            exit();
        }
    }

    /**
     * Prüft, ob ein User Adminrechte besitzt.
     * Ist dies nicht der Fall wird auf die 403-Error-Seite weitergeleitet.
     * Beim Prüfen wird auf die Session-Variable zugegriffen, dementsprechend muss
     * die Session vor Aufruf der Funktion gestartet werden.
     */
    function guardAdmin() {
        guardLoggedIn();
        if ($_SESSION["user"]["ROLE"] !== 2) {
            header("Location: /pages/errorPages/403.php");
            exit();
        }
    }
?>