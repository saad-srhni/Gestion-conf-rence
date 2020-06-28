<?php

 $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     session_start();
     $user=$_SESSION['user'];
     if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
     	$nom=$_POST['name'];
     	$email=$_POST['email'];
     	$msg=$_POST['message'];
     	mysqli_query($connect,"INSERT INTO contact VALUES(NULL,'$nom','$email','$msg')");
     	header('Location:auteur.php');
     }