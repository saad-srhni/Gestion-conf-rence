<!DOCTYPE html>
<html>
<head>
	<title>Profil présedent</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
  <header><center><h1>profil presedent</h1></center></header>
<?php session_start(); $user=$_SESSION['user'];
 $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user' and type='presedent'");
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
      <a href="#section1" class="btn btn-primary" style="width: 200px;margin-top: 10px;">décédé l'etat de papier</a>
      <a href="#section2" class="btn btn-primary" style="width: 200px;margin-top: 10px;">ajouter un comité</a>
      <a href="#section3" class="btn btn-primary" style="width: 200px;margin-top: 10px;">les evaluations des comités</a>
    </div>
<div class="col-sm-10 text-left" style="background-color: #98FB98;">
<div id="section1"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">décider l'état de papier</h2></center>
<form action="uploadPresedent.php" method="post" name="form1">
	<?php
	
   $date="20".date('y/m/d');$user=$_SESSION['user'];
     $query=mysqli_query($connect,"SELECT papier.papierid as pid,papier.titre as titrep,conference.dateEvaluation as de ,session.titre as titres  FROM papier,conference,session,membre WHERE papier.sessionid=session.sessionid and session.conferenceid=conference.conferenceid and membre.membreid=session.presedentid and membre.login like '$user' and (papier.etatpresedent is null or papier.etatpresedent like 'poster'  ) and papier.etatadmin is null"); 
      $row=mysqli_num_rows($query);
       if ($row>0) {
?> <table width="100%" border="2" class="table"> 
<tr><th>id papier</th><th>papier</th><th>session</th><th>date fin d'evaluation</th></tr>
  <?php
       	 for ($i=0; $i <$row ; $i++) { 
         $resulte=mysqli_fetch_assoc($query); 
       
       ?> 
   <tr> <td><?php echo $resulte['pid']; ?></td><td><a href="<?php echo "papier/".$resulte['titrep'].".pdf"; ?>"><?php echo $resulte['titrep']; ?></a></td><td><?php echo $resulte['titres']; ?></td><td><?php echo $resulte['de']; ?></td></tr>
       
      <?php } ?>
<tr><td ><input type="text" name="idp" placeholder="Entre l'id de papier" class="form-control" ></td>
    <td rowspan="2">    <select name="etat" class="form-control">
	<option value="accepter">
		accepter
	</option>
	<option value="poster">
		poster
	</option>
	<option value="rejeté">
		rejeté
	</option>
    </select></td>
 <td>
   
<td><input type="submit" name="submit1"   value="décider l'état" class="btn btn-success"></td>
 </tr>
</table>

<?php 
}else {echo "il n'est a pas des papier pour evaluer";}
?>
</form>
</div>
<div id="section2"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">votre session</h2></center>
  <?php 
     $query=mysqli_query($connect,"SELECT * FROM session WHERE presedentid in (SELECT membreid FROM membre WHERE login ='$user')");
      $row=mysqli_num_rows($query);
       if ($row>0) {
     ?>
<table class="table">
  <tr><th>id de session</th><th>titre de session</th></tr>
  <?php  for ($i=0; $i <$row ; $i++) { 
         $resulte=mysqli_fetch_assoc($query);   ?>
<tr><td><?php echo $resulte['sessionid']  ?></td><td><?php echo $resulte['titre']; ?></td></tr>
<?php } ?>
</table>
<?php }  ?>
<center><h2 style="padding: 10px;border-bottom: solid;">Ajouter un comité</h2></center>
     <table class="table">
      <tr><th>l'id de session</th><th>le nom</th><th>email</th><th>login</th><th>mot de pass</th></tr>
     <form action="uploadPresedent.php" method="post">
   <tr> 
<td><input type="text" name="ids" placeholder="Enter l'id de session" class="form-control"></td>
    <td>  <input type="text" name="nam" placeholder="Enter le nom de comité" class="form-control"></td>
   <td>   <input type="text" name="email" placeholder="Enter l'adress email de comité'" class="form-control"></td>
   <td>   <input type="text" name="login" placeholder="Enter le login de comité" class="form-control"></td>
   <td>   <input type="text" name="pass" placeholder="Enter le mot de pass de comité" class="form-control"></td></tr>
     
 <tr>  <td colspan="5">  <center><input type="submit" name="sb" value="Ajouter" class="btn btn-success" style="width: 220px;"></center></td></tr>
 </form>
   </table>
   <div id="section3"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">voir les evaluations des comités</h2></center>
<table class="table">
 <?php 
     $query1=mysqli_query($connect,"SELECT * FROM papier WHERE sessionid in (SELECT sessionid FROM session WHERE presedentid in (SELECT membreid FROM membre WHERE login = '$user'))");
      $row1=mysqli_num_rows($query1);
      if($row1 > 0){ ?>
        <table class="table">
          <tr><th>titre de papier</th><th>les evaluations des comité</th></tr>
      <?php for ($i=0; $i <$row1 ; $i++) { 
         $resulte1=mysqli_fetch_assoc($query1);?>
         <tr><td><?php echo $resulte1['titre'];  ?></td>
         <?php
            $r1=$resulte1['papierid'];
           $query2=mysqli_query($connect,"SELECT * FROM evaluationcomite WHERE papierid ='$r1' and notecomite is not null");
           $row2=mysqli_num_rows($query2);
           if($row2 > 0){ ?>
          <?php  for ($i=0; $i <$row2 ; $i++) { 
              $resulte2=mysqli_fetch_assoc($query2) ?>
           <td><?php echo $resulte2['notecomite'];  ?></td></tr>


         <?php } ?>

<?php }} ?>
</table>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<?php }else{ ?><script> alert("autenfier ou s'inscrire!!");window.location.href="authentifier.php";</script> <?php } ?>
</body>
</html>

