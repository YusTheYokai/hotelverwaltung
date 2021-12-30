<?php
    $columnsArray = explode(",", $columns);
    
    $sortBy = "";
    $order = "";
    if (isset($_GET["sortBy"]) &&
            in_array(($sortBy = $_GET["sortBy"]), $columnsArray) &&
            isset($_GET["order"]) &&
            (($order = $_GET["order"]) === "ASC" || $order === "DESC")) {
        $query .= " ORDER BY $sortBy $order";
    }
    $query .= ";";
?>