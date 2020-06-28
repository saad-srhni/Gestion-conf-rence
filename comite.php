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
  <header><center><h1>profil comite</h1></center></header>
<?php session_start(); $user=$_SESSION['user'];
 $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user' and type='comite'");
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
        <li class="active"><a href="comite.php">profil</a></li>
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
      <a href="#section1" class="btn btn-primary" style="width: 200px;margin-top: 10px;">evaluer les papiers</a>
    </div>
<div class="col-sm-10 text-left" style="background-color: #98FB98;">
<div id="section1"  class="bg-success">
<center><h2 style="padding: 10px;border-bottom: solid;">evaluer papier</h2></center>
<form action="uploadComite.php" method="post" name="form1">
	<?php
	
   $user=$_SESSION['user'];
   $query=mysqli_query($connect,"SELECT papier.papierid as pid,papier.titre,evaluationcomite.notecomite as note FROM evaluationcomite,papier WHERE (notecomite is null) and papier.papierid=evaluationcomite.papierid"); 
    $row=mysqli_num_rows($query);
       if ($row>0) {
?> <table width="100%" border="2" class="table"> 
<tr><th>id papier</th><th>papier</th><th></th></tr>
  <?php
       	 for ($i=0; $i <$row ; $i++) { 
         $resulte=mysqli_fetch_assoc($query); 
       
       ?> 
   <tr> <td><?php echo $resulte['pid']; ?></td><td><a href="<?php echo "papier/".$resulte['titre'].".pdf"; ?>"><?php echo $resulte['titre']; ?></a></td><td></td></tr>
       
      <?php } ?>
<tr><td ><input type="text" name="idp" placeholder="Entre l'id de papier" class="form-control" ></td>
    <td> <input type="text" name="note" class="form-control" placeholder="donner la note(/20)"></td>
<td><input type="submit" name="submit1"   value="evaluer papier" class="btn btn-success"></td>
 </tr>
</table>

<?php 
}else {echo "il n'est a pas des papier pour evaluer";}
?>
</form>
</div>
</div>
</div>
</div>
</div>
<?php }else{ ?><script> alert("autenfier ou s'inscrire!!");window.location.href="authentifier.php";</script> <?php } ?>
</body>
</html>

