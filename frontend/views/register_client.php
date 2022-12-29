<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register client</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>
<!-- Header -->
<?php require 'header.php';
require '../db_connection.php';?>

<!-- Client register form -->
<div class="forms">
<div class="form_only">
<h3> Formulaire d'inscription - Client </h3>
<form action='../processing/register_client.php' method="post" name="register_form">
    <div class="form_line">
        <label for="lastname" class="label"> Nom </label>
        <input type="text" name="lastname" required="required">  
</div>               
    <div class="form_line">
        <label for="firstname" class="label"> Prénom </label>
        <input type="text" name="firstname" required="required">       
    </div>
    <div class="form_line">
        <label for="vet_clinic" class="label"> Cabinet vétérinaire </label>
        <select name="vet_clinic">
        <?php foreach($vet_clinics as $vet_clinic): ?>
            <option> <?php echo $vet_clinic['name'] ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form_line">
        <label for="vet" class="label"> Mon vétérinaire </label>
        <select name="vet">
            <?php foreach($vets as $vet): ?>
            <option> <?php echo $vet['last_name'] ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form_line">
        <label for="email" class="label"> Email</label>
        <input type="email" name="email" value="" required="required"> 
    </div>
    <div class="form_line">
        <label for="phone_number" class="label"> Numéro de téléphone</label>
        <input type="tel" name="phone_number" required="required">        
    </div> 
    <div class="form_line">
        <label for="password" class="label"> Mot de passe </label>
        <input type="password" name="password" value="" required="required">              
    </div>
    <div class="form_line">
        <label for="secret_question">Choisissez votre question secrète</label>
        <select name="secret_question" id="secret_question">
            <option value="g-m">Quel est le prénom de votre grand-mère maternelle ?</option>
            <option value="pet">Quel est le nom de votre premier animal de compagnie ?</option>
            <option value="adress">Quel est le nom de la rue où vous avez grandi ?</option>
        </select>            
    </div>
    <div class="form_line">
        <label for="answer" class="label"> Votre réponse </label>
        <input type="text" name="answer" id="answer" required="required" value="">            
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Créer mon compte </button>
    </div>
</form>
</div>
</div>
<!-- Footer -->
<?php require 'footer.php'?>

</body>
</html>