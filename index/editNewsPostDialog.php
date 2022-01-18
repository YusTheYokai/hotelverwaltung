<div id="newsPostDialog" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="newsPostDialogHeader" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content dialog">
            <form action="index/createNewsPost.php" enctype="multipart/form-data" method="POST">
                <div id="newsPostDialogHeader" class="modal-header">
                    <h3>News-Post bearbeiten</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="inputTitle" name="title" type="text" class="input-text form-control" placeholder="Titel" required maxlength="100">
                    </div>
                    <div class="form-group mt-3">
                        <textarea id="inputContent" name="content" type="text" class="input-text form-control" style="height: 200px;" placeholder="Inhalt" required maxlength="2000"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input id="inputPicture" name="picture" type="file" accept=".jpeg" class="input-text form-control" placeholder="Bild">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Speichern</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </form>
        </div>
    </div>
</div>