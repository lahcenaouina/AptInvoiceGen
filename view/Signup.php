<?php
require "header.php";
require "navbar.php";
?>
    <form action="../include/signup.inc.php" method="get">
        <div class="imgcontainer">
            <img style = "height: 90px; width: 90px;" src="../img/img_568656.png" alt="Avatar" class="avatar">
        </div>
        <?php
        if (isset($_GET["Error"])) {
            echo '
            <div class="container">
                <div class="alert alert-danger alertc" role="alert">
              Error : '.$_GET["Error"].'
                </div>
            </div>
            
            ';
        }
        ?>
        <div class="container">
            <label for="email"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" >

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" >

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" >

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="pwd-rep" >

            <div class="clearfix">
                <button type="submit" class="btn btn-warning" name="submit">Sign Up</button>
        </div>
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>



    </form>



<?php
require "footer.php";