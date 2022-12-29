<?php session_start();
$pet_id=$_REQUEST['pet_id'];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify pet</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>

<!-- Header -->
<?php require 'header.php'?>

<!-- Modify pet informations form -->

<div class="forms">
<div class="form_only">
<h3> Modifier les informations de l'animal </h3>
<form action='../processing/modify_pet.php' method="post" name="modify_pet_form">
    <div class="form_line">
        <label for="petname" class="label"> Nom </label>
        <input type="text" name="petname">                 
    </div>
    <div class="form_line">
        <label for="owner_email" class="label"> Mail du maître</label>
        <input type="email" name="owner_email">        
    </div> 
    <div class="form_line">
        <label for="pet_picture" class="label"> Photo </label>
        <input type="file" id="pet_picture" name="pet_picture"accept="image/png, image/jpeg">           
    </div>
    <div class="form_line">
        <label for="pet_infos" class="label"> Informations supplémentaires </label>
        <input type="text" id="pet_infos" name="pet_infos">         
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Modifier </button>
    </div>
</form>
<form action="pet_details.php" method="POST">
<div class="form_line">
      <input type="hidden" value='<?= echo $pet_id?>' name="pet_id">
        <button id="btn" type="submit"> Retour </button> 
</div>
</form> 
</div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>


</body>
</html>