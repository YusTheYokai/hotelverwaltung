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

    $newActiveState = $active ? 0 : 1;
    $setActiveUrl = "/pages/user/setActive.php?USER_ID=$id&ACTIVE=$newActiveState";
    if (!empty($sortBy) && !empty($order)) {
        $setActiveUrl .= "&sortBy=$sortBy&order=$order";
    }
?>
<tr <?php $username === "nlerchl" ? "\"id='test'\"" : '' ?> <?=$trClass?>>
    <td><?=formatHonorific($honorific);?></td>
    <td><?=$lastName?></td>
    <td><?=$firstName?></td>
    <td><?=$username?></td>
    <td><?=$email?></td>
    <td><?=formatRole($role)?></td>
    <td><?=$lang[$active ? "'yes'" : "'no'"]?></td>
    <td>
        <a href="<?=$setActiveUrl?>" class="table-icon-button  <?=$id === $_SESSION["user"]["ID"] ? 'disabled' : ''?>" title="<?=$title?>">
            <img src="<?=$icon?>" alt="<?=$alt?>" />
        </a>
        <a href="../profile/profile.php?USER_ID=<?=$id?>" class="table-icon-button" title="Profil bearbeiten">
            <img src="../../icon/person-circle.svg" alt="User Icon" />
        </a>
    </td>
</tr>