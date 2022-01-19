<div class="container-fluid overlay quarter-width footer-margin-bottom" style="margin-top: 5vh;">
    <h1>Passwort ändern</h1>
    <form class="text-center" method="POST" action="changePassword.php">
        <div class="form-group">
            <input type="password" id="passwordCurrent" name="PASSWORD_CURRENT" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD"]?>" <?= !$editingOwnProfile ? "disabled" : "" ?> />
        </div>
        <div class="form-group mt-3">
            <input type="password" id="passwordNew" name="PASSWORD_NEW" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD_NEW"]?>" />
        </div>
        <div class="form-group mt-3">
            <input type="password" id="passwordNewConfirm" name="PASSWORD_NEW_CONFIRM" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["PASSWORD_NEW_CONFIRM"]?>" />
        </div>   
        <input type="hidden" id="userId" name="USER_ID" value="<?=$_GET["USER_ID"]?>" />
        <button type="submit" class="btn btn-primary mt-4">Passwort ändern</button>
    </form>
</div>