<?php
    $order = "ASC";
    if (isset($_GET["order"])) {
        if ($_GET["order"] === "ASC") {
            $order = "DESC";
        }
    }
?>
<th scope="col">
    <a href="?sortBy=<?=$col?>&order=<?=$order?>"><?=$lang[$col]?></a>
</th>