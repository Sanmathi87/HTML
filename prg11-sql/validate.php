<?php

$name = $_POST["name"] ?? "";
$product = $_POST["product"] ?? "";
$quantity = $_POST["quantity"] ?? "";
$amount = $_POST["amount"] ?? "";

if (empty($name)) {
    echo "Customer name is required.";
}
else if (empty($product)) {
    echo "Product name is required.";
}
else if (empty($quantity)) {
    echo "Quantity is required.";
}
else if ($quantity <= 0) {
    echo "Quantity must be greater than 0.";
}
else if (empty($amount)) {
    echo "Amount is required.";
}
else if ($amount <= 0) {
    echo "Amount must be greater than 0.";
}
else {
    header("Location: success.php");
    exit();
}
?>