<?php
session_start();
session_destroy();
header('Location: prijava.php'); //slanje korisnika na login
?>