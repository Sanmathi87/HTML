<!DOCTYPE html>
<html>
<head>
<title>String Functions</title>
</head>
<body>
<h2>String Functions</h2>
<form method="post">
String:<input type="name" name="str" required><br><br>
Choose Function:<select name="ch">
<option value="length">String Length</option>
<option value="count">Word Count</option>
<option value="position">Position Of Character</option>
<option value="reverse">String Reverse</option>
<option value="replace">String Replace</option>
<option value="upper">String Uppercase</option>
<option value="split">String Split</option>
</select><br><br>
<input type="submit" value="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$str=$_POST["str"];
$ch=$_POST["ch"];

switch($ch){
case "length":
echo strlen($str);
break;
case "count":
echo str_word_count($str);
break;
case "position":
echo strpos($str,"s");
break;
case "reverse":
echo strrev($str);
break;
case "replace":
echo str_replace("s","#",$str);
break;
case "upper":
echo strtoupper($str);
break;
case "split":
print_r(str_split($str));
break;
}}
?>
</body>
</html>