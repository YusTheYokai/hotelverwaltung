<?php
    // Beim Prüfen wird auf die Session-Variable zugegriffen, dementsprechend muss
    // die Session vor Aufruf der Funktionen gestartet werden.

    /**
     * Prüft, ob ein User eingeloggt ist.
     * @return boolean ob der User eingeloggt ist.
     */
    function isLoggedIn() {
        return isset($_SESSION["user"]);
    }

    /**
     * Prüft, ob ein User Servicetechniker ist.
     * @return boolean ob der User Servicetechniker und dementsprechend auch eingeloggt ist.
     */
    function isTechnician() {
        return isLoggedIn() && $_SESSION["user"]["ROLE"] >= 1;
    }

    /**
     * Prüft, ob ein User Admin ist.
     * @return boolean ob der User Admin und dementsprechend auch eingeloggt ist.
     */
    function isAdmin() {
        return isLoggedIn() && $_SESSION["user"]["ROLE"] === 2;
    }

    /**
     * Prüft, ob ein User eingeloggt ist.
     * Ist dies nicht der Fall wird auf die 401-Error-Seite weitergeleitet.
     */
    function guardLoggedIn() {
        if (!isLoggedIn()) {
            header("Location: /pages/errorPages/401.php");
            exit();
        }
    }

    /**
     * Prüft, ob ein User Servicetechniker-Rechte besitzt.
     * Ist dies nicht der Fall wird auf die 403-Error-Seite weitergeleitet.
     */
    function guardTechnician() {
        guardLoggedIn();
        if (!isTechnician()) {
            header("Location: /pages/errorPages/403.php");
            exit();
        }
    }

    /**
     * Prüft, ob ein User Adminrechte besitzt.
     * Ist dies nicht der Fall wird auf die 403-Error-Seite weitergeleitet.
     */
    function guardAdmin() {
        guardLoggedIn();
        if (!isAdmin()) {
            header("Location: /pages/errorPages/403.php");
            exit();
        }
    }
?>