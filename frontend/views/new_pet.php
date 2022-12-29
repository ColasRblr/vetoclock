<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New pet</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>
<!-- Header -->
<?php require 'header.php'?>

<!-- Add pet form -->
<div class="forms">
<div class="form_only">
    <h3> Nouvel animal </h3>
<form action='../processing/new_pet.php' method="post" name="new_pet_form">
<div class="form_line">
        <label for="owner_email" class="label"> Mail du maître</label>
        <input type="email" name="owner_email" required="required">        
    </div> 
    <div class="form_line">
        <label for="species" class="label"> Espèce </label>
        <select name="species">
            <option value="cat"> Chat </option>
            <option value="dog"> Chien </option>
            <option value="rabbit"> Lapin</option>
            <option value="exotic"> NAC</option>
        </select>
    </div>
    <div class="form_line">
        <label for="name" class="label"> Nom </label>
        <input type="text" name="name" required="required">    
</div>             
    <div class="form_line">
        <label for="birthdate" class="label"> Date de naissance </label>
        <input type="date" name="birthdate" required="required">    
    </div>
    <div class="form_line">
    <label for="sex" class="label"> Sexe </label>
        <select name="sex">
            <option value="male"> Mâle </option>
            <option value="female"> Femelle </option>
        </select>
    </div>
    <div class="form_line">
        <label for="notes" class="label"> Informations supplémentaires </label>
        <input type="text" id="notes" name="notes">         
    </div>
    <div class="form_line">
        <label for="picture" class="label"> Photo </label>
        <input type="file" id="picture" name="picture"accept="image/png, image/jpeg">           
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Enregistrer </button>
    </div>
</form>
</div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>
</body>
</html>