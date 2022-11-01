<?php
session_start();
?>
<?php
include "common/_database.php";

if(isset($_POST['contactform'])){
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmessage = $_POST['cmessage'];

    $cform = "INSERT INTO `contactuser`  VALUES ('$cname', '$cemail', '$cmessage')";

    if ($conn->query($cform) == TRUE) {
        echo '
        <script>alert("Message sent successfully");</script>';
    }

    else {
        echo '
        <script>alert("Message failed to reach");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        
    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <div class="row">
            <form method="post">
                <h3>LEAVE A MESSAGE</h3>
                <div class="inputBox">
                    <input type="text" name="cname" placeholder="name">
                </div>
                <div class="inputBox">
                    <input type="email" name="cemail" placeholder="email">
                </div>
                <div class="inputBox">
                    <input type="text" name="cmessage" placeholder="Leave a message" id="input-message">
                    <!-- <textarea name="message" id="message" cols="" rows="10"></textarea> -->
                </div>

                <?php if(isset($_SESSION["username"])){ ?>
                <input type="submit" name="contactform" value="contact now" class="btn">
                <?php }else { ?>
                <input type="submit" name="contactform" value="contact now" class="btn" disabled>
                <br><h4 class="form-text text-muted" style="color:white;">Do Login first</h4>
                <?php } ?>
            </form>

        </div>

    </section>

<?php
require_once "common/footer.php";
?>
</body>

</html>