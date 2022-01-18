<?php
    require_once "displayUtils.php";

    $picturePath = "images/noImage.png";
    if ($picture) {
        $picturePath = "\"uploads/" . $username . "/thumbnails/" . $picture . "\"";
    }
?>
<!-- TODO: Vielleicht kann man es machen,
    dass in der Mobile-Ansicht die Überschrift
    über dem Bild anstatt darunter ist. -->
<div class="container mb-4 overlay news-post-container">
    <div class="row justify-content-start">
        <div class="col-lg-4" style="text-align: center;">
            <img src=<?=$picturePath?> alt="Bild für News-Post" class="news-post-image" />
        </div>
        <div class="col-lg-8" style="position: relative;">
            <h1><?=$title?></h1>
            <p class="news-post-text"><?=$content?></p>
            <div class="news-post-footer">
                <p class="author-date"><?=formatName($firstName, $lastName)?> - <?=formatTimestamp($creationTime)?></p>
                <?php
                    if (isAdmin()) {
                        require "newsPostActions.php";
                    }
                ?>
            </div>
        </div>
    </div>
</div>