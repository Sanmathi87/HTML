<!DOCTYPE html>
<html>
<head>
    <title>Read and Write File</title>
</head>
<body>
<?php
$filename = "C:/xampp/htdocs/24sbcs087/sample1.txt";
if (!file_exists($filename)) {
    echo "File '$filename' does not exist";
    exit();
}
$file = fopen($filename, "r");
if ($file == false) {
    echo "Error in opening file";
    exit();
}
$filesize = filesize($filename);
$filetext = fread($file, $filesize);
fclose($file);
echo "File size: $filesize bytes<br>";
echo "<pre>" . htmlspecialchars($filetext) . "</pre>";
$file = fopen($filename, "w");
if ($file == false) {
    echo "Error in opening file for writing";
    exit();
}
$text_to_write = "This is a simple text";
fwrite($file, $text_to_write);
fclose($file);
$file = fopen($filename, "r");
if ($file == false) {
    echo "Error in opening file for reading";
    exit();
}
$filesize = filesize($filename);
$filetext = fread($file, $filesize);
fclose($file);
echo "<br>File size after writing: $filesize bytes<br>";
echo "Content after writing: $filetext<br>";
echo "File name: $filename";
?>
</body>
</html>
