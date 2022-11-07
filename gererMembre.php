<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Gérer les membres</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
  session_start();
  require('QUERY.php');
  
  if(isset($_POST['boutonSupprimer'])) {
    supprimerMembre($_POST['boutonSupprimer']);
    header("Location: gererMembre.php");
  };
?>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Gérer les membres</h1>

  <div class="supprPopup">
    <h2>Le membre a été supprimé !</h2>
    <img src="images/bin.png" alt="valider" class="imageIcone centerIcon">
  </div>
 
  

  <form id="formGestionMembre" method="POST">
  <button type="submit" name="boutonDeco" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Déconnexion</span></button>
    <div class="miseEnForme" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="" id="">
          <option value="Normal">Normal</option>
          <option value="Normal">Normal</option>
          <option value="Normal">Normal</option>
          <option value="Normal">Normal</option>
          <option value="Normal">Normal</option>
          <option value="Normal">Normal</option>
        </select>
      </div>
      <div class="centerIconeChamp">
        <img src="images/search.png" class="imageIcone" alt="icone de loupe">
        <input type="text" name="Recherche">
      </div>
    </div>
    <table>
      <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse mail</th>
        <th>Date de naissance</th>
        <th>Validé</th>
      </thead>

      <tbody id="tbodyGererMembres">
        <tr>
          <td>Placeholder1</td>
          <td>Placeholder1</td>
          <td>Placeholder1@gmail.com</td>
          <td>05/02/2003</td>
          <td><input type="checkbox" value="1" id="checked" onclick="Disable(this);" id="$i"></td>
          <td><button type="submit" name="boutonSupprimer" class="boutonSupprimer"><img src="images/bin.png" class="imageIcone" alt="icone supprimer"><span>Supprimer</span></button></td>
        </tr>
        <?php
          AfficherNomPrenomDateNaissanceCourrielBoutonSupprimerMembrePlusValidation();
          if(isset($_POST['boutonDeco'])) {  
            session_destroy();
            header('Location: index.php');
          };
        ?>
      </tbody>
    </table>
  </form>
</body>
</html>