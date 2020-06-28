<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Conference-fsk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="accuiel.php">Conference-fsk</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="accuiel.php">ACCUEIL</a></li> 
        <li ><a href="contact.php">CONTACT</a></li>      
        <?php session_start(); 
  if(!empty($_SESSION['user'])){ 
    $user=$_SESSION['user'];
    $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");

    $db= mysqli_select_db($connect,'gestionconference');

    $query=mysqli_query($connect,"SELECT * FROM membre WHERE login='$user'"); 
    $resultat=mysqli_fetch_assoc($query);

    if(strcmp($resultat['type'],'admin')==0){
        ?>
        <li><a href="admin.php">PROFIL</a></li>
         <?php }

         if(strcmp($resultat['type'],'auteur')==0){ ?>
    <li><a href="auteur.php">PROFIL</a></li>
     <?php }

           if(strcmp($resultat['type'],'comite')==0){ ?>
    <li><a href="comite.php">PROFIL</a></li>
     <?php }

        if(strcmp($resultat['type'],'presedent')==0) { ?>
          <li><a href="presedent.php">PROFIL</a></li>
          

     <?php   } ?>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="authentifier.php"><span class="glyphicon glyphicon-log-in"></span>DECONECTER</a>  </li>
        </ul>

      <?php  }else{ ?>
        </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="authentifier.php" class="my-2 my-lg-0 navbar-right"><span class="glyphicon glyphicon-user"></span> AUTHENTIFIER</a></li> 
    <li><a href="inscription.php"><span class="glyphicon glyphicon-log-in"></span> S'INSCRIRE</a></li>
       </ul>  
            <?php } ?>
    </div>
  </div>
  <img src="image/conference.jpg" class="img-responsive" alt="conference-fsk" style="width: 100%;height: 500px;">
</nav> 

<div class="container bg-3 text-center items">    
  <h3>Consulter les conferences</h3><br>
  <div class="row">
    <?php
     $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query1=mysqli_query($connect,"SELECT * FROM conference"); 
     $row1=mysqli_num_rows($query1);
     if($row1>0){ 
      for ($i=0; $i < $row1; $i++) {
        $resulte1=mysqli_fetch_assoc($query1); 
      ?>
    <!--<a href="conference.php/id=<?php echo($resulte1['conferenceid']) ?>"> -->
    <div class="col-sm-3 col-lg-4">
            <img src="<?php echo "image/".$resulte1['image'].".jpg"; ?>" class="img-responsive" style="width:100%" alt="Image">
            <h3><?php echo $resulte1['titre']; ?></h3>
            <h4><?php echo "(date conférence ".$resulte1['dateConference'].")"; ?></h4>
            <h4><?php echo "(date soumession ".$resulte1['dateSoumission'].")"; ?></h4>
            <h4><?php echo "(date evaluation ".$resulte1['dateEvaluation'].")"; ?></h4>
      <p><?php echo($resulte1['description']); ?></p>
    </div>
 <!-- </a>-->
<?php } 
}else {echo "il y n'est a pas des conferences"; } 
 ?>
  </div>
</div><br>

<br><br>

<footer class="container-fluid text-center" style="background-color: black;">
  <p>Conference-fsk propose une soulition pour  soumission
de papier, d'affectation de papier, d'évaluation de papier, de décision de
papier</p>
<p>© 2019 Conference-fsk tous les droites réservés</p>
</footer>

</body>
</html>
