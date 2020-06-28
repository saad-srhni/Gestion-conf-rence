<?php 
$connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     session_start();
     $user=$_SESSION['user'];

     if (isset($_POST['idp']) && isset($_POST['note'])){
     	 $idp=$_POST['idp'];
     	 $note=$_POST['note'];
     	 $query=mysqli_query($connect,"SELECT membreid FROM membre WHERE login='$user'");
     	 $resulte=mysqli_fetch_assoc($query);
     	 $idm=$resulte['membreid'];
     	 mysqli_query($connect,"UPDATE  evaluationcomite SET notecomite ='$note' WHERE papierid='$idp' AND membreid='$idm'");
     }

      header('Location:comite.php');
      mysqli_close($connect);