<?php 
session_start();
require 'db_connection.php';

//Looking into the db for the client_id of the pet
$sqlClient= $db_connection->prepare("SELECT email, client_id, vet FROM CLIENT WHERE email=?");
$sqlClient->execute(array($_POST['owner_email']));
$client_id = $sqlClient -> fetch();

//Looking into the db for the vet_id of the pet
$sqlVet= $db_connection->prepare("SELECT vet_id FROM VETERINARIAN JOIN CLIENT ON VETERINARIAN.last_name = CLIENT.vet WHERE CLIENT.email=?");
$sqlVet->execute(array($_POST['owner_email']));
$vet_id = $sqlVet -> fetch();

$registerPet = $db_connection->prepare('INSERT INTO PET (owner_email, species, name, birth_date, sex, notes, picture, client_id, vet_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)');
$registerPet->execute(array(strip_tags ($_POST['owner_email']), strip_tags($_POST['species']), strip_tags($_POST['name']), strip_tags($_POST['birthdate']), strip_tags($_POST['sex']), strip_tags($_POST['notes']), ($_FILES['picture']), ($client_id['client_id']), ($vet_id['vet_id'])));
    
header("location: ../views/user_connected.php");