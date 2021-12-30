<?php
    $lang = parse_ini_file("lang/de.ini", TRUE);
    if (!$lang) {
        error_log("Language file could not be parsed.");
        header("Location: /pages/errorPages/500.php");
        exit;
    }
?>