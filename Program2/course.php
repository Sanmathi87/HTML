<?php
$name = isset($_GET["name"]) ? $_GET["name"] : "";
$sslc = isset($_GET["sslcmrk"]) ? $_GET["sslcmrk"] : "";
$hsc = isset($_GET["hscmrk"]) ? $_GET["hscmrk"] : "";
$course = isset($_GET["course"]) ? $_GET["course"] : "";

echo "<b>NAME:</b>".$name."<br>";
echo "<b>SSLC MARK:</b>".$sslc."<br>";
echo "<b>HSC MARK:</b>".$hsc."<br>";
echo "<b>COURSE SELECTED:</b>".$course."<br>";
?>