<?php   

// Maintaining of the session
session_start();

//Destruction of the session
session_destroy();

//Redirection towards homepage
header ('location: ../../index.php');

