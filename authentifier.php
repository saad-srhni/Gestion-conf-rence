<html>
<head><title>autontifier</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style1.css">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>

</head>
<script>
function verifier(){
    var txt= "Saisire votre :";var n=txt.length;
    if(form2.user.value.length<1){
        txt+="identifient ";
    }
    if(form2.pass.value.length<1){
        txt+=" Password ";
    }
    if(n==txt.length)return true;
    else {alert(txt);return false;}
}
</script>

<body class="text-center"  >

 <center> <h1>authenifier ici</h1></center>
    <?php session_start(); session_destroy();  ?>
  <body>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="form-signin" name="form2" method="post" action="uploadAuthentifier.php">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">votre identifient</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="user" id="name"  placeholder="Enter votre identifient"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Votre Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="Password" class="form-control" name="pass" id="Password"  placeholder="Enter votre Password"/>
                </div>
              </div>
            </div>

            
<input type="submit"  class="btn btn-primary btn-lg btn-block login-button" name="submit" value="authentifier" onclick="return verifier()">
        <a href="inscription.php" style="color: black;">s'inscrire?</a>      
            
          </form>
        </div>
      </div>
    </div>
</body>
</html>




