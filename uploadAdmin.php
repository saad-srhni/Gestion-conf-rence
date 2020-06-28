
<?php
 $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');

if(!empty($_POST['ids']) && !empty($_POST['idp'])){
             $ids=$_POST['ids'];
             $ida=$_POST['idp'];
             echo $ids;
             echo $idp;
            mysqli_query($connect,"UPDATE session SET presedentid='$ida' WHERE sessionid='$ids'");   
           header('Location:admin.php');   
              
   }


if(isset($_POST['submit1'])){
      $titre1=$_POST['titre1'];
      $description=$_POST['description'];
      $dateConference=$_POST['dateConference'];
      $dateSoumission=$_POST['dateSoumission'];
      $dateEvaluation=$_POST['dateEvaluation'];
      $fiche1_name=$_FILES['f1']['name'];
      $fiche1_name= strtok($fiche1_name,'.');
      $fiche1_name= strtr($fiche1_name,' ','_');
      if(move_uploaded_file($_FILES['f1']['tmp_name'],'image/'.$fiche1_name.'.jpg')){
      mysqli_query($connect,"INSERT INTO conference VALUES(NULL,'$titre1','$description','$dateConference','$dateSoumission','$dateEvaluation','$fiche1_name')");
      header('Location:admin.php');
    }else{
      ?><script type="text/javascript">alert("fiche n'est pas ajouter ressayer!!");document.location.href="auteur.php";</script> <?php 
    }

   }
 
if(isset($_POST['submit2'])){
      $conferenceid=htmlentities(trim($_POST['conference']));
      $titre2=htmlentities(trim($_POST['titre2']));
      $presedentid=htmlentities(trim($_POST['presedent']));
      mysqli_query($connect,"INSERT INTO session VALUES(NULL,'$titre2','$conferenceid','$presedentid')");
      header('Location:admin.php');
              
   }


   if(!empty($_POST['idpd']) && !empty($_POST['etatp'])){
            $idpd=$_POST['idpd'];$etatp=$_POST['etatp'];
      		mysqli_query($connect,"UPDATE papier SET etatadmin='$etatp' WHERE papierid='$idpd'");
          header('Location:admin.php');      
   }

   if (!empty($_POST['idp'])) {
     $etat=$_POST['etat'];
     $pid=$_POST['idp'];
     mysqli_query($connect,"UPDATE demendechangement set etatadmin='$etat' WHERE papierid='$pid'");
     header('Location:admin.php');
   }

     mysqli_close($connect);
 ?>