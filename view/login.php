<?php
require "header.php";
require "navbar.php";
?>
<form action="../include/login.inc.php" method="post">
    <div class="imgcontainer">
        <img style = "height: 90px; width: 90px;" src="../img/img_568656.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
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
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid-email" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" >

        <button  class="btn btn-primary " type="submit" name="Smt">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">

        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>



<?php
require "footer.php";