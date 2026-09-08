<!DOCTYPR html>
<html>
<head>
<title>Student Mark Analysis</title>
</head>
<body>
<h2>Student Mark Analysis</h2>
<form method="post">
WDD Mark:<input type="number" name="m1"><br><br>
Java Mark:<input type="number" name="m2"><br><br>
Python Mark:<input type="number" name="m3"><br><br>
DBMS Mark:<input type="number" name="m4"><br><br>
<input type="submit" name="submit" value="Calculate">
</form>

<?php
function calculateTotal($marks){
$total=0;
foreach($marks as $mark){
$total=$total+$mark;
}
return $total;
}

if(isset($_POST["submit"])){
$marks=array($_POST["m1"],$_POST["m2"],$_POST["m3"],$_POST["m4"]);

$total=calculateTotal($marks);
$average=$total/4;
$minimum=min($marks);
$maximum=max($marks);

echo "<h3>Total Marks: $total</h3>";
echo "<h3>Average Mark: $average</h3>";
echo "<h3>Minimim Marks: $minimum</h3>";
echo "<h3>Maximum Marks: $maximum</h3>";
}
?>
</body>
</html>

