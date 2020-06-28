<?php
     $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     session_start();
     $user=$_SESSION['user'];

      if (isset($_FILES['file1'])){
      $fiche1_name=$_FILES['file1']['name'];
      $fiche1_name= strtok($fiche1_name,'.');
      $fiche1_name= strtr($fiche1_name,' ','_');
       $sessionid=$_POST['sid'];
        $query=mysqli_query($connect,"SELECT membreid FROM membre WHERE login='$user'");
        $resulte=mysqli_fetch_assoc($query);  
         $id=$resulte['membreid'];
      if(move_uploaded_file($_FILES['file1']['tmp_name'],'papier/'.$fiche1_name.'.pdf')){

   mysqli_query($connect,"INSERT INTO papier VALUES(NULL,'$fiche1_name','$sessionid','$id',NULL,NULL)");
   $query=mysqli_query($connect,"SELECT max(papierid) as nbr FROM papier ");
   $resulte=mysqli_fetch_assoc($query);
   $idp=$resulte['nbr'];
   echo $idp;
   $query=mysqli_query($connect,"SELECT * FROM sessioncomite WHERE sessionid='$sessionid'");
   $row=mysqli_num_rows($query);
       if ($row>0) {
        for ($i=0; $i <$row ; $i++) { 
         $resulte=mysqli_fetch_assoc($query);
         $idm=$resulte['membreid'];
         echo $idm;
         mysqli_query($connect,"INSERT INTO evaluationcomite VALUES(NULL,'$idp','$idm',NULL)"); 
       }
       }
   header('Location:auteur.php');

}else { ?><script type="text/javascript">alert("fiche n'est pas ajouter ressayer!!");document.location.href="auteur.php";</script> <?php }

}

if(!empty($_POST['id'])){
      $id=$_POST['id'];
      mysqli_query($connect,"delete from papier WHERE papierid='$id'");
      header('Location:auteur.php');
}

if(!empty($_POST['idp'])){
    $idp=$_POST['idp'];
    mysqli_query($connect,"INSERT INTO demendechangement VALUE('$idp',NULL)");
    header('Location:auteur.php');
}

if(!empty($_POST['idconf'])){
  $idconf=$_POST['idconf'];
  $query5=  mysqli_query($connect,"SELECT membreid FROM membre WHERE login ='$user'");
  $resulte5=mysqli_fetch_assoc($query5);
  $idauteur=$resulte5['membreid']; 
  mysqli_query($connect,"INSERT INTO inscriptionconference VALUE('$idconf','$idauteur')");
  header('Location:auteur.php');

}
if (isset($_POST['s1'])) {
      $fiche_name=$_FILES['file']['name'];
      $fiche_name= strtok($fiche_name,'.');
      $fiche_name= strtr($fiche_name,' ','_');
      $op=$_POST['op'];
   if(move_uploaded_file($_FILES['file']['tmp_name'],'papier/'.$fiche_name.'.pdf')){

   mysqli_query($connect,"UPDATE papier SET titre='$fiche_name' WHERE papierid='$op'");
   mysqli_query($connect,"DELETE FROM demendechangement WHERE papierid='$op'"); 
   header('Location:auteur.php');
}else { ?> <script type="text/javascript"> alert("fiche n'est pas ajouter ressayer!!"); document.location.href="auteur.php";  </script>  <?php }
   
}
if (!empty($_POST['nom'])) {
  $nom=$_POST['nom'];
  mysqli_query($connect,"UPDATE membre set nomcomplete='$nom' WHERE login='$user'");
  header('Location:auteur.php');
}
if (!empty($_POST['pass'])) {
  $pass=$_POST['pass'];
  mysqli_query($connect,"UPDATE membre set motpass='$pass' WHERE login='$user'");
  header('Location:auteur.php');
}
  mysqli_close($connect);
?>