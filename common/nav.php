<header class="header">

        <a href="#" class="logo">
            <img src="./images/logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="./about.php">About</a>
            <a href="./menu.php">Menu</a>
            <a href="./contact.php">Contact</a>
            <?php
            if (isset($_SESSION["username"])) {
                        echo "<a href='./logout.php'>Logout</a>";
            }
            else{
            echo "<a href='./login.php'>Login</a>";
        }
        ?>
           
        </nav>

        <div class="icons">
        <a href="./cart.php" style = "font-size:1.6rem;color:white;">Cart</a>
        </div>

    </header>