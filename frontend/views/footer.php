<?php
//si le header est présent sur une page connectée...
if (isset ($_SESSION)) { 

//...on récupère le nom et prénom de l'utilisateur sur la BDD grâce à l'id_user stocké dans la variable de session
include '../../backend/processing/db_connection.php';
 {
?>
  <div class="connected_footer"> 
        <div class="legal-connected"> Mentions légales </div>
        <div class="rate">Que pensez-vous de Vet O'Clock ? 
        <?php echo "<br><button class='btn-footer' onclick='window.location.href = `rate_app.php`'> Votre avis est précieux </button>"; ?>
</div>
 </div>
  
<?php
}
  } 

  //si le header est présent sur une page non connectée, on affiche un header neutre avec le logo du GBAF
  else { ?>

  <div class="general_footer">
    <div class="legal"> Mentions légales </div>
  </div>
  
<?php } ?>