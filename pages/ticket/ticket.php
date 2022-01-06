
    <tr>
        <td><?=$TITLE?></td>
        <td>
            <img src='../../uploads/<?=$USERNAME?>/thumbnails/<?=$PICTURE?>' 
                 alt='Ein Bild' class='img-thumbnail col-3' /> 
        </td>
        <td><?=$CONTENT?></td>
        <td><?=formatName($FIRST_NAME, $LAST_NAME)?></td>
        <td><?=formatTimestamp($CREATION_TIME)?></td>
        <td><?=$STATUS?></td>
        <?php    
            if($_SESSION['user']['ROLE'] > 0){
                echo"<td><form action = 'deleteTicket.php' method = 'post'><input type='hidden' name='id' value = '$ID'/>
                    <button class='table-icon-button' type='submit' value = 'delete'><img src='../../../icon/trash-fill.svg' class='icon' alt='Trash-Icon'/></button></form></td>";
            }
        ?>
    <tr>
