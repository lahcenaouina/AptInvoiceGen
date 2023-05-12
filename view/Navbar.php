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
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
                <a href="#" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">10</span></a></a>
                <div class="nav-item dropdown ">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><i class="fa fa-user-o"></i> <?=$_SESSION["username"] ?> <b class="caret"></b></a>
                    <div class="dropdown-menu drp_profile">
                        <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
                        <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
                        <div class="dropdown-divider"></div>
                        <a href="../include/logOut.inc.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
                    </div>
                </div>
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