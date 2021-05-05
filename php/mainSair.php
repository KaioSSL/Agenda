<?php
	session_start();
	unset($_SESSION['usuario']);
	header("location:../html/login.php");
?>
