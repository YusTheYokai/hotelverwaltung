<div id="commentContainer" class="container-fluid overlay">
    <p><?=$content?></p>
    <div>
        <?=formatName($firstName, $lastName)?> - <?=formatTimestamp($creationTime)?>
        <?php
            if ($_SESSION["user"]["ID"] === $userId) {
                require "comment/deleteCommentButton.php";
            }
        ?>
    </div>
</div>