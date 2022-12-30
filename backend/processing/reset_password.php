<?php
//DB connection
require_once 'db_connection.php'; 

// Creating variables and security
   $email = strip_tags($_POST['email']);
   $answer = strip_tags($_POST['answer']);
   $password = strip_tags($_POST['new_password']);

//Checking inputs are not empty
if (!empty($_POST['vet-or-client']) && !empty($_POST['email']) && !empty($_POST['answer']) && !empty($_POST['new_password'])) {
   
   //Conversion array to string
   $question = implode([$_POST['question']]);
      
   //Checking for vet
   if ($_POST['vet-or-client']=== "vet") {

   // Checking if vet is registered
   $check = $db_connection->prepare('SELECT email, secret_question, secret_answer FROM VETERINARIAN WHERE email=?');
   $check->execute(array(strip_tags($_POST['email'])));
   $data = $check->fetch();
   $row = $check->rowCount(); 
      
   // If row > 0 then vet exists
   if($row > 0) {

      //Is question selected the same as registration
      if($question === $data['secret_question']){

         // Is answer the good one
         if($answer === $data['secret_answer']) {

            // Updating password in db
            $update = $db_connection->prepare("UPDATE VETERINARIAN SET password=? WHERE email=?");
            $update->execute(array(password_hash($_POST['new_password'], PASSWORD_DEFAULT), $_POST['email']));
   
            //Success message
            echo "Votre mot de passe est modifié ! <br> Vous pouvez vous rendre sur la <a href='../../index.php'> page d'accueil </a> pour vous connecter";

         //Error message (wrong answer)
         } else {
            echo "Vous n'avez pas répondu correctement à la question secrète<br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>"; 
                }
      //Error message (wrong question)
      } else { 
         echo "Vous aviez choisi une autre question secrète lors de votre inscription<br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>";
             }
   //Error message (user isn't in db)
   } else { 
      echo "Utilisateur non reconnu <br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>";
     }

     //Same checking for client  
  } elseif ($_POST['vet-or-client']=== "client") {

  // Checking if client is registered
  $check = $db_connection->prepare('SELECT email, secret_question, secret_answer FROM CLIENT WHERE email=?');
  $check->execute(array(strip_tags($_POST['email'])));
  $data = $check->fetch();
  $row = $check->rowCount(); 
     
  // If row > 0 then client exists
  if($row > 0) {

     //Is question selected the same as registration
     if($question === $data['secret_question']){

        // Is answer the good one
        if($answer === $data['secret_answer']) {

           // Updating password in db
           $update = $db_connection->prepare("UPDATE CLIENT SET password=? WHERE email=?");
           $update->execute(array(password_hash($_POST['new_password'], PASSWORD_DEFAULT), $_POST['email']));
  
           //Success message
           echo "Votre mot de passe est modifié ! <br> Vous pouvez vous rendre sur la <a href='../../index.php'> page d'accueil </a> pour vous connecter";

        //Error message (wrong answer)
        } else {
           echo "Vous n'avez pas répondu correctement à la question secrète<br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>"; 
               }
     //Error message (wrong question)
     } else { 
        echo "Vous aviez choisi une autre question secrète lors de votre inscription<br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>";
            }
  //Error message (user isn't in db)
  } else { 
     echo "Utilisateur non reconnu <br><a href='../../frontend/views/reset_password.php'> Essayez à nouveau </a>";
         }
 }
}
 