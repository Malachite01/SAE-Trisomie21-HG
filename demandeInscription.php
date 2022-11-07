<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Demande inscription</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Demande inscription</h1>

  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champNom">Nom :</label>
      <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champPrénom">Prénom :</label>
      <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champDateDeNaissance">Date de naissance :</label>
      <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" required>
      <span></span>

      <label for="champAdresse">Adresse :</label>
      <input type="text" name="champAdresse" placeholder="Entrez votre adresse" maxlength="50" required>
      <span></span>

      <label for="champCp">Code postal :</label>
      <input type="text" name="champCp" placeholder="Entrez votre code postal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="50" required>
      <span></span>

      <label for="champVille">Ville :</label>
      <input type="text" name="champVille" placeholder="Entrez votre ville" maxlength="50" required>
      <span></span>

      <label for="champPro">Professionnel :</label>
      <div class="center" style="width: 100%;">
        <span class="center1Item">
          <input type="radio" name="champPro" id="proNon" value="null" checked required>
          <label for="proNon" class="radioLabel" tabindex="0">Non</label>
        </span>
        <span class="center1Item">
          <input type="radio" name="champPro" id="proOui" value="1" required>
          <label for="proOui" class="radioLabel" tabindex="0">Oui</label>
        </span>
      </div>
      <span></span>
      

      <label for="champMail">Adresse mail :</label>
      <input type="email" name="champMail" placeholder="Ex: exemple@xyz.com" minlength="3" maxlength="50" required>
      <span></span>

      <label for="champMdp">Mot de passe :</label>
      <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
      <span></span>

      <label for="champConfirmerMdp">Confirmer mot de passe :</label>
      <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
      <span></span>
      <p id="messageVerifMdp" style="color: red;"></p>

    </div>    

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  <?php
        require('QUERY.php');
        if (champRempli(array('champNom', 'champPrénom', 'champAdresse', 'champCp', 'champVille', 'champMail', 'champDateDeNaissance', 'champMdp', 'champPro'))) {
            if (membreIdentique(
                $_POST['champNom'],
                $_POST['champPrénom'],
                $_POST['champDateDeNaissance'],
                $_POST['champMail']
            ) == 0) {
                ajouterMembre(
                    $_POST['champNom'],
                    $_POST['champPrénom'],
                    $_POST['champAdresse'],
                    $_POST['champCp'],
                    $_POST['champVille'],
                    $_POST['champMail'],
                    $_POST['champDateDeNaissance'],
                    $_POST['champMdp'],
                    $_POST['champPro']
                );
                echo '
                  <div class="validationPopup">
                    <h2 class="txtPopup">Une demande de création de compte a bien été envoyée !</h2>
                    <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
                    <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
                  </div>';
            } else {
              echo 
              '<div class="erreurPopup">
                <h2 class="txtPopup">Le membre n\'a pas été ajouté à la base car il existe déja.</h2>
                <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
                <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
              </div>';
            }
        }
  ?>
</body>
</html>