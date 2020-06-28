<html>
<head><title>s'inscrire</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style1.css">
    </head>
<script>
function verifier_champ(){
    var txt="Veuillez ajouter votre :";var x=txt.length;
   if (form1.name.value.length<1){
       txt +="Nom";
}
    if (form1.email.value.length<1){
txt +=" email ";
}
if (form1.user.value.length<1){
txt +="identifier ";
}
    
    if (form1.pass1.value.length<1){
txt +=" Password 1";
}
    if (form1.pass2.value.length<1){
txt +=" Password 2";
}
if(x==txt.length){return true;}
    else {alert(txt);return false;}
}

/*function est_nombre(c){
 if(c>='0' && c<='9')return true;
  else return false;
}*/
function est_caractere(c){
   if(c>='a' && c<='z' || c>='A' && c<='Z')return true;
    else return false;
   
}
function verifier_email(){
    var c=form1.email.value;
var test="" + c;var chaine1=false;var arobase=false;var chaine2=false;var point=false;var chaine3=false;
for(var k = 0; k < test.length;k++)
{
var d = test.substring(k,k+1);
if(k==0){
    if(est_caractere(d))chaine1=true;
}
if(chaine1==true && d=='@'  && arobase==false && chaine2==false && point==false && chaine3==false){arobase=true;}
    else {if(d=='@')arobase=false;}
if(arobase==true && chaine1==true && est_caractere(d)  && chaine2==false && point==false && chaine3==false){chaine2=true;}
if(chaine1==true && arobase==true && chaine2==true && d=='.' && point==false && chaine3==false){point=true;}
    else {if(d=='.')point=false;}
if(chaine1==true && arobase==true && chaine2==true && point==true && chaine3==false && est_caractere(d)){chaine3=true;}
}
if(chaine1==true && arobase==true && chaine2==true && point==true && chaine3==true)return true;
else { alert("Votre E-mail n’est pas valide ");
       return false;
     }
}


function verifier(){
   if(verifier_champ()==true && verifier_email()==true && verifier_password()==true)return true;
   else return false;
}
function verifier_password(){
    var c1;var c2;
    var pass1=form1.pass1.value+" ";
    var pass2=form1.pass2.value+" ";
    if (pass1.length > 6 && pass2.length > 6){
   if( pass1.length==pass2.length ){
       for(var k = 0; k < pass1.length;k++)
       {
           c1=pass1.substring(k,k+1);
           c2=pass2.substring(k,k+1);
 if(c1!=c2){alert("les deux mots de passe doivent etre identiques");return false;}
       }
   }else {alert("les deux mots de passe doivent etre identiques");return false;}
           return true;
 } else {  alert("le mot de pass est court ressayer avec mot pass >6"); return false;}

}

</script>
<body>
   <center> <h1>s'inscrire ici</h1></center>
    <?php session_start(); session_destroy();  ?>
  <body>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" method="post" action="uploadInscription.php" name="form1">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Votre Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Name complete"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Votre Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter votre Email"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="user" id="username"  placeholder="Enter votre Username"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="pass1" id="password"  placeholder="Enter Votre Password"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="pass2" id="confirm"  placeholder="Confirmer votre Password"/>
                </div>
              </div>
            </div>
<input type="submit"  class="btn btn-primary btn-lg btn-block login-button" name="submit" onclick=" return verifier();"  value="s'inscrire">
             <a href="authentifier.php" style="color: black;">authentifier?</a>
          </form>
        </div>
      </div>
    </div>
</body>
</html>
