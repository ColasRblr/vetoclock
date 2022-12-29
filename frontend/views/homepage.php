<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="frontend/style/style/forms.css">
    <link rel="stylesheet" href="frontend/style/style/extensions.css">
    <link rel="stylesheet" href="frontend/style/style/home.css">

</head>
<body>

<!-- Header -->
<?php require 'header.php'?>

<!-- Login form -->
<div class="top_page">
<div id="app-sentence-ad">
      <h1> L'appli qui facilite la communication entre les vétérinaires et leur clientèle ! </h1>
      <span id="mobile_title"><h2> L'appli qui facilite la communication entre les vétérinaires et leur clientèle ! </h2></span>
  </div>
    <div id="loginform">
    <h3> Vous avez déjà un compte ? Connectez-vous ! </h3>
      <?php require 'login.html'?>
</div>
</div>
</div>

<!-- General presentation of the app + redirection towards register forms (vet AND client)-->

    <div class="bottom_page">   
        <div id="vet-part">
    <h3>Vous êtes vétérinaire ? </h3>  
        <p>Texte qui présente l'application à destination des vétérinaires <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. <p>
        <button class="register_btn" onclick="window.location.href='views/register_vet.php'"> Créer un compte vétérinaire </button>
</div>
<div id="client-part">
        <h3>Vous êtes client d'un vétérinaire de notre réseau ? </h3>
        <p>Texte qui présente l'application à destination des clients <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit.<p>
        <button class="register_btn" onclick="window.location.href='views/register_client.php'"> Créer un compte client </button>
    </div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>

<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="frontend/scripts/index.js"></script>
</body>
</html>