<div id="editNewsPostDialog" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editNewsPostDialogHeader" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content dialog">
            <form action="/index/editNewsPost.php" enctype="multipart/form-data" method="POST">
                <div id="editNewsPostDialogHeader" class="modal-header">
                    <h3>News-Post bearbeiten</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="inputTitle" name="TITLE" type="text" class="input-text form-control"
                               placeholder="Titel" required minlength="1" maxlength="100" value="<?=$title?>">
                    </div>
                    <div class="form-group mt-3">
                        <textarea id="inputContent" name="CONTENT" type="text" class="input-text form-control"
                                  style="height: 200px;" placeholder="Inhalt" required minlength="1" maxlength="2000"><?=$content?></textarea>
                    </div>
                    <div class="form-group mt-3" style="display: flex; justify-content: center;">
                        <input id="updatePicture<?=$id?>" type="checkbox" name="UPDATE_PICTURE" aria-labelledby="isNewPictureText<?=$id?>" style="height: 38px; width: 38px; margin-right: 10px;" />
                        <p id="isNewPictureText<?=$id?>" style="font-size: 20px;">Neues Bild hochladen?</p>
                        <input id="inputPicture<?=$id?>" name="PICTURE" type="file" accept=".jpeg"
                               class="input-text form-control display-none" placeholder="Bild">
                    </div>
                    <input type="hidden" name="NEWS_POST_ID" value="<?=$id?>" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Speichern</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let checkbox = document.getElementById("updatePicture<?=$id?>");
    let p = document.getElementById("isNewPictureText<?=$id?>");
    let input = document.getElementById("inputPicture<?=$id?>");

    checkbox.addEventListener("change", checkboxListener);

    function checkboxListener(e) {
        if (checkbox.checked) {
            p.classList.add("display-none");
            input.classList.remove("display-none");
        } else {
            p.classList.remove("display-none");
            input.classList.add("display-none");
        }
    }
</script>