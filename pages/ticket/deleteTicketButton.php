<?php
    $url = "deleteTicket.php?TICKET_ID=$ID";
    if (!empty($sortBy) && !empty($order)) {
        $url .= "&sortBy=$sortBy&order=$order";
    }
?>
<a href="<?=$url?>" class='table-icon-button' type='submit' value = 'delete'>
    <img src='../../../icon/trash-fill.svg' alt='Trash-Icon'/>
</a>