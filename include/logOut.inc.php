<?php

require "../view/Navbar.php";
session_start();
session_unset();
session_destroy();

require "../view/Loading.php";

header("refresh: 1; url = ../index.php");
exit();