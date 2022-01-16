<?php
    /**
     * Formartiert eine Anrede von der Integer-Darstellung
     * zur Textdarstellung.
     * @param int $honorific Anrede
     * @return string formartierte Anrede
     */
    function formatHonorific($honorific) {
        if ($honorific === 0) {
            return "Herr";
        } else if ($honorific === 1) {
            return "Frau";
        } else if ($honorific === 2) {
            return "Divers";
        } else {
            return "???";
        }
    }

    /**
     * Formartiert einen Namen. Beispiel: "Nachname, Vorname"
     * @param string $firstName Vorname
     * @param string $lastName Nachname
     * @return string den formariteren Namen.
     */
    function formatName($firstName, $lastName) {
        return $lastName . ", " . $firstName;
    }

    /**
     * Formartiert eine Rolle von der Integer-Darstellung
     * zur Textdarstellung.
     * @param int $role Rolle
     * @return string formartierte Rolle
     */
    function formatRole($role) {
        if ($role === 0) {
            return "Gast";
        } else if ($role === 1) {
            return "Servicetechniker*in";
        } else if ($role === 2) {
            return "Admin";
        } else {
            return "???";
        }
    }

    /**
     * Formatiert ein Timestamp. Beispiel: "Freitag, 17. Dezember 2021, 20:16 Uhr"
     * @param string $timestamp Timestamp
     * @return string das formartierte Timestamp.
     */
    function formatTimestamp($timestamp) {
        setlocale(LC_ALL, "de-AT");
        return strftime("%d.%m.%Y, %H:%M Uhr", strtotime($timestamp));
    }

    /**
     * Ändert einen Status Integer zu einem dazu passendem Statement
     */
    function formatTicketStatus($x) {
        if ($x == 0) {
            return "offen";
        }
        else if ($x == 1) {
            return "erfolgreich geschlossen";
        }
        else if ($x == 2) {
            return "erfolglos geschlossen";
        }
    }
?>