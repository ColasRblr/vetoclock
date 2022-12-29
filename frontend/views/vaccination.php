<?php session_start();
$pet_id=$_REQUEST['pet_id'];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add vaccination infos</title>
    <link rel="stylesheet" href="../style/style/forms.css">
    <link rel="stylesheet" href="../style/style/extensions.css">
</head>
<body>
<!-- Header -->
<?php require 'header.php';?>

<!-- Add pet form -->
<div class="forms">
<div class="form_only">
    <h3> Suivi vaccinal</h3>
<form action='../processing/vaccination.php' method="post" name="vaccination_form">  
      <input type="hidden" value='<?php echo $pet_id?>' name="pet_id">
      <div class="form_line">
        <label for="vaccine_name" class="label"> Vaccin </label>
        <select name="vaccine_name">
            <option value="rage"> Rage </option>
            <option value="typhus"> Typhus</option>
            <option value="coryza"> Coryza</option>
            </select>
        </div>
        <div class="form_line">
            <label for="first_or_booster" class="label"> Stade de vaccination </label>
            <select name="first_or_booster">
            <option value="first"> Premier </option>
            <option value="booster"> Rappel </option>
            </select>
        </div>
    <div class="form_line">
        <label for="date" class="label"> Date du vaccin</label>
        <input type="date" name="date" required="required">    
    </div>
    <div class="form_line">
        <label for="next_booster" class="label"> Date du prochain rappel </label>
        <input type="date" name="next_booster" required="required">    
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Enregistrer </button>
    </div>
</form>
<form action="pet_details.php" method="POST">
    <div class="form_line">
      <input type="hidden" value='<?php echo $pet_id?>' name="pet_id">
        <button id="btn" type="submit"> Retour </button> 
</div>
</form> 
</div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>
</body>
</html>