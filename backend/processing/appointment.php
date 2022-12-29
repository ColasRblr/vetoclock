<?php 
session_start();
require 'db_connection.php';
$pet_id=$_REQUEST['pet_id'];

//Looking into the db for the client_id of the pet
$registerAppointment = $db_connection->prepare('INSERT INTO APPOINTMENT_REPORT (appointment_date, pet_id, weight, report, vaccination_update) VALUES (?, ?, ?, ?,?)');
$registerAppointment->execute(array(strip_tags ($_POST['date']), $pet_id, strip_tags($_POST['weight']), strip_tags($_POST['report']), ($_POST['vaccination_update'])));
    
header("location: ../views/pet_details.php?pet_id=".$pet_id);