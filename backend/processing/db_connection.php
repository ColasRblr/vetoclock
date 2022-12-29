<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "VETOCLOCK";

try {
    $db_connection = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);

    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	die('Erreur : '.$e->getMessage());
}

//Useful db datas to display at different places on the app

//vet clinics
$sqlClinic= $db_connection->prepare("SELECT * FROM VET_CLINIC ORDER BY vet_clinic_id");
$sqlClinic->execute(array());
$vet_clinics = $sqlClinic -> fetchAll();

//vets
$sqlVet= $db_connection->prepare("SELECT * FROM VETERINARIAN ORDER BY vet_id");
$sqlVet->execute(array());
$vets = $sqlVet -> fetchAll();
