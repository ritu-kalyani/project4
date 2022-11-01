<?php
    session_start();

    $id = intval($_GET["id"]);
    foreach($_SESSION["cart"] as $item) {
        if (intval($item["productid"]) == $id)  {
            unset($_SESSION["cart"][$id]);
            break;
        }
    }
?>