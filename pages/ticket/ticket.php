<?php
    $picture = empty($PICTURE) ? "../../images/noImage.png" : "../../uploads/$USERNAME/thumbnails/$PICTURE";
?>
<tr>
    <td><?=$TITLE?></td>
    <td style="text-align: center;"> 
        <img src='<?=$picture?>' class="ticket-image" alt='Ein Bild' class='img-thumbnail'/>
    </td>
    <td><?=$CONTENT?></td>
    <td><?=$LAST_NAME?></td>
    <td><?=$FIRST_NAME?></td>
    <td><?=formatTimestamp($CREATION_TIME)?></td>
    <td>
        <?php
            $origin = "/pages/ticket/tickets.php";
            require "ticketStatusButton.php";
        ?>
    </td> 
    <td>
        <a href="ticketDetails.php?TICKET_ID=<?=$ID?>" class='table-icon-button'>
            <img src='../../../icon/box-arrow-up-right.svg' alt='Open-Icon'/>
        </a>
        <?php
            if (isAdmin($_SESSION["user"])) {
                require "deleteTicketButton.php";
            }
        ?>
    </td>
<tr>
