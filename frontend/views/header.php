<?php
//si le header est présent sur une page connectée...
if (isset ($_SESSION)) { 
?>
  <div class="connected_header"> 
    <a href="user_connected.php" id="userpage_link">
      <img src="../style/img/logo-vetoclock.png" alt="Vetoclock image" id="vetoclock_logo" width="80"> 
    </a>
      <div class="user">
           <p> <?= $_SESSION['last_name']; echo '&nbsp'; echo $_SESSION['first_name'] ;echo '<br>Clinique&nbsp'; echo $_SESSION['vet_clinic']?></p>
        </div>
      <div id="boutons">
        <?= "<br><button class='btn-header' onclick='window.location.href = `modify_infos.php`'> Modifier mes informations personnelles </button>"; ?>
        <?= "<br><button class='btn-header' onclick='window.location.href = `../../backend/processing/logout.php`'>Se déconnecter</button>";?> 
      </div>
      <div id="boutons-responsive">
        <?= "<br><button class='btn-header' onclick='window.location.href = `modify_infos.php`'> Paramètres </button>"; ?>
        <?= "<br><button class='btn-header' onclick='window.location.href = `../../backend/processing/logout.php`'> X </button>";?> 
      </div>
    </div>
  
<?php 
  } 

  //si le header est présent sur une page non connectée, on affiche un header neutre avec le logo du GBAF
  else { ?>

  <div class="general_header">
    <a href="index.php" id="home_link">
      <img src="frontend/style/img/logo-vetoclock.png" alt="Vetoclock image" id="vetoclock_logo" width="80"> 
    </a>
    <button class='btn-header' id='reset-password' onclick='window.location.href = `frontend/views/reset_password.php`'> J'ai oublié mon mot de passe </button>
  </div>
  
<?php } ?>
  