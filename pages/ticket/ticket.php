
<tr>
    <td><?=$TITLE?></td>
    <td style="text-align: center;"> 
        <img src='../../uploads/<?=$USERNAME?>/thumbnails/<?=$PICTURE?>' 
                alt='Ein Bild' class='img-thumbnail'/> 
    </td>
    <td><?=$CONTENT?></td>
    <td><?=formatName($FIRST_NAME, $LAST_NAME)?></td>
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
    <?php    
        if ($_SESSION['user']['ROLE'] > 0) {
            echo"<td>
                    <form action = 'deleteTicket.php' method = 'post'>
                        <input type='hidden' name='id' value = '$ID'/>
                        <button class='table-icon-button' type='submit' value = 'delete'>
                            <img src='../../../icon/trash-fill.svg' alt='Trash-Icon'/>
                        </button>
                    </form>
                </td>";
        }
    ?>
<tr>
