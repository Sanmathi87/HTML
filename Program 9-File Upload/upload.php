<?php

if (!isset($_FILES["image"]) || $_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
    die("No file uploaded or upload failed.");
}

$image_file = $_FILES["image"];

$file_name = basename($image_file["name"]);
$upload_path = "C:\\image\\" . $file_name;

if (move_uploaded_file($image_file["tmp_name"], $upload_path)) {
    echo "File uploaded successfully: " . htmlspecialchars($file_name);
} else {
    echo "File upload failed.";
}

?>
