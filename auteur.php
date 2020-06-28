<!DOCTYPE html>
<html>
<head>
	<title>profil auteur</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

  body {
    position: relative;
  }
  ul.nav-pills {
    top: 20px;
    position: fixed;
  }
  div.col-8 div {
    height: 500px;
  }
  </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
  <header><center><h1>profil auteur</h1></center></header>
  <?php session_start(); $user=$_SESSION['user'];
     $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user' and type='auteur'");
     $resulte=mysqli_fetch_assoc($query);     
 if(!empty($_SESSION['user']) && !empty($resulte)){ ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="accuiel.php">conference-fsk</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="accuiel.php">Accuiel</a></li>
        <li class="active"><a href="auteur.php">profil</a></li>
        <li><a href="contact.php">contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="authentifier.php"><span class="glyphicon glyphicon-log-in"></span>DECONNECTER</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 " style="margin-top: 50px">
      <a href="#section1" class="btn btn-primary" style="width: 200px;margin-top: 10px;">soumettre une papier</a>
      <a href="#section2" class="btn btn-primary" style="width: 200px;margin-top: 10px;">supprimer une papier</a>
      <a href="#section3" class="btn btn-primary" style="width: 200px;margin-top: 10px;">changer une papier</a>
      <a href="#section4" class="btn btn-primary" style="width: 200px;margin-top: 10px;">s'inscrire à une conférence</a>
      <a href="#section5" class="btn btn-primary" style="width: 200px;margin-top: 10px;">changer le papier</a>
      <a href="#section6" class="btn btn-primary" style="width: 200px;margin-top: 10px;">modifier le profil</a>
    </div>

<div class="col-sm-10 text-left" style="background-color: #98FB98;">
      <div id="section1"  class="bg-success" style="height: 300px">   
    <!----------------------------------------------------------------------------------------------> 

       <center><h2 style="padding: 10px;border-bottom: solid;">soumettre une papier</h2></center>
     <?php   $date="20".date('y-m-d');
     $query1=mysqli_query($connect,"SELECT session.sessionid as sessionid,session.titre as titre,conference.dateSoumission as ds FROM session,conference WHERE conference.conferenceid=session.conferenceid and conference.dateSoumission >= '$date'"); 
     $row=mysqli_num_rows($query1);
            if ($row>0) {
            	?>
              
<table border="2" width="100%" class="table" style="height: 150px">
  <tr><th>id session</th><th>titre session</th><th>date de fin de Soumission</th></tr>

   <?php
            for ($i=0; $i <$row ; $i++) { 
            $resulte1=mysqli_fetch_assoc($query1); ?>
 <tr> <td><?php echo $resulte1['sessionid'];   ?></td><td><?php  echo $resulte1['titre']; ?></td><td><?php echo $resulte1['ds']; ?></td></tr>

<?php } ?> 
<tr>
<form action="uploadAuteur.php" method="post" name="form1" enctype="multipart/form-data">
<td><input type="file" name="file1" accept="application/pdf" class="form-control"></td>
<td><input type="text" name="sid" class="form-control" placeholder="Enter id de session"></td>
<td><input type="submit" name="soumettre" value="soumettre" class="btn btn-success"></td>
</form>
</tr>
</table>



<?php     
       }else echo "il n'est pas des session ";
       ?>
 </div>
<!---------------------------------------------------------------------------------------------->
<?php 
     $query2=mysqli_query($connect,"SELECT  * FROM papier WHERE  auteurid in (select membreid from membre WHERE login ='$user')"); 
     $row=mysqli_num_rows($query2);
       if ($row>0) {
?> 
<div id="section2"   class="bg-success"> 
<form method="post" action="uploadAuteur.php">
<center><h2 style="padding: 10px;border-bottom: solid;">supprimer votre papier</h2></center>
<table border="2" width="100%" class="table">
      <tr><th>le nom du papier</th><th >ID</th></tr>
<?php        for ($i=0; $i <$row ; $i++) { 
        $resulte2=mysqli_fetch_assoc($query2);
          ?>
          <tr>
            <td><a href="<?php echo "papier/".$resulte2['titre'].'.pdf'; ?>"><?php echo $resulte2['titre']; ?></a></td>
            <td><?php echo $resulte2['papierid']; ?></td>
            
          </tr>
<?php
        }
?> 
<tr><td colspan="2"><center><input  type="text" name="id" placeholder="entre id" class="form-control" style="width: 300px;" ><br><input type="submit" value="supprimer" class="btn btn-success"></center></td></tr>
</table> 
</form>
</div>
<?php
       }
?>

<!---------------------------------------------------------------------------------------------->

<?php $query3=mysqli_query($connect,"SELECT  * FROM papier WHERE etatadmin is null and papierid not in (SELECT papierid from demendechangement) and auteurid in (select membreid from membre WHERE login ='$user')"); 
     $row=mysqli_num_rows($query3);
       if ($row>0) { ?>
<div id="section3"   class="bg-success">  
 <center><h2 style="padding: 10px;border-bottom: solid;">demande changement d'une papier</h2></center>
<table border="2" width="100%" class="table">
  <tr><th>nom papier</th><th>demander</th></tr>
  <form method="post" action="uploadAuteur.php">
  <?php for ($i=0; $i <$row ; $i++) { 
        $resulte3=mysqli_fetch_assoc($query3);
    ?>
  <tr><td><a href="<?php echo "papier/".$resulte3['titre'].".pdf"; ?>"><?php echo $resulte3['titre']; ?></a></td><td><?php echo $resulte3['papierid']; ?></td></tr>
<?php } ?>
<td colspan="2"><center><input type="text" name="idp" placeholder="enter titre de papier" class="form-control" style="width: 300px;"><br>
<input type="submit" name="" value="changer" class="btn btn-success"></center></td>
</form>
</table>
</div>
<?php }  ?>
<!---------------------------------------------------------------------------------------------->
<?php
$query4=mysqli_query($connect,"SELECT * FROM conference where conferenceid in (SELECT conferenceid FROM session where sessionid in (SELECT sessionid FROM papier WHERE auteurid in (SELECT membreid FROM membre WHERE login ='$user' ) and (etatadmin ='accepter' or etatadmin ='poster')))");
$row=mysqli_num_rows($query4);
       if ($row>0) { ?>
<div id="section4"  class="bg-success" >   
 <center><h2 style="padding: 10px;border-bottom: solid;">s'inscrire à une conférence: </h2></center> 
<table border="2" width="100%" class="table">
  <tr><th>nom de conférence</th><th>id de la conférence</th></tr>
  <form method="post" action="uploadAuteur.php">
  <?php for ($i=0; $i <$row ; $i++) { 
        $resulte4=mysqli_fetch_assoc($query4);
    ?>
  <tr><td><?php echo $resulte4['titre']; ?></td><td><?php echo $resulte4['conferenceid']; ?></td></tr>
<?php } ?>
<td colspan="2"><center><input type="text" name="idconf" placeholder="enter l'id de la conférence" class="form-control" style="width: 300px;"><br>
<input type="submit" name="" value="s'inscrire" class="btn btn-success"></center></td>
</form>
</table>
</div>
<?php } ?>
<!---------------------------------------------------------------------------------------------->
<?php
$query5=mysqli_query($connect,"SELECT demendechangement.papierid,papier.titre FROM demendechangement,papier,membre WHERE demendechangement.etatadmin ='accepter' and demendechangement.papierid=papier.papierid and  papier.auteurid=membre.membreid and membre.login='$user'");
$row=mysqli_num_rows($query5);
if ($row>0) { 
?>
<div id="section5"   class="bg-success"> 
   <center><h2 style="padding: 10px;border-bottom: solid;">changer fichier(la demande à eccepter par l'administrateur)</h2></center> 
     <table class="table">
<form method="post" enctype="multipart/form-data" action="uploadAuteur.php">
 <tr> <th>importer le papier que tu'a changer (format pdf )</th><th>choisir le papier à changer</th><th>valider</th></tr>
<tr><td><input type="file" name="file" accept="application/pdf" class="form-control"></td>
<td><select name="op">
<?php
    for ($i=0; $i < $row; $i++) { 
              $resulte5=mysqli_fetch_assoc($query5);
?>
<option value=<?php echo($resulte5['papierid']); ?>><?php echo($resulte5['titre']); ?></option>
   
<?php      }  ?>
 </select>
</td>
<td> <input type="submit" name="s1" class="btn btn-success"></td></tr>
</form>
</table>
</div>

<?php } ?>
<!---------------------------------------------------------------------------------------------->
<?php
$query6=mysqli_query($connect,"SELECT * from membre WHERE login='$user'");
$resulte6=mysqli_fetch_assoc($query6);
?>
<div id="section6"   class="bg-success" > 
<center><h2 style="padding: 10px;border-bottom: solid;">modifier votre profil</h2></center> 
<table class="table" border="1">
<tr><th colspan="2"><center>saisir votre information</center></th><th>valider</th></tr>
<tr>
<form method="post" action="uploadAuteur.php">
<td><?php echo $resulte6['nomcomplete']; ?></td><td><center><input type="text" name="nom" placeholder="enter un nouvau nom" class="form-control" style="width: 300px;"></center></td><td><input type="submit" name="" value="modifier" class="btn btn-success"></td>
</form>
</tr>
<tr>
  <form method="post" action="uploadAuteur.php">
<td> Modifer votre password</td><td><center><input type="password" name="pass" class="form-control" placeholder="Enter le nouvau mo de pass " style="width: 300px;"></center></td><td><input type="submit" class="btn btn-success" value="modifier"></td>
  </form>
</tr>
</table>
<?php }else{ echo ("autenfier ou s'inscrire!!"); header('Location:authentifier.php');  } ?>
</div>
</div>
</div>
</div>
</body>
</html>
