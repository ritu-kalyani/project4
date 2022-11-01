<?php
session_start();
include 'common/_database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["uname"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from user where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $uid = $row['uid'];
        if (password_verify($password, $row['password'])){ 
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['uid'] = $uid;
            ?>
                <script>
                  alert("Login Successful"); 
                  location.replace("index.php?uid=<?php echo $uid;?>");
                </script>

            <?php
        } 
        else{
        ?>
            <script>
                alert("Incorrect Password"); 
            </script>
        <?php
        }
    } 
    else{
    ?>
    <script>
        alert("Incorrect username"); 
    </script>
    <?php
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
    <title>Login</title>
</head>

<body>
<?php
require_once "common/nav.php";
?>

    <div class="container6">
        <div class="form1" id="login">
            <h1>Login</h1>
            <form method = "POST">
                <div class="form1-control">
                    <label for="email">User Name</label>
                    <input type="text" name="uname" id="uname"  placeholder="Enter your username">
                </div>
                <div class="form1-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="on"
                        placeholder="Enter your password">
                </div>
                <div class="form1-control">
                    <button class="btn" type="submit">LOGIN</button>
                    <p id="regismes">Don't have an account? <a href="register.php">Sign-Up</a></p>
                </div>
            </form>
        </div>
    </div>
    
<?php
require_once "common/footer.php";
?>
</body>

</html>