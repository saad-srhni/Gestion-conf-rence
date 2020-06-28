<!DOCTYPE html>
<html>
<head>
	<title>profil administrateur</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<script type="text/javascript">
	function verifier_champ1(){
    var txt="Veuillez ajouter votre :";var x=txt.length;
   if (form1.titre1.value.length<1){
       txt +=" titre ";
}
    if (form1.description.value.length<1){
txt +=" description ";
}
if (form1.dateDebut.value.length<1){
txt +=" date de Debut ";
}
    
    if (form1.dateFin.value.length<1){
txt +="  date de Fin ";
}
    if (form1.dateSoumission.value.length<1){
txt +="  date de Soumission ";
}
if (form1.dateEvaluation.value.length<1){
txt +="  date de Evaluation";
}
if(x==txt.length){return true;}
    else {alert(txt);return false;}
}

function verifier_champ2(){
    var txt="Veuillez ajouter votre :";var x=txt.length;
   if (form2.titre2.value.length<1){
       txt +=" titre ";
}

if(x==txt.length){return true;}
    else {alert(txt);return false;}
}
</script>
<header><center><h1>profil administrateur</h1></center></header>

<body>
<?php session_start(); $user=$_SESSION['user'];
     $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user' and type='admin'");
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
        <li class="active"><a href="admin.php">profil</a></li>
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
      <a href="#section1" class="btn btn-primary" style="width: 200px;margin-top: 10px;">crée une conference</a>
      <a href="#section2" class="btn btn-primary" style="width: 200px;margin-top: 10px;">crée une session</a>
      <a href="#section3" class="btn btn-primary" style="width: 200px;margin-top: 10px;"> Evaluer papier</a>
      <a href="#section4" class="btn btn-primary" style="width: 200px;margin-top: 10px;">Décéder l'etat de changment</a>
      <a href="#section5" class="btn btn-primary" style="width: 200px;margin-top: 10px;">voir les auteur des conference</a>
      <a href="#section6" class="btn btn-primary" style="width: 200px;margin-top: 10px;">voir les messages</a>
      <a href="#section7" class="btn btn-primary" style="width: 200px;margin-top: 10px;">Ajouter un presedent</a>
    </div>
<div class="col-sm-10 text-left" style="background-color: #98FB98;">

  <div id="section1"  class="bg-success">
    <center><h2 style="padding: 10px;border-bottom: solid;">crée une conference</h2></center>
