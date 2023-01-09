<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Gérer les équipes</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
testConnexion();

if (isset($_POST['boutonSupprimer'])) {
    supprimerMembreEquipe($_POST['boutonSupprimer']);
    echo '
  <div class="supprPopup">
    <h2 class="txtPopup">Le membre a été retiré de l\'équipe!</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
?>
<?php

if (champRempli(array('champRole'))) {
    AjouterUneEquipe(
        $_POST['idEnfant'],
        $_POST['idMembre'],
        time(),
        $_POST['champRole']
    );
    echo '
    <div class="validationPopup">
      <h2 class="txtPopup">L\'enfant a bien été ajouté à l\'équipe !</h2>
      <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
    </div>';
    //ICI IL FAUDRA FAIRE LA VERIFICATION SI L4ENFANT EST DEJA DANS LEQUIPE ET ECHO CA
    // echo '
    // <div class="erreurPopup">
    //   <h2 class="txtPopup">Erreur, l\'enfant est déja dans cette équipe.</h2>
    //   <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
    //   <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
    // </div>';
}
?>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>

    <?php faireMenu(); ?>

    <h1>Gérer les équipes</h1>
    <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

        <div class="miseEnForme" id="miseEnFormeFormulaire">
            <?php
            echo '<label for="champEnfant">Enfant concerné :</label>';
            afficherNomPrenomEnfantSelect($_SESSION['enfant']);
            echo '<span></span>';
            echo '<label for="champEnfant">Membre concerné :</label>';
            afficherNomPrenomMembre();
            echo '<span></span>';
            ?>
            <label for="champRole">Rôle du membre :</label>
            <input type="text" name="champRole" placeholder="Entrer le rôle de cette personne" minlength="1" maxlength="50" required>
            <span></span>
        </div>
        <div class="center" id="boutonsValiderAnnuler">
            <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
            <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
        </div>
    </form>
    <form id="formGestionObjectifs" method="POST" enctype="multipart/form-data">

        <div class="filtres" id="miseEnFormeFiltres">
            <label for="Recherche">Filtres :</label>
            <div class="centerIconeChamp">
                <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
                <?php
                if (isset($_POST['idEnfant'])) {
                    afficherNomPrenomEnfantSubmit($_POST['idEnfant']);
                } else {
                    afficherNomPrenomEnfantSubmit($_SESSION['enfant']);
                }
                ?>
            </div>
            <div class="centerIconeChamp">
                <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
                <select name="filtres" id="filtres" onchange="this.form.submit()">
                    <option value="1">Filtre</option>
                    <option value="2">Filtre</option>
                </select>
            </div>
        </div>
        <table>
            <thead>
                <th>Rôle</th>
                <th>Nom du membre</th>
                <th>Prénom du membre</th>
                <th>Retirer</th>
            </thead>

            <tbody id="tbodyGererEquipe">
                <?php

                if (isset($_POST['idEnfant'])) {
                    afficherGererEquipe($_POST['idEnfant']);
                } else {
                    afficherGererEquipe($_SESSION['enfant']);
                }
                ?>
            </tbody>
        </table>
        <?php
        if ((!isset($_POST['idEnfant']) && $_SESSION['enfant'] == 0) || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
            echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son équipe !</p>";
        }
        ?>
    </form>
</body>

</html>