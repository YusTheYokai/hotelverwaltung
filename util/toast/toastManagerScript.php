<?php
    echo "<script>";
    for ($i = 0; $i < $counter; $i++) {
        echo "bootstrap.Toast.getOrCreateInstance(document.getElementById('toast$i')).show();\n";
    }
    echo "</script>";
?>