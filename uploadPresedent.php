<?php
$connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');


if(!empty($_POST['etat']) && !empty($_POST['idp'])){
             $etat=$_POST['etat'];
             $idp=$_POST['idp'];
      		  mysqli_query($connect,"UPDATE papier SET etatpresedent='$etat' WHERE papierid='$idp'");   
      		 header('Location:presedent.php');   
              
   }
   
   if(!empty($_POST['nam']) && !empty($_POST['ids'])&& !empty($_POST['email'])&& !empty($_POST['login'])&& !empty($_POST['pass'])){
            $nam=$_POST['nam'];
            $ids=$_POST['ids'];
            $email=$_POST['email'];
            $login=$_POST['login'];
            $pass=$_POST['pass'];
      		mysqli_query($connect,"INSERT INTO membre VALUES(NULL,'$nam','$email','comite','$login','$pass')");
      		$query=mysqli_query($connect,"SELECT membreid FROM membre WHERE login='$login'");
      	    $resulte=mysqli_fetch_assoc($query);
      	    $idc=$resulte['membreid'];
      		mysqli_query($connect,"INSERT INTO sessioncomite VALUES(NULL,'$ids','$idc')");   

      		 header('Location:presedent.php');   
              
   }
    header('Location:presedent.php');  
 mysqli_close($connect);
?>

