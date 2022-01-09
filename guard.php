<?php
    // Bei Funktionen ohne Übergabeparameter wird auf die Session-Variable zugegriffen,
    // dementsprechend muss die Session vor Aufruf der Funktionen gestartet werden.

    /**
     * Prüft, ob der User eingeloggt ist.
     * @return boolean ob der User eingeloggt ist.
     */
    function isLoggedIn() {
        return isset($_SESSION["user"]);
    }

    /**
     * Prüft, ob der übergebene User eingeloggt ist.
     * @return boolean ob der übergebene User eingeloggt ist.
     */
    function isUserLoggedIn($user) {
        return isset($user);
    }

    /**
     * Prüft, ob der User Admin ist.
     * @return boolean ob der User Admin und dementsprechend auch eingeloggt ist.
     */
    function isAdmin() {
        return isLoggedIn() && isUserAdmin($_SESSION["user"]);
    }

    /**
     * Prüft, ob der übergebene User Admin ist.
     * @return boolean ob der übergebene User Admin und dementsprechend auch eingeloggt ist.
     */
    function isUserAdmin($user) {
        return isUserLoggedIn($user) && $user["ROLE"] === 2;
    }

    /**
     * Prüft, ob der User eingeloggt ist.
     * Ist dies nicht der Fall wird auf die 401-Error-Seite weitergeleitet.
     */
    function guardLoggedIn() {
        if (!isLoggedIn()) {
            header("Location: /pages/errorPages/401.php");
            exit();
        }
    }

    /**
     * Prüft, ob der User Adminrechte besitzt.
     * Ist dies nicht der Fall wird auf die 403-Error-Seite weitergeleitet.
     */
    function guardAdmin() {
        guardLoggedIn();
        if (!isAdmin()) {
            guard();
        }
    }

    /**
     * Leitet auf die 403-Error-Seite weiter.
     */
    function guard() {
        header("Location: /pages/errorPages/403.php");
        exit();
    }
?>