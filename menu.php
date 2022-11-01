<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Products</title>
    <!-- Icons from font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/6d232ec003.js" crossorigin="anonymous"></script>
    <!-- Linking style sheets -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php
    require_once "common/nav.php";
    require_once "common/_database.php";
    ?>

    <section class="menu" id="menu">

        <h1 class="heading"> our <span>menu</span> </h1>

        <div class="box-container">

            <?php
                $sql_query = "SELECT * FROM `menu`";
                $result = mysqli_query($conn,$sql_query);

                while($row =  mysqli_fetch_assoc($result)){
                    $productId = $row['productid'];
                    $productName = $row['pname'];
                    $price = $row['drinkprice'];
                    $image = $row['drinkImage'];

                    echo '<div class="box">';
                    echo '<img src="images/' . $image .  '" alt="">';
                    echo '<h3>' . $productName . '</h3>';
                    echo '<div class="price">£' . $price . '</div>';
                    if(isset($_SESSION["username"])){
                        echo '<a class="btn" id="' .  $productId . '" >Add to Cart</a>';
                    }
                    else{
                        echo '<a href=login.php style="text-align:center;font-size:20px;color:#ce7100;outline-style: solid;
                        outline-color: #ce7100;">Add to Cart</a>';      
                    }
                    echo '</form>'; 

                    // echo '<a class="btn" id="' . $row["productid"] . '" >add to cart</a>';
                    echo '</div>';
                }

            ?>
        </div>

    </section>

    

    <?php
    require_once "common/footer.php";
    ?>

<script>
        $(".btn").on("click", function() {
            
            $.ajax({
                url : "Actions/AddCart.php?id=" + this.id,
                type: "GET",
                success: function (data) {
                    
                    alert("The item aaded into the cart");
                },

                error: function (err) {
                    console.log("error");
                }
            })
        })
    </script>

</body>

</html>