
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
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?=formatTicketStatus($STATUS)?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class='dropdown-item' href='statusChange.php?id=<?=$ID?>&status=0'>öffnen</a></li>
                <li><a class='dropdown-item' href='statusChange.php?id=<?=$ID?>&status=1'>erfolgreich schließen</a></li>
                <li><a class='dropdown-item' href='statusChange.php?id=<?=$ID?>&status=2'>erfolglos schließen</a></li>
            </ul>
        </div>
    </td>
    <td>
        <?php
            require_once "../../guard.php";

            if (isAdmin($_SESSION["user"])) {    //TODO: change Post Method to Get Method
                echo   "<form action = 'deleteTicket.php' method = 'post'>
                            <input type='hidden' name='id' value = '$ID'/>
                            <button class='table-icon-button' type='submit' value = 'delete'>
                                <img src='../../../icon/trash-fill.svg' alt='Trash-Icon'/>
                            </button>
                        </form>";
            }
            //TODO: new Button to look at a singular ticket
        ?>
    </td>
<tr>
