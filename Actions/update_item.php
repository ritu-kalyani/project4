<?php 
session_start();

$itemID = intval($_GET["id"]);
$quantity = intval($_GET["quantity"]);

foreach($_SESSION["cart"] as $item) {
    if (intval($item["productid"]) == $itemID)  {
        $_SESSION["cart"][$itemID]["quantity"] = $quantity;
        break;
    }
}