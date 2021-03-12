<?php
if (! empty($_POST["cargar"])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $targetPath = "imagenes/" . $_FILES['userImage']['name'];
        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
            $uploadedImagePath = $targetPath;
        }
    }
    
    $imagePath = "imagenes/cat.jpg";
if (! empty($uploadedImagePath)) {
    $imagePath = $uploadedImagePath;
}
?>