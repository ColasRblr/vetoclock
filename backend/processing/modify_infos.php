<?php 
// Maintaining session open
session_start() ;

//Including db_connectionect
require_once 'db_connection.php'; 
  
//Checking if the user is a vet or a client
if(isset($_SESSION['vet_id'])) {

//1:Update of lastname
if (!empty($_POST['lastname'])) {
  $update_lastname = $db_connection->prepare("UPDATE VETERINARIAN SET last_name=? WHERE vet_id=?");
  $update_lastname->execute(array(strip_tags($_POST['lastname']),$_SESSION['vet_id']));
};

//2:Update of firstname
if (!empty($_POST['firstname'])) {           
    $update_firstname = $db_connection->prepare("UPDATE VETERINARIAN SET first_name=? WHERE vet_id=?");
    $update_firstname->execute(array(strip_tags($_POST['firstname']),$_SESSION['vet_id']));
};

//3:Update of email
if (!empty($_POST['email'])) {
    $update_email = $db_connection->prepare("UPDATE VETERINARIAN SET email=? WHERE vet_id=?");
    $update_email->execute(array(strip_tags($_POST['email']),$_SESSION['vet_id']));
};

//4:Update of phone_number
if (!empty($_POST['phone_number'])) {
    $update_email = $db_connection->prepare("UPDATE VETERINARIAN SET phone_number=? WHERE vet_id=?");
    $update_email->execute(array(strip_tags($_POST['phone_number']),$_SESSION['vet_id']));
};

//5:Update of password
if (!empty($_POST['password_new'])) {                    
    $update_password = $db_connection->prepare("UPDATE VETERINARIAN SET password=? WHERE vet_id=?");
    $update_password->execute(array(password_hash($_POST['password_new'], PASSWORD_DEFAULT),$_SESSION['vet_id']));
};

// Same if the user is a client
} elseif (isset($_SESSION['client_id'])){

    //1:Update of lastname
if (!empty($_POST['lastname'])) {
    $update_lastname = $db_connection->prepare("UPDATE CLIENT SET last_name=? WHERE client_id=?");
    $update_lastname->execute(array(strip_tags($_POST['lastname']),$_SESSION['client_id']));
  };
  
  //2:Update of firstname
  if (!empty($_POST['firstname'])) {           
      $update_firstname = $db_connection->prepare("UPDATE CLIENT SET first_name=? WHERE client_id=?");
      $update_firstname->execute(array(strip_tags($_POST['firstname']),$_SESSION['client_id']));
  };
  
  //3:Update of email
  if (!empty($_POST['email'])) {
      $update_email = $db_connection->prepare("UPDATE CLIENT SET email=? WHERE client_id=?");
      $update_email->execute(array(strip_tags($_POST['email']),$_SESSION['client_id']));
  };
  
  //4:Update of phone_number
  if (!empty($_POST['phone_number'])) {
      $update_email = $db_connection->prepare("UPDATE CLIENT SET phone_number=? WHERE client_id=?");
      $update_email->execute(array(strip_tags($_POST['phone_number']),$_SESSION['client_id']));
  };
  
  //5:Update of password
  if (!empty($_POST['password_new'])) {                    
      $update_password = $db_connection->prepare("UPDATE CLIENT SET password=? WHERE client_id=?");
      $update_password->execute(array(password_hash($_POST['password_new'], PASSWORD_DEFAULT),$_SESSION['client_id']));
  };

}
header("location: ../../frontend/views/user_connected.php");