<table class="table" border="1">
<tr><th>titre de la conference</th><th>description</th><th>date Conference</th><th>date Soumission</th><th>date Evaluation</th></tr>
<form action="uploadAdmin.php" method="post" name="form1" enctype="multipart/form-data"><tr>
<td><input type="text" name="titre1" placeholder="Enter le titre" maxlength="100" class="form-control-file"></td>
<td><textarea name="description"  placeholder="Enter la description" maxlength="1000" class="form-control-file" style="width: 250px;height: 100px;">
</textarea></td>
<td><input type="date" name="dateConference"   class="form-control-file"></td>
<td><input type="date" name="dateSoumission" class="form-control-file"></td>
<td><input type="date" name="dateEvaluation" class="form-control-file"></td>
<tr><td><h5>Choisir l'image de conférence</h5></td><td><input type="file" name="f1" accept="image/jpg" class="form-control" accept="image/*"></td><td colspan="3"><center><input type="submit" name="submit1" onclick="return verifier_champ1()"  value="crée conference" class="btn btn-success"></center></td></tr>
</form>
</table>
</div>
<!----------------------------------------------------------------------------->
<div id="section2"  class="bg-success">
	<?php    $date="20".date('y/m/d'); 
     $query=mysqli_query($connect,"SELECT * FROM conference  WHERE dateSoumission  >='$date'"); 
     $row=mysqli_num_rows($query);
            if ($row>0) {
            ?>
<center><h2 style="padding: 10px;border-bottom: solid;">crée une session</h2></center>
<form action="uploadAdmin.php" method="post" name="form2" >
  <table width="100%" border="1" class="table">
    <tr><th>choisir la conférence</th><th>choisir le présedent</th><th>titre</th><th>crée</th></tr>
    <tr>
     <td><select name="conference" class="form-control"> <?php
            for ($i=0; $i <$row ; $i++) { 
            $resulte=mysqli_fetch_assoc($query);     
     ?> 

	<option value="<?php echo $resulte['conferenceid']; ?>"><?php echo $resulte['titre']; ?></option>
<?php }
?> </select></td>

<?php
       
            
   $query=mysqli_query($connect,"SELECT * FROM membre WHERE type='presedent'"); 
   $row=mysqli_num_rows($query);
       if ($row>0) {
            ?><td><select name="presedent" class="form-control"> <?php
            for ($i=0; $i <$row ; $i++) { 
            $resulte=mysqli_fetch_assoc($query);      
     ?> 

	
	<option value="<?php echo $resulte['membreid']; ?>"><?php echo $resulte['nomcomplete']; ?></option>
<?php } ?> </select></td>
<?php   } ?>

<td><input type="text" name="titre2" placeholder="Enter le titre" maxlength="100" class="form-control"></td>
<td>
<input type="submit" name="submit2" onclick="return verifier_champ2()"  value="crée une session" class="btn btn-success"></td>
</tr>
</table>
</form>
<?php } else echo "(il n'y a pas des conférences)"; ?>
</div>
<!------------------------------------------------------------------------>
<div id="section7"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">ajouter un presedent(ce session ne contient pas un presedent)</h2></center>
<?php $query=mysqli_query($connect,"SELECT * FROM session WHERE presedentid is NULL "); 
   $row=mysqli_num_rows($query);
       if ($row>0) { ?>   
          <form method="post" action="uploadAdmin.php">
            <table class="table">
          <tr><th>Enter l'id de session</th><th>Enter id de l'presedent</th></tr>
          <tr><td><input type="text" name="ids" placeholder="Enter id de session" class="form-control"></td>
          <td><input type="text" name="idp" placeholder="Enter id de presedent" class="form-control"></td></tr>
            <tr><td colspan="2"><center><input type="submit" value="Ajouter" class="btn btn-success" style="width:150px;"></center></td></tr>
          </form>
        </table>
        <?php } ?>
</div>
<!--------------------------------------------------------------------------->
<div id="section3"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">décider l'état de papier</h2></center>
	<?php 
   $date="20".date('y/m/d');
     $query=mysqli_query($connect,"SELECT * FROM papier WHERE (etatadmin like 'poster' or etatadmin is null) and sessionid in (SELECT sessionid FROM session WHERE conferenceid in (SELECT conferenceid FROM conference WHERE dateEvaluation >= '$date')) " ); 
     $row=mysqli_num_rows($query);
     
       if ($row>0) { ?> 

<table width="100%" border="2" class="table">
<tr><th>id papier</th><th>commantaire</th><th>la session</th><th>la date de fin evaluation</th></tr>
<?php       	 
        for ($i=0; $i <$row ; $i++) { 
         $resulte=mysqli_fetch_assoc($query); 
       
       if($resulte['etatpresedent']){ $str=" (le présedent à ".$resulte['etatpresedent']." le papier est ce que tu'a daccord ) ";
   }else{ $str=" (le presedent n'est pas encore décider)";} ?>


   <tr><td>  <?php echo $resulte['papierid'];  ?> </td>
    <td><a href="<?php echo "papier/".$resulte['titre'].".pdf  " ?> "><?php echo $resulte['titre'] ?></a><?php  echo $str; ?> </td>
     
    <td>  <?php  $j=$resulte['sessionid'];
           $query1=mysqli_query($connect,"SELECT * FROM session WHERE sessionid = '$j' ");  
            $resulte1=mysqli_fetch_assoc($query1); 
            echo $resulte1['titre'];?>   
    </td>

<td>  <?php    $c=$resulte1['conferenceid'];
      $query2=mysqli_query($connect,"SELECT dateEvaluation FROM conference WHERE conferenceid = '$c' ");  
        $resulte2=mysqli_fetch_assoc($query2); 
        $dc=$resulte2['dateEvaluation'];
   echo "la date fin de évaluation est le ".$dc;  ?>
      </td>
  </tr>
   
    <?php  
    }
?> 
<form name="form3" action="uploadAdmin.php" method="post">
<tr>
<td><input type="text" name="idpd" placeholder="Enter id de papier" class="form-control"></td>
  <td colspan="2"> 
  <select class="form-control" name="etatp">
  <option value="accepter">
    accepter 
  </option>
  <option value="poster">
    poster
  </option>
  <option value="rejeté">
    rejeté
  </option>
    </select>
<td colspan="2"><input type="submit" name="submit3"  value="décider l'état" class="btn btn-success"></td></tr>
</table>
<?php
  }else {echo "il n'est a pas des papier pour évaluer";}
	?>
