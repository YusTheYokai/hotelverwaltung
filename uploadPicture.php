<?php
    if (isset($_FILES["PICTURE"]) && !empty($_FILES["PICTURE"]["name"])) {
        require_once($moveToRoot . "/util/validation/validation.php");

        $maxFileSize = 15 * 1000 * 1000;
        $target_dir =  $moveToRoot . "/uploads/" . $_SESSION["user"]["USERNAME"] . "/";
        $file = $_FILES["PICTURE"];
        $fileName = $file["name"];
        $target_file = $target_dir . basename($fileName);

        $validator = new Validator();
        $validationResultExtension = new ValidationResult("FILE_EXTENSION");
        $validationResultSize = new ValidationResult("FILE_SIZE");
        $validationResultExists = new ValidationResult("FILE_EXISTS");

        // Prüfen, ob die Dateiendung passt
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($extension !== "jpeg") {
            $validationResultExtension->addErrorMessage("NOT_JPEG");
        // Prüfen, ob die Datei größer als 15MB ist
        } else if ($file["size"] > $maxFileSize) {
            $validationResultSize->addErrorMessage("TOO_BIG");
        // Prüfen, ob die Datei bereits existiert
        } else if (file_exists($target_file)) {
            $validationResultExists->addErrorMessage("ALREADY_EXISTS");
        }

        $validator->addValidationResult($validationResultExtension);
        $validator->addValidationResult($validationResultSize);
        $validator->addValidationResult($validationResultExists);
        if ($validator->hasFailed()) {
            if (isset($_POST["ORIGIN"])) {
                header("Location: " . $_POST["ORIGIN"] . "?" . $validator->generateUrlErrorParams());
            } else {
                header("Location: " . $moveToRoot . "/index.php?" . $validator->generateUrlErrorParams());
            }
            exit;
        }

        // Keine Validierungsfehler -> Datei erstellen
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            list($width, $height) = getimagesize($target_file);
            $thumbnail = imagecreatetruecolor(720, 480);
            $source = imagecreatefromjpeg($target_file);
            imagecopyresized($thumbnail, $source, 0, 0, 0, 0, 720, 480, $width, $height) && imagejpeg($thumbnail, $target_dir . "thumbnails/" . $fileName);
        }
    }
?>