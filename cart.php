<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Mere Drinkers</title>
    <!-- Icons from font awesome -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d232ec003.js" crossorigin="anonymous"></script>
    <!-- Linking style sheets -->
    <link rel="stylesheet" href="./css/style.css">
    
    <style>
        .cs{
            width: 100px;
            height: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php 
    require_once "common/nav.php";
    require_once "common/_database.php";

    if(isset($_SESSION["username"])){
    ?>
    
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-3">
                <h1>My Cart</h1>
            </div>
    
            <div class="col-lg-8">
                
                <div class="card wish-list mb-3">
                    <table class="table text-center" style="font-size:20px;">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                if (isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $row){
                                        
                                        echo "<tr class='row". $row["productid"] ."'>";  
                                        echo "<td>" . $row["pname"] . "</td>";
                                        echo "<td id='price" . $row["productid"]. "'>" . $row["drinkprice"] . "</td>";
                                        echo "<td><input id='" . $row["productid"] . "' class='quantity' type='number' min=0 value=" . $row["quantity"] . " </input></td>";
                                        echo "<td id='total" . $row["productid"] . "' class='total'>" . $row["total"] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else{
                                    echo '<div style="font-size:20px;color:black;text-align:center;">Cart is Empty Add something and checkout</div>';
                                }
       
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                    <div class="card wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center" style="font-size:20px;">Order summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light" style="font-size:20px;">Total Price<span style="font-size:20px;">£ <span style="font-size:20px;" class='finalPrice'>0</span></span></li>   
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>
    <br><br>
    <section id="cart-heading" class="pt-5 mt-5 container">
        <h1 class="font-weight-bold pt-5" style="color: white; margin-top:100px;">Checkout</h1>
   </section>

    <div class="container">
        <form method="post">
                        <div class="form-group">
                            <b><label for="address" style="font-size:20px;color:white;">Address:</label></b>
                            <input class="form-control" style="font-size:20px;" id="address" name="address" placeholder="Address line 1" type="text" required minlength="3" maxlength="500">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="phone" style="font-size:20px;color:white;">Phone No:</label></b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+44</span>
                                </div>
                                <input type="tel" class="form-control"  style="font-size:20px;" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="zipcode"  style="font-size:20px;color:white;">Zip Code:</label></b>
                                <input type="text" class="form-control"  style="font-size:20px;" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">                    
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="zipcode"  style="font-size:20px;color:white;">Bank details:</label></b>
                                <input type="text"  style="font-size:20px;" class="form-control" id="details" name="details" placeholder="Enter Bank Details" maxlength="700">                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="amount" value=""> <!-- Total Price -->
                            
                            <button type="submit" name="checkout"  id="checkout" class="btn btn-light">Order</button>
                        </div>
        </form>
    </div>

    <?php 
    }
    else {
        echo '<div>
         <p style="text-align:center;color:white;font-size:40px;margin-top : 300px;margin-bottom : 250px;">Login is mandatory step to order or checkout.</p>
        </div>';
     }
     ?>                       

    




<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>        

<script>
    calculateCartTotal();

    function calculateCartTotal() {
        ID = $("*").map(function() {
            if (this.id) {
                return this.id;
            }
        }).get()

        var value = 0;
        for (ids in ID) {
            if (ID[ids].indexOf("total") != -1) {
                value +=  parseInt(document.getElementById(ID[ids]).innerText);
            }

            
        }

        $(".finalPrice").html(value);
    }
    $(".quantity").on("change", function() {
        var value = parseInt($("#"+this.id).val())

        if (value == 0) {
            $(".row"+ this.id).hide();
            $.ajax({
                url: "Actions/Remove_Drink.php?id=" + this.id,
                method: "GET",
                success: function(data) {
                    console.log("success");
                },
                error: function(error) {
                    console.log("error");
                }
            })
        }

        else {
            $.ajax({
                url: "Actions/update_item.php?id=" + this.id + "&quantity=" + value,
                method: "GET",
                success: function(data) {
                    console.log("Update success")
                }
            })
        }
        var price = parseInt($("#price" + this.id).html());
        var ID = []

        var total = price * value;
        $("#total" + this.id).html(total);

        calculateCartTotal();
    })

    $("#checkout").on("click", function() {
        var address = $("#address").val();
        var phoneNo = $("#phone").val();
        var zipCode = $("#zipcode").val();
        var details = $("#details").val();
        var total = parseInt($(".finalPrice").html());

        $.ajax({
            url: "Actions/order.php?address=" + address + "&phoneNo=" + phoneNo + "&zipcode=" + zipCode + "&total=" + total + "&details=" + details,
            type: "GET",
            success: function(data) {
                alert("Congratulations . Order Placed Successfully");
            },
            error: function(error) {
                console.log(error);
            
                alert("Oops something went wrong . Order not Placed");
            }

        })
    })
    
</script>


</body>

<?php
require_once "common/footer.php";
?>

</html>