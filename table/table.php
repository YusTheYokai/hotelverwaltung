<div class="container-fluid overlay custom-table">
    <h1 id="tableTitle"><?=$tableTitle?></h1>
    <div class="table-responsive-lg">
        <table class="table" aria-describedby="tableTitle">
            <thead class="position-sticky">
                <tr>
                    <?php
                        foreach ($columnsArray as $col) {
                            if (!str_contains($col, "ID") && !str_contains($ignoreColumns, $col)) {
                                include "th.php";
                            }
                        }
                    ?>
                    <th scope="col">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($statement->fetch()) {
                        include $entity;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>