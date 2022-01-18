<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <?=formatTicketStatus($STATUS)?>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php
            if ($STATUS !== 0) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?TICKET_ID=$ID&STATUS=0&ORIGIN=$origin'>öffnen</a>";
                echo "</li>";
            }
        ?>    
        <?php
            if ($STATUS !== 1) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?TICKET_ID=$ID&STATUS=1&ORIGIN=$origin'>erfolgreich schließen</a>";
                echo "</li>";
            }
        ?>    
        <?php
            if ($STATUS !== 2) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?TICKET_ID=$ID&STATUS=2&ORIGIN=$origin'>erfolglos schließen</a>";
                echo "</li>";
            }
        ?>    
    </ul>
</div>