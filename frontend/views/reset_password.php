<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../style/style/forms.css">
</head>
<body>
<!-- Return logo -->

<a href="../../index.php" id="home_link">
      <img src="../style/img/logo-vetoclock.png" alt="Vetoclock image" id="vetoclock_logo" width="80"> 
    </a>

<!-- Reset password form -->
        <div class="form_only">
        <h3> Réinitialisation du mot de passe </h3>
        <form class="form" method="post" action="../processing/reset-password.php">
        <div class="form_line">
          <label for="vet-or-client"> Je suis : </label> 
            <select name="vet-or-client" id="vet-or-client">
              <option value="vet">Vétérinaire</option>
              <option value="client">Client</option>
            </select>
    </div>
    <div class="form_line">
        <label for="email" class="label"> Email</label>
        <input type="email" name="email" value="" required="required"> 
    </div>
    <div class="form_line">
          <label for="question-select"> Quelle était la question secrète de votre choix ? </label> 
            <select name="question" id="question-select">
              <option value="g-m">Quel est le prénom de votre grand-mère maternelle ?</option>
              <option value="pet">Quel est le nom de votre premier animal de compagnie ?</option>
              <option value="address">Quel est le nom de la rue où vous avez grandi ?</option>
            </select>
    </div>
    <div class="form_line">
        <label for="secret_answer" class="label"> Votre réponse </label>
        <input type="text"  class="text" name="reponse" id="reponse" required="required">            
    </div>
    <div class="form_line">
        <label for="new_password" class="label"> Nouveau mot de passe </label>
        <input type="password" name="new_password" value="" required="required">              
    </div>
    <div class="button">
        <button type="submit" value="submit" id="btn"> Nouveau mot de passe </button>
    </div>
        </form>
      </div>

</body>
</html>