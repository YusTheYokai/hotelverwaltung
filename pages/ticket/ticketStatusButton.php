<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <?=formatTicketStatus($STATUS)?>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php
            if ($STATUS !== 0) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?id=$ID?>&status=0&origin=$origin'>öffnen</a>";
                echo "</li>";
            }
        ?>    
        <?php
            if ($STATUS !== 1) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?id=$ID?>&status=1&origin=$origin'>erfolgreich schließen</a>";
                echo "</li>";
            }
        ?>    
        <?php
            if ($STATUS !== 2) {
                echo "<li>";
                echo "<a class='dropdown-item' href='changeStatus.php?id=$ID?>&status=2&origin=$origin'>erfolglos schließen</a>";
                echo "</li>";
            }
        ?>    
    </ul>
</div>