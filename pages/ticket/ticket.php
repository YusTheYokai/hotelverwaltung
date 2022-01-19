<tr>
    <td><?=$TITLE?></td>
    <td style="text-align: center;"> 
        <img src='../../uploads/<?=$USERNAME?>/thumbnails/<?=$PICTURE?>' 
                alt='Ein Bild' class='img-thumbnail'/> 
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
            if (isAdmin($_SESSION["user"])) {    //TODO: change Post Method to Get Method
                echo   "<form action = 'deleteTicket.php' method = 'post'>
                            <input type='hidden' name='TICKET_ID' value = '$ID'/>
                            <button class='table-icon-button' type='submit' value = 'delete'>
                                <img src='../../../icon/trash-fill.svg' alt='Trash-Icon'/>
                            </button>
                        </form>";
            }
        ?>
    </td>
<tr>
