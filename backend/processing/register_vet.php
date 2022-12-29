<?php

require 'db_connection.php';

// VET Register
    //Checking if user is already registered
   
    $already_registered = $db_connection->prepare("SELECT last_name, first_name, email FROM VETERINARIAN WHERE email=?");
    $already_registered->execute(array($_POST['email']));
    $check_registered = $already_registered-> fetchAll();
    
    //If email already exists in DB, user is informed
    if($_POST['email']== $check_registered){
    echo "Ce mail est déjà utilisé <br> Retour accueil <br> <a href='../../index.php' id='home_link'>
    <img src='../style/image/logo-vetoclock.png' alt='Vetoclock image' id='vetoclock' width='100'> 
  </a>";
    
    //Insert vet infos into user and veterian tables
    } else { 
    $registerVet = $db_connection->prepare('INSERT INTO VETERINARIAN (last_name, first_name, vet_clinic, email, phone_number, password, secret_question, secret_answer) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $registerVet->execute(array (strip_tags($_POST['lastname']), strip_tags($_POST['firstname']), ($_POST['vet_clinic']), strip_tags($_POST['email']), strip_tags($_POST['phone_number']), password_hash($_POST['password'], PASSWORD_DEFAULT), implode([$_POST['secret_question']]), strip_tags($_POST['answer']) ));
    }   
    echo " Merci pour votre inscription <br> Retour accueil <br> <a href='../../index.php' id='home_link'>
    <img src='../style/image/logo-vetoclock.png' alt='Vetoclock image' id='vetoclock' width='100'> 
  </a>";