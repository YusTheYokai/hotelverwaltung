<div class="container-fluid overlay quarter-width" style="margin-top: 5vh;">
    <h1>Passwort ändern</h1>
    <form class="text-center" method="POST" action="changePassword.php">
        <div class="form-group">
            <input type="password" id="passwordCurrent" name="passwordCurrent" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD"]?>" <?= !$editingOwnProfile ? "disabled" : "" ?> />
        </div>
        <div class="form-group mt-3">
            <input type="password" id="passwordNew" name="passwordNew" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD_NEW"]?>" />
        </div>
        <div class="form-group mt-3">
            <input type="password" id="passwordNewConfirm" name="passwordNewConfirm" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD_NEW_CONFIRM"]?>" />
        </div>
        <?php
            if (!$editingOwnProfile) {
                echo "<input type=\"hidden\" id=\"userId\" name=\"userId\" value=\"$id\" />";
            }
        ?>
        <button type="submit" class="btn btn-primary mt-4">Passwort ändern</button>
    </form>
</div>