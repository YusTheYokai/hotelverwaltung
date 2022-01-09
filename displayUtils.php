<?php 
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
     * Formatiert ein Timestamp. Beispiel: "Freitag, 17. Dezember 2021, 20:16 Uhr"
     * @param string $timestamp Timestamp
     * @return string das formartierte Timestamp.
     */
    function formatTimestamp($timestamp) {
        setlocale(LC_ALL, "de-AT");
        return strftime("%A, %d. %B %Y, %H:%M Uhr", strtotime($timestamp));
    }

    /**
     * Ändert einen Status Integer zu einem dazu passendem Statement
     */
    function formatTicketStatus($x) {
        if ($x == 0){
            return "offen";
        }
        else if ($x == 1){
            return "erfolgreich geschlossen";
        }
        else if ($x == 2){
            return "erfolglos geschlossen";
        }
    }
?>