</form>
</div>
<!----------------------------------------------------------------------------->
<div id="section4"  class="bg-success">
<?php
$query3=mysqli_query($connect,"SELECT papier.papierid as pid ,papier.titre as titre1,demendechangement.etatadmin,conference.titre as titre2,membre.nomcomplete FROM 
demendechangement,conference,session,membre,papier WHERE demendechangement.etatadmin is NULL and papier.papierid=demendechangement.papierid and papier.sessionid=session.sessionid  and conference.conferenceid=session.conferenceid and membre.membreid=papier.auteurid
");  
$row=mysqli_num_rows($query3);
 if ($row>0) { ?>
<center><h2 style="padding: 10px;border-bottom: solid;"> décide lé etat de changement : </h2></center>
  <form method="post" action="uploadAdmin.php">
<table border="2"  class="table">
  <tr><th>Conférence</th><th>Papier</th><th>l'auteur</th><th>papier id</th></tr>
  <?php for ($i=0; $i <$row ; $i++) { 
        $resulte3=mysqli_fetch_assoc($query3);
    ?>
  <tr> <td><?php echo $resulte3['titre2']; ?></td><td><a href=<?php echo "papier/".$resulte3['titre1'].".pdf"; ?> ><?php echo $resulte3['titre1'];?></a></td><td><?php echo $resulte3['nomcomplete']; ?></td><td><?php echo $resulte3['pid']; ?></td></tr>
<?php } ?>
<tr>
<td colspan="2">
<input type="text" name="idp" placeholder="Enter id de Papier" class="form-control"></td>
<td><select name="etat" class="form-control">
<option value="accepter">accepter la demande</option>
<option value="refuse">refuse la demande</option>
</select></td>
<td><input type="submit" name="submit4" value="changer" class="btn btn-success"></td>
</td>
</tr>
</table>
</form>
<?php }  ?>
</div>
<!-------------------------------------------------------------------------->
<div id="section5"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">liste les auteurs des conferences</h2></center>
<?php $query4=mysqli_query($connect,"SELECT membre.nomcomplete as nom,conference.titre as titre FROM inscriptionconference,conference,membre WHERE inscriptionconference.conferenceid=conference.conferenceid and inscriptionconference.auteurid=membre.membreid"); 
 $row=mysqli_num_rows($query4);
if ($row>0) { ?>
<table border="1" class="table">
<tr><th>nom de auteur</th><th>nom de la conference</th></tr>
 <?php 
for ($i=0; $i <$row ; $i++) { 
$resulte4=mysqli_fetch_assoc($query4);
  ?>
 <tr><td><?php echo $resulte4['nom'] ; ?></td><td><?php echo $resulte4['titre'] ?></td></tr>
<?php } ?>
</table>
<?php } ?>
</div>
<!--------------------------------------------------------------------------->
<div id="section6"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">voir les messages(tu peut envoyer un message sur son email)</h2></center>
<?php $query5=mysqli_query($connect,"SELECT * FROM contact"); 
 $row=mysqli_num_rows($query5);
 if ($row>0) { ?>
<table border="1" class="table">
  <tr><th>nom</th><th>email</th><th>message</th></tr>
 <?php for ($i=0; $i <$row ; $i++) { 
$resulte5=mysqli_fetch_assoc($query5);  ?> 
<tr><td><?php echo $resulte5['nom']; ?></td><td><?php echo $resulte5['email']; ?></td><td><?php echo $resulte5['message']; ?></td></tr>
<?php } ?>
</table>
<?php } ?>
</div>
<!----------------------------------------------------------------------------->
</div>
</div>
</div>
</div>
<?php }else{ echo ("autenfier ou s'inscrire!!"); header('Location:authenfier.php'); } ?>
</body>
</html>

