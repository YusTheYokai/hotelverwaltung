<?php
    $icon = "../../icon/";
    $alt;
    $title;
    $trClass = "";
    if ($active) {
        $icon .= "lock-fill.svg";
        $alt = "Geschlossenes Schloss Icon";
        $title = "User deaktiveren";
    } else {
        $icon .= "unlock-fill.svg";
        $alt = "Offenes Schloss Icon";
        $title = "User aktivieren";
        $trClass = "class='overlay'";
    }

    $newActiveState = !$active;
    $setActiveUrl = "/pages/user/setActive.php?id=$id&active=$newActiveState";
    if (!empty($sortBy) && !empty($order)) {
        $setActiveUrl .= "&sortBy=$sortBy&order=$order";
    }

?>
<tr <?php $username === "nlerchl" ? "\"id='test'\"" : '' ?> <?=$trClass?>>
    <td><?=$honorific?></td>
    <td><?=$lastName?></td>
    <td><?=$firstName?></td>
    <td><?=$username?></td>
    <td><?=$lang[$active ? "'yes'" : "'no'"]?></td>
    <td>
        <a href="<?=$setActiveUrl?>" class="table-icon-button" title="<?=$title?>">
            <img src="<?=$icon?>" alt="<?=$alt?>" />
        </a>
        <a title="Stammdaten ändern" class="table-icon-button">
            <img src="../../icon/person-circle.svg" alt="User Icon" />
        </a>
    </td>
</tr>