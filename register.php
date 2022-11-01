<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'common/_database.php';
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirmpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        ?>
        <script>
            alert("Username already Exists");
        </script><?php
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `user` ( `username`, `email`,  `password`) VALUES ('$username', '$email', '$hash')";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              ?>
              <script>
                alert("Registration successful");
              </script><?php
          }
      }
      else{
        ?>
        <script>
            alert("passwords do not match");
        </script><?php
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Register</title>
</head>

<body>
<?php
require_once "common/nav.php";
?>

    <div class="container6">
        <div class="form1" id="register">
            <h1>Register</h1>
            <form method ="POST">
                <div class="form1-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter your name">
                </div>
                <div class="form1-control">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter your name">
                </div>
                <div class="form1-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter your password">
                </div>
                <div class="form1-control">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" autocomplete="off" placeholder="Enter your password">
                </div>
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Agree to Terms & Conditions</label>
                <div class="form1-control">
                    <button class="btn" type="submit">REGISTER</button>
                    <p>Already have an account. <a href="login.php">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php
require_once "common/footer.php";
?>
</body>

</html>