<?php
    $newOrder = "ASC";
    if (!empty($sortBy) && !empty($order) && $sortBy === $col && $order === "ASC") {
        $newOrder = "DESC";
    }
?>
<th scope="col">
    <a href="?sortBy=<?=$col?>&order=<?=$newOrder?>"><?=$lang[$col]?></a>
</th>