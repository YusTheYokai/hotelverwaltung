<div>
    <button id="editNewsPostButton"
            type="button"
            class="table-icon-button"
            title="News-Post bearbeiten"
            data-bs-toggle="modal"
            data-bs-target="#editNewsPostDialog">
        <img src="/icon/pencil-fill.svg" alt="Stift-Icon" />
    </button>
    <a id="deleteNewsPostButton" href="/index/deleteNewsPost.php?id=<?=$id?>" class="table-icon-button">
        <img src="/icon/trash-fill.svg" alt="Mülltonnen-Icon" title="News-Post löschen" />
    </a>
</div>