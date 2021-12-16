<?php
    $lang = parse_ini_file("lang/de.ini", TRUE);
    foreach($lang['registration'] as $key => $value) {
        $inputs[$key] = $_GET[$key];
    }
    
    $error_counter = 0;
    foreach($inputs as $k => $v) {
        if (!validate($k, $v, $lang)) {
            $error_counter++;
        }
    }
    
    if ($error_counter === 0) {
        echo "<h1>Alle Eingaben sind gültig!";
    }

    // Funktionen

    function validate($key, $value, $lang) {
        if (!is_valid($value)) {
            print_error($lang['registration'][$key]);
            return false;
        }
        return true;
    }
    
    function is_valid($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return !empty($input);
    }
    
    function print_error($name) {
        echo "<p style=\"color: red\">Die Eingabe für $name ist nicht gültig.</p>";
    }
?>
