<?php
    $backgroundRGB = $type === "INFO" ? "60, 255, 0" : "255, 60, 0";
?>
<div id="toast<?=$id?>" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background: rgba(<?=$backgroundRGB?>, 0.4); color: black;">
        <strong class="me-auto"><?=$type?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Schließen"></button>
    </div>
    <div class="toast-body" style="background: rgba(<?=$backgroundRGB?>, 0.2);"><?=$msg?></div>
</div>