<?php session_start ()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify personal infos</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>
<!-- Header -->
<?php require 'header.php'?>
<!-- Update personal infos form -->
<div class="forms">
<div class="form_only">
<h3> Modifier ses informations personnelles </h3>
<form action='../processing/modify_infos.php' method="post" name="register_form">
    <div class="form_line">
        <label for="lastname" class="label"> Nom </label>
        <input type="text" name="lastname">  
</div>               
    <div class="form_line">
        <label for="firstname" class="label"> Prénom </label>
        <input type="text" name="firstname">       
    </div>
    <div class="form_line">
        <label for="email" class="label"> Email</label>
        <input type="email" name="email" value=""> 
    </div>
    <div class="form_line">
        <label for="phone_number" class="label"> Numéro de téléphone</label>
        <input type="tel" name="phone_number">        
    </div> 
    <div class="form_line">
        <label for="password" class="label"> Mot de passe </label>
        <input type="password" name="password" value="">              
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Enregistrer mes modifications </button>
    </div>
</form>
</div>
</div>
<!-- Footer -->
<?php require 'footer.php'?>
</body>
</html>