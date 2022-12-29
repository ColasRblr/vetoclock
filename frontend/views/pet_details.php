<?php session_start();

require '../../backend/processing/db_connection.php';

$sqlPetDetails= $db_connection->prepare("SELECT * FROM PET WHERE pet_id=?");
$sqlPetDetails->execute(array($_REQUEST['pet_id']));
$pet= $sqlPetDetails->fetch();
$pet_id=$_REQUEST['pet_id'];

//appointments
$sqlAppointment= $db_connection->prepare("SELECT * FROM APPOINTMENT_REPORT WHERE pet_id=?");
$sqlAppointment->execute(array($pet_id));
$appointments = $sqlAppointment -> fetch();

//vaccination
$sqlVaccination= $db_connection->prepare("SELECT * FROM VACCINATION INNER JOIN PET ON VACCINATION.pet_id = PET.pet_id WHERE PET.pet_id= ?");
$sqlVaccination->execute(array($_REQUEST['pet_id']));
$vaccines = $sqlVaccination -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="../style/style/extensions.css">
    <link rel="stylesheet" href="../style/style/pet_details.css">
</head>
<body>

<!-- Header -->
<?php require 'header.php';?>

<div class="pet_details">

<div id="left_section">

<!-- Pet id section displayed -->
<div class="pet_id">
    <div class="pet_picture_name">
            <?= '<img src="data:image/jpeg;base64,'. base64_encode($pet['picture']) .'" width=100 alt="photo de l\'animal">';?>
         <h2><?= $pet['name'];?></h2>
        </div>
        <div class="pet_datas"> 
        <div class="birthdate">
            <p>Date de naissance : <?= $pet['birth_date'];?></p>
        </div>
        <div class="sex">
            <p>Sexe : <?= $pet['sex'];?></p>
        </div>
        <div class="notes">
            <p>Informations particulières : <?= $pet['notes'];?></p>
        </div>
</div>
</div>

<!-- Research appointment report button -->

<!-- VET ONLY : add appointment report button-->
 <div class="add_appointment_btn">
    <h2>Ajouter un compte-rendu de consultation</h2>
    <form action="appointment.php" method="POST">
      <input type="hidden" value='<?= $pet_id?>' name="pet_id">
        <button class="pet_details_btn" type="submit"> + </button> 
    </form> 
</div>

<!-- Pet appointment section displayed -->
<div class="pet_appt_report">
    <div class="appointment_date">
        <h2>Date de la consultation : <?= $appointments['appointment_date'];?></h2>
    </div>
    <div class="report">
        <p> Compte-rendu : <?= $appointments['report'];?></p>
    </div>
    <div class="weight">
        <p> Poids : <?= $appointments['weight'];?> kgs</p>
    </div>
</div>
</div>

<div id="right_section">
<!-- Pet vax section displayed -->

<div class="pet_vax">
     <?php foreach($vaccines as $vaccine):?>
         <div class="name">
       <h2>Nom : <?= $vaccine['vaccine_name'];?></h2>
    </div>
    <div class="first_or_booster">
        <p> Stade de vaccination : <?= $vaccine['first_or_booster'];?></p>
    </div>
    <div class="next_booster">
        <p> Date du prochain rappel : <?= $vaccine['next_booster'];?> </p>
    </div> 
    <?php endforeach;?>

    <!-- VET ONLY : add vaccination infos button -->

<div class="update_vaccination_btn">
    <h2>Mettre à jour le suivi vaccinal de <?= $pet['name']?></h2>
    <form action="vaccination.php" method="POST">
      <input type="hidden" value='<?= $pet_id?>' name="pet_id">
        <button class="pet_details_btn" type="submit"> + </button> 
</form> 
</div>
</div>

<!-- Send mail (vax reminder) button -->
<div class="send_mail_btn">
    <form action="../../backend/processing/mail.php" method="POST">
      <input type="hidden" value='<?= $pet['name'];?>' name="pet_name">
      <input type="hidden" value='<?= $pet['owner_email']?>' name="owner_email">
      <input type="hidden" value='<?= $pet_id?>' name="pet_id">
        <button class="pet_details_btn" type="submit"> Envoyer mail de rappel </button> 
    </form> 
</div>

 <!-- Modify/delete pet page button -->
<div id="modify_delete_btn">
    <form action="modify_pet.php" method="POST">
        <input type="hidden" value='<?= $pet_id?>' name="pet_id">
        <button class="pet_details_btn" type="submit"> Modifier les informations de <?= $pet['name']?></button> 
    </form> 
    <button class="pet_details_btn" onclick="window.location.href='../../backend/processing/delete_pet.php'"> Supprimer la page de <?= $pet['name']?></button>
</div>    
</div>
</div>

<!-- Footer -->
<?php require 'footer.php'?>
</body>
</html>