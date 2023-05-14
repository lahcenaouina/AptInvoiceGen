<?php

require_once "../view/header.php";

session_unset();
session_destroy();

require_once "../view/Loading.php";

header("refresh: 1; url = ../index.php");
exit();