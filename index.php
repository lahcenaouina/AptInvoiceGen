<?php
require "view/Header.php";
require "view/Navbar.php";
?>
<div class="General">
<div class="main-div">

        <div class="mainback">
                <div class="on3" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">RESIDANCE <br>CITE<br> MARINE</div>
                <div class="bar"></div>
                <p>Cette plateforme facilite le suivi des performances des factures mensuelles,<br> simplifie la demande de services et fournit toutes les actualités.</p>

        </div>

</div>
<div class="infomain">
        <div class="information">
        <p>Informations </p>        
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit assumenda id reprehenderit culpa, ut aspernatur ipsam impedit quidem esse, voluptate hic tenetur, doloremque dicta aperiam qui dignissimos sint! Odio.</div>
        <div class="login-main">
               <p>LOGIN</p>
                <form>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">numéro immeuble</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="comme : A12" aria-describedby="emailHelp">
                                
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" placeholder = "Enter Mot de passe" id="exampleInputPassword1">
                        </div>

                        <button type="submit"  class="btn btn-primary loginbtn">Se connecter</button>
                </form>
        </div>
        <div class="news">
                <p>GALERIE</p>
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/3.jpg" class="d-block w-100" alt="...">
                </div>
                </div>
                </div>
        </div>
</div>





</div>







<?php
require "view/Footer.php";
