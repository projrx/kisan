<?php 
session_start();
if(!isset($_SESSION['admin'])){
	header("location:login.php");
}
// Store Session Data
 $username= $_SESSION['admin'];  // Initializing Session with value of PHP Variable
 ?>