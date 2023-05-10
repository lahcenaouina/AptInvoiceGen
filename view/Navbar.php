<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cite Marine Royale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Nouveautés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Événement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Réclamation</a>
        </li>

      </ul>
        <?php if (isset($_SESSION["username"]) and isset($_SESSION["email"]) and $_SESSION["type"]){?>
            <div class="d-flex justify-content-around mr-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>





<!--                <li class="nav-item">-->
<!--                    <a href="../view/Profile.php">Profile</a>-->
<!--                    -->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a  href="../include/logout.inc.php">Log Out</a>-->
<!--                </li>-->
            </div>

        <?php }else {?>
                <a class="btn " role="button" href="../view/Signup.php">S'inscrire</a>
                <a class="btn btn-primary" role="button" href="../view/login.php">Se connecter</a>

        <?php }?>

    </div>
  </div>
</nav>
<!-- Nav bar end -->
<?php
require "footer.php";