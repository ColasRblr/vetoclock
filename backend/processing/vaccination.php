<?php 
session_start();
require 'db_connection.php';
$pet_id=$_REQUEST['pet_id'];

//Looking into the db for the client_id of the pet
$registerVaccination = $db_connection->prepare('INSERT INTO VACCINATION (pet_id, vaccine_name, first_or_booster, date, next_booster) VALUES (?, ?, ?, ?,?)');
$registerVaccination->execute(array($pet_id, strip_tags($_POST['vaccine_name']), strip_tags($_POST['first_or_booster']), strip_tags($_POST['date']), ($_POST['next_booster'])));

    
header("location: ../../frontend/views/pet_details.php?pet_id=".$pet_id);