<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Mere Drinkers</title>
    <!-- Icons from font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/6d232ec003.js" crossorigin="anonymous"></script>
    <!-- Linking style sheets -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php 
    require_once "common/nav.php";
    ?>

    <section class="home" id="home">

        <div class="content">
            <h3>MERE DRINKERS</h3>
            <p>Lorem ipsum dolor sit amet.</p>
            <a href="menu.php" class="btn">get yours now</a>
        </div>

    </section>

</body>

<?php
require_once "common/footer.php";
?>

</html>