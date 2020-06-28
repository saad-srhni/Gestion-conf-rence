<?php 
session_start();
         $password=$_POST['pass'];
        $username=$_POST['user'];
        $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
        $db= mysqli_select_db($connect,'gestionconference');
        $query=mysqli_query($connect,"SELECT * FROM membre WHERE '$username'=login AND '$password'=motpass");
         $rows=mysqli_num_rows($query);
        if($rows == 1){
        $resultat=mysqli_fetch_assoc($query);
        $_SESSION['user']=$username;
          header('Location:accuiel.php');
            } else { ?>
            <script type="text/javascript">alert("login ou password incorrect"); document.location.href="authentifier.php"</script> 
            <?php 
        }
        mysqli_close($connect);
?>
