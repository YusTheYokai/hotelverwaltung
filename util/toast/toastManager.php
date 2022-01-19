<?php
    require_once "/xampp/htdocs/translator.php";

    echo "<div class=\"toast-container position-fixed top-0 end-0 p-3\" style='z-index: 2;'>";
    $counter = 0;
    while (toastParamExists($counter)) {
        $id = $counter;
        $type = translate($_GET["type$counter"]);
        $msgParts = explode(":", $_GET["msg$counter"]);
        $msgParts = array_map(function($key) { return translate($key); }, $msgParts);
        $msg = implode(": ", $msgParts);
        require "toast.php";
        $counter++;
    }
    echo "</div>";
    
    /**
     * Prüft, ob die GET-Parameter für ein Toast existieren.
     * @param int $counter x-te Parameter
     * @return boolean ob die Parameter existieren.
     */
    function toastParamExists($counter) {
        return isset($_GET["type$counter"]) && isset($_GET["msg$counter"]);
    }
?>