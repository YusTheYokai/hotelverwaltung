<?php
    if (isset($_FILES["picture"])) {
        $maxFileSize = 15 * 1000 * 1000;
        $target_dir =  $moveToRoot . "/uploads/" . $_SESSION["user"]["USERNAME"] . "/";
        $file = $_FILES["picture"];
        $fileName = $file["name"];
        $target_file = $target_dir . basename($fileName);
        
        // Check if the file is of the accepted file type
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($extension !== "jpeg") {
            echo "<p class='red'>Sorry, only JPEG-files can be accepted!</p>";
            return;
        // Check if the file size is below the maximum limit
        } else if ($file["size"] > $maxFileSize) {
            echo "<p class='red'>Sorry, only JPEG-files of 15MB or less can be accepted!</p>";
            return;
        // Check if the file already exists
        } else if (file_exists($target_file)) {
            echo "<p class='red'>Sorry, file already exists!</p>";
            return;
        }
        
        // If everything is OK, upload the file
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            list($width, $height) = getimagesize($target_file);
            $thumbnail = imagecreatetruecolor(720, 480);
            $source = imagecreatefromjpeg($target_file);
            if(imagecopyresized($thumbnail, $source, 0, 0, 0, 0, 720, 480, $width, $height) && imagejpeg($thumbnail, $target_dir . "thumbnails/" . $fileName)) {
                echo "<p class='green'>The file ";
                echo $fileName;
                echo " has been uploaded</p>";
            }
        }
    }
?>