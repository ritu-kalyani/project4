<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>About Us</title>
</head>
<body>
    <?php
    require_once "common/nav.php";
    ?>

    <section class="about" id="about" style="margin-top: 10rem;">

        <h1 class="heading"> <span>about</span> us </h1>
    
        <div class="row">
    
            <div class="image">
                <img src="./images/about-img.jpg" alt="">
            </div>
    
            <div class="content">
                <h3>What makes us so special?</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam rerum dignissimos vel neque soluta inventore sapiente commodi eius quo laborum, enim rem molestias velit eligendi corrupti animi saepe illo mollitia consequuntur ea? Doloribus, eos nostrum expedita nulla praesentium esse impedit.</p>
            </div>
    
        </div>
    
    </section>

<?php
require_once "common/footer.php";
?>
    
</body>
</html>