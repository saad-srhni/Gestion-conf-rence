<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <style type="text/css">
    body {padding-top:20px;}
  </style>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="uploadContact.php" method="post">
          <fieldset>
            <legend class="text-center">Contacter nous</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nom </label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Votre nom" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Votre E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Votre email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Votre message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Entrer votre message ici..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Envoyer Message</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>


</body>
</html>