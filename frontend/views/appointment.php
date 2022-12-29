<?php session_start();
require '../backend/processing/db_connection.php';
$pet_id=$_REQUEST['pet_id'];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add appointment report</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>

<!-- Header -->
<?php require 'header.php';?>

<!-- Add pet form -->
<div class="forms">
<div class="form_only">
    <h3> Compte-rendu de consultation </h3>
<form action='../processing/appointment.php' method="post" name="appointment_form">  
      <input type="hidden" value='<?php echo $pet_id?>' name="pet_id">
    <div class="form_line">
        <label for="date" class="label"> Date de la consultation </label>
        <input type="date" name="date" required="required">    
    </div>
    <div class="form_line">
        <label for="weight" class="label"> Poids </label>
        <input type="text" name="weight" required="required">    
    </div>
    <div class="form_line">
        <label for="report" class="label"> Compte-rendu </label>
        <input type="textarea" name="report" required="required">    
    </div>
    <div class="form_line">
        <label for="vaccination_update" class="label"> Vaccination à jour ? </label>
        <select name="vaccination_update">
            <option value="yes"> Oui </option>
                <option value="no"> Non </option>
            </select>
        </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Enregistrer </button>
    </div>
</form>
<form action="pet_details.php" method="POST">
      <input type="hidden" value='<?php echo $pet_id?>' name="pet_id">
        <button class="btn" type="submit"> Retour </button> 
</form>     
</div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>

</body>
</html>