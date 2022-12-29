<?php session_start();
require '../../backend/processing/db_connection.php';

//Récupérer le vet_id que l'utilisateur connecté soit un véto ou un client
if(isset($_SESSION['vet_id'])) {
$vet_id = $_SESSION['vet_id'];
} elseif (isset($_SESSION['vet'])) {
$vet_id = $_SESSION ['vet'];
}

//Afin de récupérer les animaux de ce vétérinaire (puisqu'un client n'a qu'un seul véto)
$sqlPet= $db_connection->prepare("SELECT * FROM PET WHERE vet_id = ? ORDER BY pet_id");
$sqlPet->execute(array($vet_id));
$pets = $sqlPet -> fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-connected</title>
    <link rel="stylesheet" href="../style/style/extensions.css">
    <link rel="stylesheet" href="../style/style/user_connected.css">

</head>
<body>

<!-- Header -->
<?php require 'header.php';?>

<div class="user-connected">

<!-- Pet list-->
<div id="left_section">
<?php foreach($pets as $pet):?>

    <section class="pet"> 
        <div class="pet_picture_name">
            <?php echo '<img src="data:image/jpeg;base64,'. base64_encode($pet['picture']) .'" width=100 alt="photo de l\'animal">';?>
         <h3><?php echo $pet['name'];?></h3>
        </div>
        <div class="pet_datas"> 
        <div class="birthdate">
            <p>Date de naissance : <?php echo $pet['birth_date'];?></p>
        </div>
        <div class="sex">
            <p>Sexe : <?php echo $pet['sex'];?></p>
        </div>
        <div class="notes">
            <p>Informations particulières : <?php echo $pet['notes'];?></p>
        </div>
            <div class="pet_details">
              <form action="pet_details.php" method="POST">
                <input type="hidden" value='<?php echo $pet['pet_id']?>' name="pet_id">
                <button class="usr_btn" type="submit">Carnet de santé</button>
              </form>
            </div>
</section>
        <?php endforeach; ?>
</div>

        <!-- Add pet button -->
<div id="right_section">
<h2>Ajouter un nouvel animal</h2>
<button class="add_btn" onclick="window.location.href='new_pet.php'"> + </button>
</div>
</div>


<!-- Footer -->
<?php require 'footer.php'?>

</body>
</html>