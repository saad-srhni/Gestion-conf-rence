<?php
      $name=htmlentities(trim($_POST['name']));
      $email=htmlentities(trim($_POST['email']));
      $type=htmlentities(trim($_POST['type']));
      $user=htmlentities(trim($_POST['user']));
      $pass1=htmlentities(trim($_POST['pass1']));
      $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
      $db=mysqli_select_db($connect,'gestionconference');
      $insc=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user' or email ='$email'");
      $row=mysqli_num_rows($insc);
      echo $row;
      if($row==0){
               mysqli_query($connect,"INSERT INTO membre VALUES(NULL,'$name','$email','auteur','$user','$pass1')");
               session_start();
               $_SESSION['user']=$user;
             header('Location:accuiel.php');
      }else { echo ("ce login est déjà pris"); header('Location:inscription.php');}
               mysqli_close($connect);

 ?>