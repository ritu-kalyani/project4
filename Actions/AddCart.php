<?php
session_start();
require_once "../common/_database.php";

$item = $_GET["id"];
$sql_query = "SELECT * FROM menu WHERE productid='" . $item . "'";
$result_item = $conn->query($sql_query);
    
$row = $result_item->fetch_assoc();
    $arr = array(
        "productid" => $item,
        "pname" => $row["pname"],
        "drinkprice" => $row["drinkprice"],
        "quantity" => 1,
        "total" => $row["drinkprice"]
    );

if (isset($_SESSION['cart'])) {
    $_SESSION['cart'][$item] = $arr;
}

else {
    $_SESSION['cart'][$item] = $arr;
}