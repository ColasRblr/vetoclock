<?php
require 'db_connection.php';

// We check if vet or client to look into the correct table
    if ($_POST['vet-or-client']== "vet") {

    // We check if the vet is registered
    $check = $db_connection->prepare('SELECT * FROM VETERINARIAN WHERE email =?');
    $check->execute(array(strip_tags($_POST['email'])));
    $data = $check->fetch();
    $row = $check->rowCount();  

    // If > à 0 then vet is in the table
    if($row > 0) {

       // We check the password
       if(password_verify(strip_tags($_POST['password']), $data['password'])) {

          // If all good : we start a session and create session variables
          session_start();
          $_SESSION['vet_id'] = $data['vet_id'];
          $_SESSION['last_name'] = $data['last_name'];
          $_SESSION['first_name'] = $data['first_name'];
          $_SESSION['vet_clinic'] = $data['vet_clinic'];
          $_SESSION['email'] = $data['email'];

          //Redirection towards user-connected.php
          header('location: ../views/user_connected.php');
          die();

       //If wrong password, vet advised
       } else { 
          echo "Mot de passe invalide <br/> <a href='../index.php'>Retour</a>"; 
             }

    //If < 0 : then vet is not in the table
    } else {
       echo "Utilisateur non reconnu <br/> <a href='../index.php'>Retour</a>";
          }
  } elseif ($_POST ['vet-or-client'] =='client')  {

    // We check if the client is registered
    $check = $db_connection->prepare('SELECT * FROM CLIENT WHERE email =?');
    $check->execute(array(strip_tags($_POST['email'])));
    $data = $check->fetch();
    $row = $check->rowCount();  

    // If > à 0 then client is in the table
    if($row > 0) {

       // We check the password

       if(password_verify(strip_tags($_POST['password']), $data['password'])) {

          // If all good : we start a session and create session variables
          session_start();
          $_SESSION['client_id'] = $data['client_id'];
          $_SESSION['last_name'] = $data['last_name'];
          $_SESSION['first_name'] = $data['first_name'];
          $_SESSION['vet_clinic'] = $data['vet_clinic'];
          $_SESSION['vet'] = $data['vet'];

          //Redirection towards user-connected.php
          header('location: ../views/user_connected.php');
          die();

       //If wrong password, client advised
       } else { 
          echo "Mot de passe invalide <br/> <a href='../index.php'>Retour</a>"; 
             }

    //If < 0 : then client is not in the table
    } else {
       echo "Utilisateur non reconnu <br/> <a href='../index.php'>Retour</a>";
          }
  } 