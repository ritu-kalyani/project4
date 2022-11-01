<?php
    session_start();

    require_once "../common/_database.php";

    $address = $_GET["address"] . " " . $_GET["zipcode"];
    $phoneNo = $_GET["phoneNo"];
    $bank_d = $_GET["details"];
    $total = $_GET["total"];

    $userID = $conn->query("SELECT uid FROM user WHERE username='" . $_SESSION["username"] . "'")->fetch_assoc()["uid"];

    $insertOrder = "INSERT INTO orders(uid, total, address, phone, Bankdetails) VALUES ('" . $userID . "', '" . $total . "', '" . $address . "', '" . $phoneNo ."', '" . $bank_d ."')";
    $exec = $conn->query($insertOrder);

    $oid = $conn->insert_id;

    foreach($_SESSION["cart"] as $item) {
        $insertItem = "INSERT INTO order_product(oid, productid, quantity) VALUES('" . $oid . "', '" . $item["productid"]. "', '" . $item["quantity"] . "')";
        $exec = $conn->query($insertItem);
    }
?>