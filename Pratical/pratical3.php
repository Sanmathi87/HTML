<!DOCTYPE html>
<html>
<head>
<title>Bank Transaction</title>
</head>
<body>
<h2>Bank Transaction System</h2>

<form method="post">
Balance:<input type="number" name="balance" required><br><br>
Type:<select name="type">
<option value="deposit">Deposit</option>
<option value="withdraw">Withdraw</option>
</select><br><br>
Amount:<input type="number" name="amount" required><br><br>
<input type="submit" value="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$balance=$_POST["balance"];
$type=$_POST["type"];
$amount=$_POST["amount"];

switch($type){
case "deposit":
$balance = $balance + $amount;
echo "<p>Deposit Successfully!</p><br>";
break;

case "withdraw":
if($amount <= $balance){
$balance=$balance-$amount;
echo"<p>Withdrawal Successful!</p>";
}else{
echo "Insufficient Balance!!<br>";
}
break;
}
echo "Balance: $balance<br>";


//for loop
$transaction=2;
echo "<br>Transactions:<br>";
for($i=1;$i <= $transaction;$i++){
echo "Transaction $i<br>";
}}
?>
</body>
</html>

