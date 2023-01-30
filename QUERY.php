<?php

/*
* --------------------------------------------------------------------------------------------------------------------------------
* ---------------------------------------------- LISTE DES REQUETES --------------------------------------------------------------
* -------------------------------------------------- 'ajouter' -------------------------------------------------------------------
* -------------------------------------------------- 'supprimer' -----------------------------------------------------------------
* -------------------------------------------------- 'modifier' ------------------------------------------------------------------
* -------------------------------------------------- 'vérifier' ------------------------------------------------------------------
* -------------------------------------------------- 'récupérer' -----------------------------------------------------------------
* --------------------------------------------------------------------------------------------------------------------------------
*/

//! -------------------------------------------- ENFANT --------------------------------------------------------------------------

// Requête pour AJOUTER un enfant a la BD
$qAjouterUnEnfant = 'INSERT INTO enfant (Nom,Prenom,Date_Naissance,Lien_Jeton) VALUES (:nom , :prenom, :dateNaissance, :lienJeton)';

// Requête pour SUPPRIMER un enfant de la BD selon son Id_Enfant
$qSupprimerUnEnfant = 'DELETE  FROM Enfant where Id_Enfant = :idEnfant';

// Requête pour SUPPRIMER l'image du jeton pour un enfant selon son Id_Enfant
$qSupprimerImageUnEnfant = 'SELECT Lien_Jeton from enfant WHERE Id_Enfant = :idEnfant';

// Requête pour MODIFIER le nom, le prénom, la date de naissance et l'image du jeton d'un enfant selon son Id_Enfant
$qModifierInformationsUnEnfant = 'UPDATE enfant SET Nom = :nom, Prenom = :prenom, Date_Naissance = :dateNaissance, Lien_Jeton = :lienJeton WHERE Id_Enfant = :idEnfant';

// Requête pour VÉRIFIER qu'un enfant avec le nom, le prénom et la date de naissance entrée paramètre n'existe pas déjà dans la BD
$qEnfantIdentique = 'SELECT Nom, Prenom, Date_Naissance FROM enfant WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance';

// Requête pour RÉCUPÉRER l'Id_enfant, l'image du jeton, le nom, le prénom et la date de naissance de tous les enfants de la BD
$qRecupererInformationEnfants = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance From Enfant';

// Requête pour RÉCUPÉRER l'Id_enfant, l'image du jeton, le nom, le prénom et la date de naissance d'un enfant de la BD
$qRecupererInformationUnEnfants = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance From Enfant WHERE Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER l'Id_Enfant, le nom et le prénom de tous les enfants ( trie par nom )
$qRecupererNomPrenomEnfant = 'SELECT Id_Enfant, Nom,Prenom FROM Enfant ORDER BY Nom';

// Requête pour RÉCUPÉRER le nom et le prénom d'un enfant selon son Id_Enfant
$qRecupererNomPrenomUnEnfant = 'SELECT Nom, Prenom FROM enfant WHERE Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER le nom et le prénom de tous les enfants que suit le membre de la session ( trie par nom )
$qRecupererNomPrenomEnfantEquipe = 'SELECT enfant.Id_Enfant, Nom,Prenom FROM Enfant,suivre WHERE enfant.Id_Enfant = suivre.Id_Enfant AND suivre.Id_Membre = :idMembre ORDER BY Nom';

// Requête pour RÉCUPÉRER l'Id_Enfant, le lien jeton, le nom, le prénon et la date de naissance d'un enfant selon un nom donné en paramètre 
$qRechercherEnfantParNom = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance FROM enfant WHERE nom LIKE ? ';

//! -------------------------------------------- MEMBRE --------------------------------------------------------------------------

// Requête pour AJOUTER un membre à la BD
$qAjouterUnMembre = 'INSERT INTO membre (Nom, Prenom, Adresse, Code_Postal, Ville, Courriel, Date_Naissance, Mdp, Role) VALUES (:nom, :prenom, :adresse, :codePostal, :ville, :courriel, :dateNaissance, :mdp, :role)';

// Requête pour SUPPRIMER un membre de la BD
$qSupprimerUnMembre = 'DELETE FROM membre WHERE Id_Membre = :idMembre';

// Requête pour MODIFIER le nom, le prénom, l'adresse, le CP, la ville, la date de naissance d'un membre de la BD
$qModifierInformationsUnMembre = 'UPDATE membre SET Nom = :nom, Prenom = :prenom, Adresse = :adresse, Code_Postal = :codePostal, Ville = :ville, Date_Naissance = :dateNaissance WHERE Id_Membre = :idMembre';

// Requête pour MODIFIER le mdp du membre connecté
$qModifierMotDePasseUnMembre = 'UPDATE membre SET Mdp = :mdp WHERE Id_Membre = :idMembre';

// Requête pour MODIFIER la validité du compte d'un membre de la BD
$qValiderUnMembre = 'UPDATE membre SET Compte_Valide = 1 WHERE Id_Membre = :idMembre';

// Requête pour VÉRIFIER la validité du compte d'un membre selon son courriel dans la BD
$qVerifierValidationUnMembre = 'SELECT Id_Membre FROM Membre WHERE Courriel = :courriel AND Compte_Valide = 1';

// Requête pour VÉRIFIER qu'un membre avec le courrier donné en paramètre n'existe pas déjà dans la BD
$qMembreIdentique = 'SELECT Courriel FROM membre WHERE Courriel = :courriel';

// Requête pour VÉRIFIER qu'un membre ne suit pas déjà un enfant donné en paramètre 
$qMembreIdentiqueEquipe = 'SELECT Id_Membre FROM suivre WHERE Id_Membre = :idMembre AND Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER le nom, le prénom, l'adresse, la date de naissance, le CP, la ville et le mdp d'un membre dans la BD
$qRechercherUnMembre = 'SELECT Nom, Prenom, Adresse, Date_Naissance, Code_Postal, Ville, Mdp FROM membre WHERE Id_Membre = :idMembre';

// Requête pour RÉCUPÉRER le prénom du membre connecté
$qRecupererPrenomMembreConnected = 'SELECT Prenom FROM Membre WHERE Id_Membre = :idMembre';

// Requête pour RÉCUPÉRER le prénom du membre connecté
$qRecupererNomPrenomMembre = 'SELECT Nom, Prenom FROM Membre WHERE Id_Membre = :idMembre';

// Requête pour RÉCUPÉRER l'Id_Membre, Le nom et Le prénom d'un membre ( trie par nom )
$qAfficherNomPrenomMembre = 'SELECT Id_Membre, Nom,Prenom FROM Membre ORDER BY Nom';

// Requête pour RÉCUPÉRER le mdp d'un membre selon son courriel
$qRecupererMotDePasseUnMembre = 'SELECT Mdp FROM membre WHERE Courriel = :courriel';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD
$qRecupererInformationsMembres = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des  membres de la BD ( trie par nom croissant puis prénom croissant )
$qRecupererInformationsMembresAZ = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Nom, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par nom décroissant puis prénom croissant )
$qRecupererInformationsMembresZA = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Nom DESC, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par date de naissance croissante puis nom puis prénom )
$qRecupererInformationsMembresDateNaissanceCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Date_Naissance, Nom, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par date de naissance décroissante puis nom puis prénom )
$qRecupererInformationsMembresDateNaissanceDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Date_Naissance DESC , Nom, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par validation croissant puis nom puis prénom )
$qRecupererInformationsMembresCompteValideCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Compte_Valide, Nom, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par validation décroissant puis nom puis prénom )
$qRecupererInformationsMembresCompteValideDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Compte_Valide DESC, Nom, Prenom';

// Requête pour RÉCUPÉRER l'id, le nom, le prenom, le courriel, la date de naissance et la validité des comptes des membres de la BD ( trie par Id_Membre décroissant )
$qRecupererInformationsMembresIdMembreDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide,Role FROM Membre ORDER BY Id_Membre DESC';

// Requête pour RÉCUPÉRER l'Id_Membre d'un membre selon son courriel
$qRecupererIdUnMembre = 'SELECT Id_Membre FROM membre WHERE courriel = :courriel';

// Requête pour RÉCUPÉRER l'Id_Membre, le nom, le prénom, le courriel, la date de naissance et le compte valide d'un membre selon un nom donné en paramètre 
$qRechercherMembreParNom = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre Where nom LIKE ?';

//! -------------------------------------------- OBJECTIF ------------------------------------------------------------------------

// Requête pour AJOUTER un objectif à la BD
$qAjouterUnObjectif = 'INSERT INTO objectif (Intitule, Nb_Jetons, Duree,Lien_Image,Travaille,Id_Membre,Id_Enfant) VALUES (:intitule, :nbJetons, :duree, :lienObjectif, :travaille, :idMembre, :idEnfant)';

// Requête pour SUPPRIMER le lien image d'un objectif selon son Id_Objectif
$qSupprimerImageUnObjectif = 'SELECT Lien_Image from Objectif WHERE Id_Objectif = :idObjectif';

// Requête pour SUPPRIMER un objectif selon son Id_Objectif
$qSupprimerObjectif = 'DELETE FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour SUPPRIMER tous les jetons placés d'un objectif selon son Id_Objectif
$qSupprimerTousJetonsPlacesUnObjectif = 'UPDATE objectif set Nb_Jetons_Places = 0 WHERE Id_Objectif = :idObjectif';

// Requête pour SUPPRIMER un jeton placés d'un objectif selon son Id_Objectif
$qSupprimerJetonsPlacesUnObjectif = 'UPDATE objectif set Nb_Jetons_Places = Nb_Jetons_Places - 1 WHERE Id_Objectif = :idObjectif';

// Requête pour MODIFIER l'intitule, le nb jetons, la durée, le lien image et le travaille un objectif
$qModifierInformationsUnObjectif = 'UPDATE objectif SET Intitule = :intitule, Nb_Jetons = :nbJetons, Duree = :duree, Lien_Image = :lienImage, Travaille = :travaille, Id_Membre = :idMembre WHERE id_Objectif = :idObjectif';

// Requête pour MODIFIER le nb jetons placés d'un objectif selon son Id_Objectif
$qAjouterJetonsPlaces = 'UPDATE objectif set Nb_Jetons_Places = Nb_Jetons_Places+1 WHERE Id_Objectif = :idObjectif';

// Requête pour MODIFIER un objectif en mettant son nb jetons placés à 0 et son temps début à 0 selon son Id_Objectif
$qReinitialiserUnObjectif = 'UPDATE objectif set Nb_Jetons_Places = 0, Temps_Debut = 0 WHERE Id_Objectif = :idObjectif';

// Requête pour MODIFIER le temps début d'un objectif selon son Id_Objectif
$qAjouterTempsDebutUnObjectif = 'UPDATE objectif SET Temps_Debut = :tempsDebut WHERE Id_Objectif = :idObjectif';

// Requête pour MODIFIER un objectif en passant son son travaille à 2 ( à venir )
$qModifierUnObjectifAVenir = 'UPDATE objectif SET Travaille = 2 WHERE Id_Objectif= :idObjectif';

// Requête pour MODIFIER un objectif en mettant son Id_Membre à null selon son Id_Membre
$qSupprimerIdMembreObjectif = 'UPDATE objectif SET Id_Membre = NULL WHERE Id_Membre = :idMembre';

// Requête pour VÉRIFIER qu'un objectif n'est pas déjà présent dans la BD pour un enfant donné
$qObjectifIdentique = 'SELECT Intitule FROM objectif WHERE Intitule = :intitule AND Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'ititule, la durée, le travaille, le nb jetons placés et le nb jetons des objectifs de la BD selon un Id_Enfant
$qRecupererInformationsObjectifs = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Travaille, Nb_Jetons_Places, Nb_Jetons  FROM objectif WHERE Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER l'Id_Objectif, le nb jetons placés, le nb jetons, le lien image, l'intitule et la durée des objectifs de la BD selon un Id_Enfant et qui sont "en cours"
$qRecupererInformationsObjectifsEnCours = 'SELECT Id_Objectif, Nb_Jetons_Places, Nb_Jetons, Lien_Image, Intitule, Duree FROM objectif WHERE Id_Enfant = :idEnfant AND Travaille = 1';

// Requête pour RÉCUPÉRER le nb jetons placés, le nb jetons d'un objectif en cours selon son Id_Objectif 
$qRecupererJetonsUnObjectif = 'SELECT Nb_Jetons_Places, Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif AND Travaille = 1';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par intitule )
$qRecupererInformationsObjectifsAZ = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par intitule decroissant )
$qRecupererInformationsObjectifsZA = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule DESC';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par duree )
$qRecupererInformationsObjectifsDureeCroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par duree decroissante )
$qRecupererInformationsObjectifsDureeDecroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree DESC';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par statut )
$qRecupererInformationsObjectifsStatutCroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille';

// Requête pour RÉCUPÉRER l'Id_Objectif, le lien image, l'intitule, la duée, le nb jetons et le travaille d'un objectif pour un enfant ( trie par statut decroissant )
$qRecupererInformationsObjectifsStatutDecroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille DESC';

// Requête pour RÉCUPÉRER l'ID_Objectif, l'intitule, le nb jetons placés, le nb jetons, le lien image, la durée et le travaille d'un objectif selon son Id_Objectif
$qRecupererInformationsUnObjectif = 'SELECT Id_Objectif, Intitule, Nb_Jetons_Places, Nb_Jetons, Lien_Image, Duree, Travaille  FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER le lien image d'un objectif selon son Id_Objectif
$qRecupererImageUnObjectif = 'SELECT Lien_Image FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER le nb jetons d'un objectif selon son Id_Objectif
$qRecupererNombreJetonsUnObjectif = 'SELECT Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER le nb jetons placés d'un objectif selon son Id_Objectif
$qRecupererNombreJetonsPlacesUnObjectif = 'SELECT Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER l'Id_Objectif et l'intitule d'un objectif selon son Id_Enfant ( trie par intitule )
$qRecupererIntituleObjectifUnEnfant = 'SELECT Id_Objectif, Intitule FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

// Requête pour RÉCUPÉRER l'intitule d'un objectif selon son Id_Objectif
$qRecupererUnIntituleObjectif = 'SELECT Intitule FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour SUPPRIMER le lien image d'un objectif selon son Id_Objectif
$qSupprimerImageUnObjectif = 'SELECT Lien_Image from Objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER la durée d'un objectif selon son Id_Objectif
$qRecupererDureeUnObjectif = 'SELECT Duree FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER le temps début d'un objectif selon son Id_Objectif
$qRecupererTempsDebutUnObjectif = 'SELECT Temps_Debut FROM objectif WHERE Id_Objectif = :idObjectif';

// Requête pour RÉCUPÉRER l'intitule, le nb jetons, la durée, le lien image et le nb jetons d'un objectif selon son Id_Objectif
$qRecupererUnObjectif = 'SELECT Intitule, Nb_Jetons, Duree, Lien_Image, Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

//! -------------------------------------------- RECOMPENSE ----------------------------------------------------------------------

// Requête pour AJOUTER une récompense à la BD
$qAjouterUneRecompense = 'INSERT INTO recompense (Intitule,Lien_Image,Descriptif) VALUES (:intitule,:lienImage,:descriptif)';

// Requête pour SUPPRIMER une récompense selon son Id_Recompense
$qSupprimerUneRecompense = 'DELETE FROM Recompense WHERE Id_Recompense = :idRecompense';

// Requête pour MODIFIER l'intitule, le lien image et le descriptif d'une récompense selon son Id_Recompense
$qModifierUneRecompense = 'UPDATE recompense SET Intitule = :intitule, Lien_Image = :lienImage, Descriptif = :descriptif WHERE id_Recompense = :idRecompense';

// Requête pour RÉCUPÉRER l'Id_Recompense, l'intitule, le descriptif et le lien image d'une récompense selon son Id_Recompense
$qRecupererUneRecompense = 'SELECT Id_Recompense, Intitule, Descriptif, Lien_Image FROM Recompense WHERE id_Recompense = :idRecompense';

// Requête pour RÉCUPÉRER le lien image d'une recompense selon son Id_Recompense
$qRecupererImageUneRecompense = 'SELECT Lien_Image FROM recompense WHERE Id_Recompense = :idRecompense';

// Requête pour RÉCUPÉRER l'Id_Recompense, le lien image, l'intitule et le descriptif de toutes les récompenses d'un enfant en plus de l'intitule de l'objectif concerné
$qRecupererRecompenseUnEnfant = 'SELECT recompense.Id_Recompense, recompense.Lien_Image, recompense.Intitule, recompense.Descriptif, objectif.Intitule AS objIntitule FROM recompense, lier, enfant, objectif WHERE recompense.Id_Recompense = lier.Id_Recompense AND lier.Id_Objectif = objectif.Id_Objectif AND enfant.Id_Enfant = objectif.Id_Enfant AND enfant.Id_Enfant = :idEnfant';

// Requête pour RÉCUPÉRER l'Id_Recompense d'un objectif selon son Intitule
$qRecupererUnIdRecompenseSelonIntitule = 'SELECT Id_Recompense FROM recompense WHERE Intitule = :intitule';

// Requête pour RÉCUPÉRER le lien image, l'intitule, la description et l'Id_Recompense d'un objectif selon son idObjectif
$qRecupererRecompenseSelonIdObjectif = 'SELECT recompense.Lien_Image, recompense.Intitule, recompense.Descriptif, recompense.Id_Recompense FROM recompense, lier, objectif WHERE objectif.Id_Objectif = lier.Id_Objectif AND lier.Id_Recompense = recompense.Id_Recompense AND lier.ID_Objectif = :idObjectif';

//! -------------------------------------------- TABLEAU DE BORD -----------------------------------------------------------------

// Requête pour RÉCUPÉRER le lien image d'un enfant selon son Id_Enfant
$qRecupererImageJetonUnEnfant = 'SELECT Lien_Jeton from Enfant WHERE Id_Enfant = :idEnfant';

//! -------------------------------------------- EQUIPE --------------------------------------------------------------------------

// Requête pour AJOUTER un lien entre un enfant et un membre à la BD
$qAjouterUneEquipe = 'INSERT INTO suivre (Id_Enfant,Id_Membre,Date_Demande_Equipe,Role) VALUES (:idEnfant,:idMembre,FROM_UNIXTIME(:dateDemandeEquipe),:role)';

// Requête pour SUPPRIMER un membre de l'equipe
$qSupprimerUnMembreEquipe = 'DELETE FROM suivre WHERE suivre.Id_Enfant = :idEnfant AND suivre.Id_Membre =:idMembre';

// Requête pour RÉCUPÉRER le rôle, le nom, le prénom, l'Id_Membre et l'Id_Enfant de l'equipe pour un enfant selon son Id_Enfant
$qRecupererEquipeUnEnfant = 'SELECT suivre.Role, membre.Nom,membre.Prenom,suivre.Id_Membre,suivre.Id_Enfant from membre,suivre,enfant WHERE membre.Id_Membre = suivre.Id_Membre AND suivre.Id_Enfant = enfant.Id_Enfant AND enfant.Id_Enfant = :idEnfant';

//! -------------------------------------------- MESSAGE -------------------------------------------------------------------------

// Requête pour AJOUTER un message dans la BD
$qAjouterUnMessage = 'INSERT INTO message (Sujet,Corps,Date_Heure,Id_Objectif,Id_Membre) VALUES (:sujet,:corps,FROM_UNIXTIME(:dateHeure),:idObjectif,:idMembre)';

// Requête pour VÉRIFIER qu'un message n'est pas déjà présent dans la base selon son sujet, son corps pour un objectif et un membre donnés
$qMessageIdentique = 'SELECT Sujet, Corps, Id_Objectif, Id_Membre FROM message WHERE Sujet = :sujet AND Corps = :Corps AND Id_Objectif = :idObjectif AND Id_Membre = :idMembre';

// Requête pour RÉCUPÉRER l'Id_Membre, le nom, le prénom du membre, l'intitule de l'objectif, le sujet, le corps et la date du message selon un enfant avec son Id_Enfant
$qRecupererMessage = 'SELECT message.Id_Membre, membre.Nom,membre.Prenom, objectif.Intitule,message.Sujet,message.Corps,DATE_FORMAT(message.Date_Heure, "%d %b %H:%i") AS Date_Heure FROM objectif,message,membre,suivre,enfant WHERE  message.Id_Objectif = objectif.Id_Objectif AND message.Id_Membre = membre.Id_Membre AND membre.Id_Membre = suivre.Id_Membre AND suivre.Id_Enfant = enfant.Id_Enfant AND objectif.Id_Enfant = enfant.Id_Enfant AND suivre.Id_Enfant = :idEnfant ORDER BY message.Date_Heure';

// Requête pour RÉCUPÉRER l'Id_Membre, le nom, le prénom du membre, l'intitule de l'objectif, le sujet, le corps et la date du message selon un enfant avec son Id_Enfant et un objectif avec son Id_Objectif
$qAfficherMessageParObjectif = 'SELECT message.Id_Membre,membre.Nom,membre.Prenom, objectif.Intitule,message.Sujet,message.Corps,DATE_FORMAT(message.Date_Heure, "%d %b %H:%i")AS Date_Heure FROM objectif,message,membre,suivre,enfant WHERE  message.Id_Objectif = objectif.Id_Objectif AND message.Id_Membre = membre.Id_Membre AND membre.Id_Membre = suivre.Id_Membre AND suivre.Id_Enfant = enfant.Id_Enfant AND objectif.Id_Enfant = enfant.Id_Enfant AND suivre.Id_Enfant = :idEnfant AND objectif.Id_Objectif = :idObjectif ORDER BY message.Date_Heure';

// Requête pour RÉCUPÉRER l'Id_Membre d'un message
$qRechercherIdMembreMessage = 'SELECT Id_Membre From message';

//! -------------------------------------------- PLACER JETON --------------------------------------------------------------------

// Requête pour AJOUTER un jeton horodaté dans placer_jeton dans la BD
$qAjouterJeton = 'INSERT INTO placer_jeton (Id_Objectif, Date_Heure, Id_Membre, Temps_Debut) VALUES (:idObjectif, :dateHeure, :idMembre, :tempsDebut)';

// Requête pour SUPPRIMER tout placer_jeton selon un Id_Objectif
$qSupprimerTousLesJetons = 'DELETE FROM placer_jeton WHERE Id_Objectif = :idObjectif';

// Requête pour SUPPRIMER le dernier jeton placé d'un objectif selon sa Date_Heure
$qSupprimerDernierJetonUnObjectif = 'DELETE FROM placer_jeton WHERE Id_Objectif = :idObjectif AND Date_Heure = (SELECT max(Date_Heure) FROM placer_jeton)';

//! -------------------------------------------- LIER ----------------------------------------------------------------------------

// Requête pour AJOUTER le lien entre un objectif et un récompense à la BD
$qAjouterLienUneRecompenseUnObjectif = 'INSERT INTO lier (lier.Id_Objectif,lier.Id_Recompense) VALUES (:idObjectif,:idRecompense)';

//! -------------------------------------------- STATISTIQUES --------------------------------------------------------------------

// Requête pour RÉCUPÉRER le nb jetons placés selon un Id_Objectif et regroupé par Temps_Debut
$qRecupererNbJetonsPlacesUnObjectif = 'SELECT COUNT(Temps_Debut) FROM placer_jeton WHERE Id_Objectif = :idObjectif GROUP BY Temps_Debut';

// Requête pour RÉCUPÉRER la date la plus ancienne d'un placer_jeton selon un Id_Objectif
$qRecupererPremierJetonJamaisPose = 'SELECT MIN(Date_Heure) FROM placer_jeton WHERE Id_Objectif = :idObjectif';

/*
* --------------------------------------------------------------------------------------------------------------------------------
* ---------------------------------------------- LISTE DES FONCTIONS -------------------------------------------------------------
* --------------------------------------------------------------------------------------------------------------------------------
*/

//! -------------------------------------------- GENERALES -----------------------------------------------------------------------

/**
 * connexionBd
 * Fonction qui permet de se connecter à la BD
 * @return PDO
 */
function connexionBd(): PDO
{
    // informations de connection
    $SERVER = '127.0.0.1';
    $DB = 'projet_sae';
    $LOGIN = 'root';
    $MDP = '';
    // tentative de connexion à la BD
    try {
        // connexion à la BD
        $linkpdo = new PDO("mysql:host=$SERVER;dbname=$DB", $LOGIN, $MDP);
    } catch (Exception $e) {
        die('Erreur ! Problème de connexion à la base de données : ' . $e->getMessage());
    }
    // retourne la connection
    return $linkpdo;
}

/**
 * champRempli
 * Fonction qui vérifie que les champs dont le nom est donné en paramètre sont bien remplis
 * @param  array $field
 * @return bool
 */
function champRempli(array $field): bool
{
    // parcoure la liste des champs
    foreach ($field as $name) {
        if (empty($_POST[$name])) {
            // au moins un champs vides
            return false;
        }
    }
    // si tout les champs remplis
    return true;
}

/**
 * clean
 * Fonction qui permet de sécurisé ( en nettoyant ) les données reçus en paramètre
 * @param  mixed $champEntrant
 * @return mixed
 */
function clean(mixed $champEntrant): mixed
{
    // permet d'enlever les balises html, xml, php
    $champEntrant = strip_tags($champEntrant);
    // permet d'enlève les tags HTML et PHP
    $champEntrant = htmlspecialchars($champEntrant);
    return $champEntrant;
}

/**
 * saltHash
 * Fonction de hashage pour les mdp de la bd
 * @param  string $mdp
 * @return string
 */
function saltHash(string $mdp): string
{
    // ajout du sel au mdp
    $code = $mdp . 'BrIc3 4rNaUlT 3sT &$ Le MeIlLeUr d3s / pRoFesSeUrs DU.Mond3 !';
    // hashage du mdp 
    return password_hash($code, PASSWORD_DEFAULT);
}


/**
 * uploadImage
 * Fonction qui upload les images dans le dossier upload
 * @param  array $photo
 * @return string
 */
function uploadImage(array $photo): string
{

    if (isset($photo)) {
        $tmpName = $photo['tmp_name'];
        $name = $photo['name'];
        $size = $photo['size'];
        $error = $photo['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp', 'bmp'];
        $maxSize = 4000000;

        // verification bonne extension fichier + taille correct
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $uniqueName = uniqid('', true);
            // $file = 5f586bf96dcd38.73540086.jpg
            $file = $uniqueName . "." . $extension;
            $chemin = "upload/";
            move_uploaded_file($tmpName, 'upload/' . $file);
            $result = $chemin . $file;
        }
    } else {
        echo '<h1>erreur</h1>';
    }
    if (!isset($result)) {
        return null;
    }
    return $result;
}

/**
 * faireMenu
 * Fonction qui affiche le menu dans toutes les pages
 * @return void
 */
function faireMenu(): void
{
    faireChargement();

    $get_url = $_SERVER['REQUEST_URI'];
    $idAChercher = "";
    if (stripos($get_url, "tableau")) {
        $idAChercher = "tableauDeBord";
    } else if (stripos($get_url, "enfant")) {
        $idAChercher = "Enfants";
    } else if (stripos($get_url, "membre")) {
        $idAChercher = "Membres";
    } else if (stripos($get_url, "objectif")) {
        $idAChercher = "Objectifs";
    } else if (stripos($get_url, "recompense")) {
        $idAChercher = "Recompenses";
    } else if (stripos($get_url, "equipe")) {
        $idAChercher = "Equipe";
    }
    echo ' <nav class="navbar">
    <div class="fondMobile"></div>
    <a href="tableauDeBord.php"><img src="images/logo.png" alt="logo" class="logo"></a>
    
    <div class="nav-links">
      <ul class="nav-ul">';
    if ($_SESSION['role'] != 2) {
        echo
        '
            <li><a href="tableauDeBord.php" id="tableauDeBord">Tableau de bord</a></li>
    
            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
        echo '     
            <li><a href="membre.php" id="Membres">Membres</a></li>

            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
        echo
        '     
            <li><a href="enfant.php" id="Enfants">Enfants</a></li>        
            
            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] != 0) {
        echo '
            <li><a href="equipe.php" id="Equipe">Équipe</a></li>    
            
            <div class="separateur"></div>
    ';
    }
    echo '        
            <li><a href="objectif.php" id="Objectifs">Objectifs</a></li>

            <div class="separateur"></div>

            <li><a href="recompense.php" id="Recompenses">Récompenses</a></li>
            
            <div class="separateur"></div>

            <li>
                <div id="centerDeconnexion">
                    <a href="modifierProfil.php" class="centerProfil"><p class="txtBoutonDeconnexion">' . $_SESSION['prenomMembre'] . '</p><img src="images/profil.png" alt="profil" class="imageIcone"></a>
                    <a href="deconnexion.php" class="lienBoutonDeconnexion"><button name="boutonDeco" class="boutons" id="boutonDeconnexion"><img src="images/logout.png" id="imgDeconnexion" class="imageIcone" alt="icone déconnexion"><span class="txtBoutonDeconnexion">Déconnexion</span></button></a>
                </div>
            </li>
          </ul>
        </div>
        
        <img src="images/menu.png" onclick="menuMobile(\'nav-links\')" alt="barre de menu" class="menu-hamburger">
        
    </nav>';

    echo '
    <script>
        var elementActif = document.querySelector("#' . $idAChercher . '");
        elementActif.classList.add("active");
    </script>';

    //LES CLASSES POUR LES SOUS MENUS FONCTIONNENT, ON FAIT COMME CA
    // <li><a href="#" id="Objectifs">Objectifs</a>
    //     <ul class="sousMenu">
    //         <li><a href="ajouterObjectif.php">Ajouter un objectif</a></li>
    //         <li><a href="gererObjectifs.php">Gérer les objectifs</a></li>
    //         <li><a href="objectif.php">Objectifs</a></li>
    //     </ul>
    // </li>
}

/**
 * faireChargement
 * Fonction qui affiche la page de chargement du site
 * @return void
 */
function faireChargement(): void
{
    echo '
    <!-- LOADER -->
    <div class="loading-wrapper">
      <div class="loader">
        <img src="images/logo.png" alt="logo chargement" id="logoChargement">
      </div>

      <span class="spinner-large"></span>
      <p id="loaderS">Chargement...</p>
    </div>
    ';
}

/**
 * dureeString
 * fonction pour calculer la durée totale d'un objectif
 * @param  int $duree
 * @return string
 */
function dureeString(int $duree): string
{
    $s = intdiv($duree, 168);
    $duree -= 168 * $s;
    $j = intdiv($duree, 24);
    $duree -= 24 * $j;
    $h = intdiv($duree, 1);
    if ($s != 0) {
        if ($s == 1) {
            $s = $s . ' semaine ';
        } else {
            $s = $s . ' semaines ';
        }
    } else {
        $s = null;
    }
    if ($j != 0) {
        if ($j == 1) {
            $j = $j . ' jour ';
        } else {
            $j = $j . ' jours ';
        }
    } else {
        $j = null;
    }
    if ($h != 0) {
        if ($h == 1) {
            $h = $h . ' heure ';
        } else {
            $h = $h . ' heures ';
        }
    } else {
        $h = null;
    }
    return  $s . $j . $h;
}

function dureeStringMinutes($duree)
{
    $w = intdiv($duree, 10080);
    $duree -= 10080 * $w;
    $j = intdiv($duree, 1440);
    $duree -= 1440 * $j;
    $h = intdiv($duree, 60);
    $duree -= 60 * $h;
    $m = intdiv($duree, 1);

    // semaines
    if ($w != 0) {
        if ($w == 1) {
            $w = $w . ' semaine ';
        } else {
            $w = $w . ' semaines ';
        }
        // jours
        if ($j != 0) {
            if ($j == 1) {
                $j = $j . ' jour ';
            } else {
                $j = $j . ' jours ';
            }
        } else {
            $j = null;
        }
        // heures
        if ($h != 0) {
            if ($h == 1) {
                $h = $h . ' heure ';
            } else {
                $h = $h . ' heures ';
            }
        } else {
            $h = null;
        }
        $m = null;
    } else {
        $w = null;
        // jours
        if ($j != 0) {
            if ($j == 1) {
                $j = $j . ' jour ';
            } else {
                $j = $j . ' jours ';
            }
        } else {
            $j = null;
        }
        // heures
        if ($h != 0) {
            if ($h == 1) {
                $h = $h . ' heure ';
            } else {
                $h = $h . ' heures ';
            }
        } else {
            $h = null;
        }
        // minutes 
        if ($m != 0) {
            if ($m == 1) {
                $m = $m . ' minute ';
            } else {
                $m = $m . ' minutes ';
            }
        } else {
            $m = null;
        }
    }



    return  $w . $j . $h . $m;
}
// Fonction qui verifie l'id de connexion et redirige sur la bonne page
function testConnexion()
{
    if ($_SESSION['idConnexion'] == null) {
        header('Location: index.php');
    }

    $get_url = $_SERVER['REQUEST_URI'];
    if (stripos($get_url, "tableau") && $_SESSION['role'] == 2) {
        header('Location: modifierProfil.php');
    } else if (stripos($get_url, "enfant") && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)) {
        header('Location: tableauDeBord.php');
    } else if (stripos($get_url, "membre") && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)) {
        header('Location: tableauDeBord.php');
    } else if (stripos($get_url, "equipe") && $_SESSION['role'] == 0) {
        header('Location: tableauDeBord.php');
    }
}
function rechercherEnfant($champ)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherEnfantParNom']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour rechercher les informations de enfant');
    }
    // execution de la Requête sql
    $req->execute(array("%" . $champ . "%"));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les informations des membres');
    }
    if ($req->rowCount() == 0) {
        return 0;
    } else {
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Nom' || $key == 'Prenom') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Date_Naissance') {
                    echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
                }
                if ($key == 'Lien_Jeton') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 100%; margin: 10px;"></td>';
                }
                // recuperation valeurs importantes dans des variables
                if ($key == 'Id_Enfant') {
                    $idEnfant = $value;
                }
            }
            // creation du bouton supprimer dans le tableau
            echo '
            <td>
                <button type="submit" name="boutonModifier" value="' . $idEnfant . '" 
                class="boutonModifier" formaction="modifierEnfant.php">
                    <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                    <span>Modifier</span>
                </button>
             </td>
                 <td>
                     <button type="submit" name="boutonSupprimer" value="' . $idEnfant . '
                     " class="boutonSupprimer" formaction="enfant.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet enfant ?\');" >
                         <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                         <span>Supprimer</span>
                     </button>
                 </td>
             </tr>';
        }
        return 1;
    }
    // permet de parcourir toutes les lignes de la Requête

}
function rechercheMembre($champ)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherMembreParNom']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour rechercher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array("%" . $champ . "%"));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les informations des membres');
    }
    if ($req->rowCount() == 0) {
        return 0;
    } else {
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Date_Naissance') {
                    echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
                }
                // recuperation valeurs importantes dans des variables
                if ($key == 'Id_Membre') {
                    $idMembre = $value;
                }
                if ($key == 'Compte_Valide') {
                    $compteValide = $value;
                }
            }
            // permet de dire si un membre a son compte valide ou non 
            if ($compteValide == Null) {
                echo '
                <td>
                    <button type="submit" name="boutonValider" value=' . $idMembre . '
                    class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                        <img src="images/valider.png" class="imageIcone" alt="icone valider">
                        <span>Valider</span>
                    </button>
                </td>';  // compte doit etre validé
            } else {
                echo '
                <td>
                    <p style="color: green">Compte valide !</p>
                </td>'; // compte valide donc bouton innactif
            }
            // creation du bouton supprimer dans le tableau
            echo '
                <td>
                    <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
                    " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                        <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                        <span>Supprimer</span>
                    </button>
                </td>
            </tr>';
        }
    }
    return 1;
}

//! -------------------------------------------- ENFANT --------------------------------------------------------------------------

// fonction qui permet d'ajouter un enfant a la BD
function ajouterEnfant($nom, $prenom, $dateNaissance, $lienJeton)
{

    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un enfant a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance),
        ':lienJeton' => clean($lienJeton)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}

// fonction qui retourne les lignes si un enfant a le meme nom, prenom, date naissance qu'un enfant de la BD
function enfantIdentique($nom, $prenom, $dateNaissance)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qEnfantIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour verifier si un enfant existe deja');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour verifier si un enfant existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html) et envoie le form direct
function afficherNomPrenomEnfantSelect($enfantSelect)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher le Nom et le Prenom des enfants');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher le Nom et le Prenom des enfants');
    }
    echo '<select name="idEnfant" required>';
    echo '<option value="">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html)
function afficherNomPrenomEnfantSubmit($enfantSelect)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idEnfant" onchange="this.form.submit()">';
    echo '<option value="0">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}
// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html) et envoie le form direct
function afficherNomPrenomEnfantEquipe($enfantSelect, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfantEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idEnfant" required>';
    echo '<option value="">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html)
function afficherNomPrenomEnfantSubmitEquipe($enfantSelect, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfantEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idEnfant" onchange="this.form.submit()">';
    echo '<option value="0">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}
function supprimerImageEnfant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerImageUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            // selectionne toutes les colonnes $key necessaires
            return $value;
        }
    }
}
function modifierInformationsEnfant($nom, $prenom, $dateNaissance, $lienJeton, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un enfant a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance),
        ':lienJeton' => clean($lienJeton),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}
function afficherImageTampon($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererImageJetonUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une image');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une image');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}
function afficherInformationsEnfant()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationEnfants']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            if ($key == 'Lien_Jeton') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
        }
        // creation du bouton supprimer dans le tableau
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idEnfant . '" 
            class="boutonModifier" formaction="modifierEnfant.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
         </td>
             <td>
                 <button type="submit" name="boutonSupprimer" value="' . $idEnfant . '
                 " class="boutonSupprimer" formaction="enfant.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet enfant ?\');" >
                     <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                     <span>Supprimer</span>
                 </button>
             </td>
         </tr>';
    }
}
function supprimerEnfant($idEnfant)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qSupprimerUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer un enfant de la BD');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un enfant de la BD');
    }
}

function nomPrenomEnfant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => $idEnfant));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
            }
        }
    }
    return ' - ' . $nom . ' ' . $prenom;
}

function afficherInformationsEnfantModification($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationUnEnfants']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une image');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une image');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Nom') {
                echo '<label for="champNom">Nom :</label>
                <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            }
            if ($key == 'Prenom') {
                echo '<label for="champPrénom">Prénom :</label>
                <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            }
            if ($key == 'Date_Naissance') {
                echo '<label for="champDateDeNaissance">Date de naissance :</label>
                <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" min="1900-01-01" max="<?php echo date(\'Y-m-d\'); ?>" value="' . $value . '" required>
                <span></span>';
            }
        }
    }
}


//! -------------------------------------------- MEMBRE --------------------------------------------------------------------------

// fonction qui permet d'ajouter un membre a la BD
function ajouterMembre($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $dateNaissance, $mdp, $role)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un membre a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':adresse' => clean($adresse),
        ':codePostal' => clean($codePostal),
        ':ville' => clean($ville),
        ':courriel' => clean($courriel),
        ':dateNaissance' => clean($dateNaissance),
        ':mdp' => clean($mdp),
        ':role' => clean($role)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un membre a la BD');
    }
}

// fonction qui retourne les lignes si un membre a le meme nom, prenom, date naissance et courriel qu'un membre de la BD
function membreIdentique($courriel)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qMembreIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour verifier si un membre existe deja');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':courriel' => clean($courriel)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour verifier si un membre existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

function membreIdentiqueEquipe($idMembre, $idEnfant)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qMembreIdentiqueEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour verifier si un membre existe deja');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idMembre' => clean($idMembre),
        'idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour verifier si un membre existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre
function AfficherMembres()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresIdMembreDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
            <td>
                <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
                " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                    <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                    <span>Supprimer</span>
                </button>
            </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
                <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
                class="boutonConsulter" formaction="consultationInformationsMembre.php">
                <img src="images/oeil2.png" class="imageIcone" alt="icone consulter">
                <span>Consulter</span>
                </button>
            </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Nom croissant puis prenom croissant
function AfficherMembresAZ()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresAZ']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Nom décroissant puis prenom croissant
function AfficherMembresZA()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresZA']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par date de naissance croissante puis nom puis prenom
function AfficherMembresDateNaissanceCroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresDateNaissanceCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par date de naissance decroissante puis nom puis prenom
function AfficherMembresDateNaissanceDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresDateNaissanceDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par validation croissante puis nom puis prenom
function AfficherMembresCompteValideCroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresCompteValideCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par validation decroissante puis nom puis prenom
function AfficherMembresCompteValideDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresCompteValideDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Id_Membre decroissante
function AfficherMembresIdMembreDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembres']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
            if ($key == 'Role') {
                if ($value == '0') {
                    $role = 'Membre';
                } elseif ($value == '1') {
                    $role = 'Coordinateur';
                } elseif ($value == '2') {
                    $role = 'Gestionnaire';
                } elseif ($value == '3') {
                    $role = 'Administrateur';
                }
                echo '<td>' . $role . '</td>';
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '
            <td>
                <button type="submit" name="boutonValiderMembre" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
        }
        // creation du bouton supprimer dans le tableau
        echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
        </td>';
        if ($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3) {
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idMembre . '" 
         class="boutonModifier" formaction="consultationInformationsMembre.php">
            <img src="images/edit.png" class="imageIcone" alt="icone modifier">
            <span>Consulter</span>
        </button>
        </td>';
        }
        echo ' </tr>';
    }
}

// fonction qui permet de valider un membre a partir de son id
function validerMembre($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qValiderUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour valider le compte membre');
    }
    // execution de la Requête sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour valider le compte membre');
    }
}

// fonction qui permet de vérifier si un membre est validé ou non avant de se connecter
function verifierValidationMembre($courriel)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qVerifierValidationUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour vérifier la validité du membre');
    }
    // execution de la Requête sql
    $req->execute(array(':courriel' => clean($courriel)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour vérifier la validité du membre');
    }
    if ($req->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// ---------------------------------------------------------------------------------------------------A finir
// fonction qui permet d'afficher le prenom d'un membre (barre menu)
function afficherPrenomMembre($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererPrenomMembreConnected']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour vérifier la validité du membre');
    }
    // execution de la Requête sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour vérifier la validité du membre');
    }
    return $req;
}

// fonction qui permet d'afficher le prenom d'un membre (barre menu)
function afficherNomPrenomMembreMessage($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour vérifier la validité du membre');
    }
    // execution de la Requête sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour vérifier la validité du membre');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
            }
            return $nom . '.' . $prenom;
        }
    }
}

// fonction qui permet de rechercher un membre à partir de son idMembre
function rechercherMembre($idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour rechercher un membre dans la BD');
    }
    // execution de la Requête sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour rechercher un membre dans la BD');
    }
    return $req; // retourne le membre correspondant a $idMembre
}

// ---------------------------------------------------------------------------------------------------A revoir commentaire
// fonction qui permet d'afficher les informations du membre de la session
function AfficherInformationsMembreSession($idMembre)
{
    // recherche les informations d'un membre selon son idMembre
    $req = rechercherMembre($idMembre); // retoune le membre avec ses informations selon $idMembre
    // permet de parcourir la ligne de la Requêtes 
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                echo '<label for="champNom">Nom :</label>
                <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" value="' . $value . '" onblur="this.blur()" required>
                <span></span>';
            } elseif ($key == 'Prenom') {
                echo '<label for="champPrénom">Prénom :</label>
                <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            } elseif ($key == 'Adresse') {
                echo '<label for="champAdresse">Adresse :</label>
                <input type="text" name="champAdresse" placeholder="Entrez votre adresse" maxlength="50" value="' . $value . '"  required>
                <span></span>';
            } elseif ($key == 'Date_Naissance') {
                echo '<label for="champDateDeNaissance">Date de naissance :</label>
                <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" min="1900-01-01" max="<?php echo date(\'Y-m-d\'); ?>" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Code_Postal') {
                echo '
                <label for="champCp">Code postal :</label>
                <input type="text" name="champCp" placeholder="Entrez votre code postal" value=' . $value . ' oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" maxlength="5" required>
                <span></span>';
            } elseif ($key == 'Ville') {
                echo '<label for="champVille">Ville :</label>
                <input type="text" name="champVille" placeholder="Entrez votre ville" maxlength="50" value="' . $value . '"  required>
                <span></span>';
            } elseif ($key == 'Mdp') {
                //probleme ici si null il faut aussi 0
                echo '<label for="champMdp">Mot de passe :</label>
                <input type="text" name="champMdp" class="champMdpNonModifiable" value="********" readonly>
                <span></span>
                <a href="modifierMdp.php" class="texteAccueil"> Changer votre mot de passe ?</a>';
                echo '<span></span><p id="messageVerifMdp" style="color: red;"></p><span></span>';
            }
        }
    }
}
function AfficherInformationsMembre($idMembre)
{

    $req = rechercherMembre($idMembre); // retoune le membre avec ses informations selon $idMembre
    // permet de parcourir la ligne de la Requêtes 
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                echo '<label for="champNom">Nom :</label>
                <input type="text" name="champNom" value="' . $value . '" class="champMdpNonModifiable" readonly>
                <span></span>';
            } elseif ($key == 'Prenom') {
                echo '<label for="champPrénom">Prénom :</label>
                <input type="text" name="champPrénom" value="' . $value . '" class="champMdpNonModifiable" readonly>
                <span></span>';
            } elseif ($key == 'Adresse') {
                echo '<label for="champAdresse">Adresse :</label>
                <input type="text" name="champAdresse" value="' . $value . '" class="champMdpNonModifiable" readonly>
                <span></span>';
            } elseif ($key == 'Date_Naissance') {
                echo '<label for="champDateDeNaissance">Date de naissance :</label>
                <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" value="' . $value . '" class="champMdpNonModifiable" readonly>
                <span></span>';
            } elseif ($key == 'Code_Postal') {
                echo '
                <label for="champCp">Code postal :</label>
                <input type="text" name="champCp" value=' . $value . ' class="champMdpNonModifiable" readonly>
                <span></span>';
            } elseif ($key == 'Ville') {
                echo '<label for="champVille">Ville :</label>
                <input type="text" name="champVille" value="' . $value . '" class="champMdpNonModifiable" readonly>
                <span></span>';
            }
        }
    }
}
// fonction qui permet de modifier les informations du membre de la session
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $dateNaissance)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations du membre de la 
            session');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':adresse' => clean($adresse),
        ':codePostal' => clean($codePostal),
        ':ville' => clean($ville),
        ':idMembre' => clean($idMembre),
        ':dateNaissance' => clean($dateNaissance)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour permet de modifier les informations du membre de la 
            session');
    }
}

function supprimerIdMembreDansObjectif($idMembre)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    //on supprime les liens avec Objectif
    $req = $linkpdo->prepare($GLOBALS['qSupprimerIdMembreObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer tous les idObj de la BD');
    }

    $req->execute(array(':idMembre' => clean($idMembre)));
    // $req->debugDumpParams();
}

// fonction qui permet de supprimer un membre a partir de son idMembre
function supprimerMembre($idMembre)
{
    supprimerIdMembreDansObjectif($idMembre);
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qSupprimerUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer un membre de la BD');
    }
    // execution de la Requête sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un membre de la BD');
    }
}

function modifierMdp($mdp, $idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qModifierMotDePasseUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer un membre de la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':mdp' => saltHash($mdp),
        ':idMembre' => $idMembre
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un membre de la BD');
    }
}

function recupererMdp($courriel)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qRecupererMotDePasseUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer un membre de la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':courriel' => $courriel
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un membre de la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            return $value;
        }
    }
}

//! -------------------------------------------- OBJECTIF ------------------------------------------------------------------------

// fontion qui permet d'ajouter un objectif a la BD
function ajouterObjectif($intitule, $nbJetons, $duree, $lienObjectif, $travaille, $idMembre, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':nbJetons' => clean($nbJetons),
        ':duree' => clean($duree),
        ':lienObjectif' => clean($lienObjectif),
        ':travaille' => clean($travaille),
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant)
    ));

    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
}

// fonction qui retourne les lignes si un membre a le meme nom, prenom, date naissance et courriel qu'un membre de la BD
function objectifIdentique($intitule, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qObjectifIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour verifier si un membre existe deja');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour verifier si un membre existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherGererObjectifs($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifs']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}



// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifs($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsEnCours']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    $res = 0;
    if ($req->rowCount() < 1) {
        if ($_SESSION['enfant'] != null) {
            echo "<p class='msgSelection'>Cet enfant ne possède pas d'objectifs en cours !</p>";
        }
    } else {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="objectif">';

            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }

                if ($key == 'Intitule') {
                    echo '<h3 class="titreObjectif">' . $value . '</h3>';
                }
                if ($key == 'Duree') {

                    // Temps restant de la séance
                    if ((recupererTempsDebutObjectif($idObjectif) != 0) && (recupererTempsDebutObjectif($idObjectif) - time() > 0)) {
                        $maintenant = time();
                        $restant = recupererTempsDebutObjectif($idObjectif) - $maintenant;
                        $heureRestante = $restant / 60;
                        $duree = dureeStringMinutes($heureRestante);
                        echo '<div class="dureeObjectifs"><div class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p>' . $duree . '</p></div><span></span></div><br>';
                    } else {
                        echo '<div class="dureeObjectifs"><div class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p>' . dureeString($value) . '</p></div><span></span></div><br>';
                    }

                    if ($res == 1) {
                        echo '<p class="jetonsRestant"">' . $res . ' jeton à valider:</p>';
                    } else if ($res == 0) {
                        echo '<br>';
                    } else {
                        echo '<p class="jetonsRestant">' . $res . ' jetons à valider:</p>';
                    }
                }

                if ($key == 'Nb_Jetons_Places') {
                    if (is_null($value) || $value == 0) {
                        $places = 0;
                    } else {
                        $places = $value;
                    }
                }

                if ($key == 'Nb_Jetons') {
                    $res = $value - $places;
                    if ($res != 0) {
                        echo '<button class="redirect" type="submit" formaction="consulterObjectif.php" name="redirect" value="' . $idObjectif . '">
                    <img class="imgRedirect" src="images/redirect.png"></button>';
                        $filtre = " ";
                    } else {
                        echo '<button class="redirect" type="submit" formaction="consulterObjectif.php" name="redirect" value="' . $idObjectif . '">
                    <img class="imgRedirect" src="images/redirect.png"></button>';
                        echo '<p class="msgObjectifValidé" >Objectif validé</p>';
                        $filtre = "filter: grayscale(100%);";
                    }
                }

                if ($key == 'Lien_Image') {
                    if ($res == 0) {
                        echo '<div><span class="tick"></span><img class="imageObjectif" style="border-radius: 10px;' . $filtre . '" src="' . $value . '" id="imageJeton" alt="' . $res . ' "></div>';
                    } else {
                        echo '<div><img class="imageObjectif" style="border-radius: 10px;' . $filtre . '" src="' . $value . '" id="imageJeton" alt="' . $res . ' "></div>';
                    }
                    $places = 0;
                }
            }
            echo '<div class="containerTampons">';
            if (recupererPremierJetonJamaisPose($idObjectif) == null || recupererPremierJetonJamaisPose($idObjectif) + 180  >= time()) {
                if (recupererTempsDebutObjectif($idObjectif) >= time()) {
                    for ($i = 1; $i <= NombreDeJetons($idObjectif); $i++) {
                        if ($i <= NombreDeJetonsPlaces($idObjectif)) {
                            echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '" onclick="return confirm(\'Êtes vous sûr de vouloir retirer un jeton ?\');">';
                            //DEGUEU MAIS NE PAS TOUCHER SINON CA MARCHE PAS
                            if ($res == 0) {
                                echo '<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                            } else {
                                echo '<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                            }
                        } else {
                            echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '">?</button>';
                        }
                    }
                } else {

                    echo '<button type="submit" value="' . $idObjectif . '" name="butonDebutSeanceTb" class="boutonValider boutonSeance"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Démarrer la séance</span></button>';
                }
            } else {
                echo '<p class="msgSelection2">4 semaines écoulées !</p><p class="msgSelection2" style="margin-top: 30px;">Consultez l\'objectif.</p>';
            }
            echo '</div></div>';
        }
    }
}

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifsZoom($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="objectif zoom">';
        echo '<img src="images/banderole.png" id="banderole"><h2 id="titreObjectif">' . afficherUnIntituleObjectif($_SESSION['objectif']) . "  " . nomPrenomEnfant($_SESSION['enfant']) . '</h2>';
        echo '<button type="submit" name="butonResetSceance" class="boutonAnnuler boutonResetSeance" onclick="return confirm(\'Êtes vous sûr de vouloir réinitialiser cette séance ?\');"><img src="images/reinitialiser.png" class="imageIcone zoom" alt="icone valider"><span>Réinitialiser la séance</span></button>';
        // permet de parcourir toutes les colonnes de la Requête
        $res = 0;
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Nb_Jetons_Places') {
                if (is_null($value)) {
                    $places = 0;
                } else {
                    $places = $value;
                }
            }
            if ($key == 'Nb_Jetons') {
                $res = $value - $places;
                $places = 0;
            }
            if ($key == 'Lien_Image') {
                if ($res == 0) {
                    echo '<span class="tick2"></span><img class="imageObjectif zoom" style="border-radius: 10px; z-index: 2; margin-top: 20px;" src="' . $value . '" alt="image objectif">';
                } else {
                    echo '<img class="imageObjectif zoom" style="border-radius: 10px; z-index: 2; margin-top: 20px;" src="' . $value . '" alt="image objectif">';
                }
            }
            if ($key == 'Duree') {
                // Temps restant de la séance
                if ((recupererTempsDebutObjectif($_SESSION['objectif']) != 0) && (recupererTempsDebutObjectif($_SESSION['objectif']) - time() > 0)) {
                    $maintenant = time();
                    $restant = recupererTempsDebutObjectif($_SESSION['objectif']) - $maintenant;
                    $heureRestante = $restant / 60;
                    $duree = dureeStringMinutes($heureRestante);
                    echo '<div class="dureeObjectifs zoom"><p style="display:inline;">Temps restant : </p><div style="display:inline;" class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p style="display:inline; margin-left: 15px;">' . $duree . '</p></div><span></span></div><br>';
                } else {
                    echo '<div class="dureeObjectifs zoom"><p style="display:inline;">Temps de l\'objectif : </p><div style="display:inline;" class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p style="display:inline; margin-left: 15px;">' . dureeString($value) . '</p></div><span></span></div><br>';
                }
                if ($res != 0) {
                    if ($res == 1) {
                        echo '<p class="jetonsRestant">' . $res . ' jeton à valider : </p>';
                    } else {
                        echo '<p class="jetonsRestant">' . $res . ' jetons à valider : </p>';
                    }
                }
            }
        }
        echo '<div class="containerTampons zoom">';
        if (recupererTempsDebutObjectif($idObjectif) >= time()) {
            for ($i = 1; $i <= NombreDeJetons($idObjectif); $i++) {
                if ($i <= NombreDeJetonsPlaces($idObjectif)) {
                    echo '<button class="tampon zoom" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '" onclick="return confirm(\'Êtes vous sûr de vouloir retirer un jeton ?\');">';
                    if ($res == 0) {
                        echo '<img class="imageTamponValide zoom" src="' . afficherImageTampon($_SESSION['enfant']) . '"></button>';
                    } else {
                        echo '<img class="imageTamponValide zoom" src="' . afficherImageTampon($_SESSION['enfant']) . '"></button>';
                    }
                } else {
                    echo '<button class="tampon zoom" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '">?</button>';
                }
            }
        } else {
            echo '<button type="submit" name="butonDebutSeance" class="boutonValider boutonSeance"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Démarrer la séance</span></button>';
        }
        echo '</div></div>';
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function NombreDeJetons($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNombreJetonsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $value) {
            return $value;
        }
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function NombreDeJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNombreJetonsPlacesUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $value) {
            return $value;
        }
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function AjouterJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterJetonsPlaces']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
}
function SupprimerJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerJetonsPlacesUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
    supprimerDernierJeton($idObjectif);
}
function supprimerTousJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerTousJetonsPlacesUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
    supprimerDernierJeton($idObjectif);
}

// fonction qui permet d'afficher les informations de l'objectif selon son Id_Objectif
function AfficherInformationUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un membre a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour ajouter un membre a la BD');
    }
    // permet de parcourir la ligne de la Requêtes 
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Intitule') {
                echo '
                <label for="champIntitule">Intitulé :</label>
                <input type="text" name="champIntitule" placeholder="Entrez l\'intitulé de l\'objectif" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Duree') {
                $duree = $value;
                $s = intdiv($duree, 168);
                $duree -= 168 * $s;
                $j = intdiv($duree, 24);
                $duree -= 24 * $j;
                $h = intdiv($duree, 1);
                echo '
                <label>Durée de cagnottage :</label>
                <div id="selecteurDuree">
                    <div class="center"><label for="inline champDureeSemaines" class="labelSemJourH">Semaine(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeSemaines" min="0" max="99" value="' . $s . '" required></div>
                    <div class="center"><label for="inline champDureeJours">Jour(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeJours" min="0" max="99" value="' . $j . '" required></div>
                    <div class="center"><label for="inline champDureeHeures">Heure(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeHeures" min="0" max="99" value="' . $h . '" required></div>
                </div>
                <span></span>
                ';
            } elseif ($key == 'Travaille') {
                echo '
                <label for="champTravaille">Statut de l\'objectif :</label>
                <div class="center" style="width: 100%;">

                    <span class="center1Item">
                        <input type="radio" name="champTravaille" id="Avenir" value="2" required';
                if ($value == 2) echo ' checked>';
                else echo '>';
                echo '
                        <label for="Avenir" class="radioLabel" tabindex="0">A venir</label>
                    </span>

                    <span class="center1Item">
                        <input type="radio" name="champTravaille" id="enCours" value="1" required';
                if ($value == 1) echo ' checked>';
                else echo '>';
                echo '
                        <label for="enCours" class="radioLabel" tabindex="0">En cours</label>
                    </span>

                </div>
                <span></span>';
            } elseif ($key == 'Lien_Image') {
                echo '
                <label for="champLienImage">Image de l\'objectif :</label>
                <input type="file" name="champLienImage" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp, image/gif" onchange="refreshImageSelector(\'champImageTampon\',\'imageTampon\')">
                <img src="' . AfficherImageObjectif($idObjectif) . '" alt=" " id="imageTampon">';
                echo '<input type="hidden" value="' . AfficherImageObjectif($idObjectif) . '" name="hiddenImageLink">';
            } elseif ($key == 'Nb_Jetons') {
                echo '
                <label for="champNbJetons">Jetons à placer :</label>
                <input type="number" name="champNbJetons" placeholder="Entrez le nombre de jetons à gagner" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" min="1" max="99999999999"  value="' . $value . '"  required>
                <span></span>
                ';
            }
        }
    }
}

// fonction qui permet de modifier un objectif de la BD
function modifierObjectif($intitule, $nbJetons, $duree, $lienImage, $travaille, $idMembre, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':nbJetons' => clean($nbJetons),
        ':duree' => clean($duree),
        ':lienImage' => clean($lienImage),
        ':travaille' => clean($travaille),
        ':idMembre' => clean($idMembre),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
}
function modifierObjectifAVenir($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qModifierUnObjectifAVenir']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
}
// fonction qui permet de supprimer un objectif selon son Id_Objectif
function supprimerObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
}

// fonction qui permet d'afficher l'image d'un objectif selon son Id_Objectif
function AfficherImageObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererImageUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                $image = $value;
            }
        }
        return $image;
    }
}

// fonction qui ressort une durée en heure avec des semaines, jours
function dureeDeCagnottage($semaines, $jours, $heures)
{
    $semaines *= 24 * 7;
    $jours *= 24;
    return $semaines + $jours + $heures;
}

function afficherObjectifSelonId($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Intitule') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Nb_jetons') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Duree') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Lien_Image') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Nb_Jetons_Places') {
                echo '<div>' . $value . '</div>';
            }
        }
    }
}

function afficherIntituleObjectif($objectifSelected, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererIntituleObjectifUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idObjectif">';
    echo '<option>Veuillez choisir un objectif</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Intitule') {
                $Intitule = $value;
            }
        }
        if ($idObjectif == $objectifSelected) {
            echo '<option value=' . $idObjectif . ' selected>' . $Intitule . '</option>';
        } else {
            echo '<option value=' . $idObjectif . '>' . $Intitule . '</option>';
        }
    }
    echo '</select>';
}
function afficherIntituleObjectifSubmit($objectifSelected, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererIntituleObjectifUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idObjectif"onchange="this.form.submit()">';
    echo '<option>Veuillez choisir un objectif</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Intitule') {
                $Intitule = $value;
            }
        }
        if ($idObjectif == $objectifSelected) {
            echo '<option value=' . $idObjectif . ' selected>' . $Intitule . '</option>';
        } else {
            echo '<option value=' . $idObjectif . '>' . $Intitule . '</option>';
        }
    }
    echo '</select>';
}

function afficherUnIntituleObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererUnIntituleObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}

function afficherGererObjectifsAZ($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsAZ']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}

function afficherGererObjectifsZA($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsZA']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}

function afficherGererObjectifsDureeCroissante($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsDureeCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}

function afficherGererObjectifsDureeDecroissante($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsDureeDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}

function afficherGererObjectifsStatutCroissant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsStatutCroissant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}

function afficherGererObjectifsStatutDecroissant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsStatutDecroissant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Duree') {
                    echo '<td>' . dureeString($value) . '</td>';
                }
                if ($key == 'Nb_Jetons') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Travaille') {
                    if ($value == 1) {
                        echo '<td>En cours</td>';
                    } else if ($value == 2) {
                        echo '<td>A venir</td>';
                    } else {
                        echo '<td>Aucun</td>';
                    }
                }
                if ($key == 'Id_Objectif') {
                    $idObjectif = $value;
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" formaction="objectif.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'objectifs !</p>";
        }
    }
}
function supprimerImageObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerImageUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            // selectionne toutes les colonnes $key necessaires
            return $value;
        }
    }
}

function recupererDureeUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererDureeUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}

function ajouterTempsDebutObjectif($tempsDebut, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterTempsDebutUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':tempsDebut' => clean($tempsDebut),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
}

function recupererTempsDebutObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererTempsDebutUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}

function reinitialiserObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qReinitialiserUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
}

//! -------------------------------------------- RECOMPENSE ----------------------------------------------------------------------

// fonction qui permet d'ajouter un recompense a la BD
function ajouterRecompense($intitule, $lienImage, $descriptif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUneRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter une recompense a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':lienImage' => clean($lienImage),
        ':descriptif' => clean($descriptif)

    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}

// fonction qui permet de modifier les informations d'une recompense selon son Id_Recompense
function modifierRecompense($idRecompense, $intitule, $lienImage, $descriptif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qModifierUneRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'une recompense ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense),
        ':intitule' => clean($intitule),
        ':lienImage' => clean($lienImage),
        ':descriptif' => clean($descriptif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour modifier une recompense');
    }
}

// fonction qui permet de rechercher une recompense selon son Id_Recompense
function rechercherRecompense($idRecompense)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererUneRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour rechercher une recompense dans la BD');
    }
    //execution de la Requête sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour rechercher une recompense dans la BD');
    }
    return $req;
}
function afficherImageRecompense($idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererImageUneRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        //echo '<tr>';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                $image = $value;
            }
        }
        return $image;
    }
}

// Requête qui permet d'afficher un recompense selon son Id_Recompense
function afficherInfoRecompense($idRecompense)
{
    // recherche les informations d'une selon son id
    $req = rechercherRecompense($idRecompense); // retoune la recompense selon $idRecompense
    // permet de parcourir la ligne de la Requête : rechercherRecompense($idRecompense);
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête : rechercherRecompense($idRecompense);
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Intitule') {
                echo '<label for="champIntitule">Titre :</label>
                <input type="text" name="champIntitule" placeholder="Entrez le titre de la récompense" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Descriptif') {
                echo '<label for="champDescriptif">Descriptif :</label>
                <input type="text" name="champDescriptif" placeholder="Entrez la description de la récompense" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            } elseif ($key == 'Lien_Image') {
                echo '
                <label for="champLienImage">Image de la récompense :</label>
                <input type="file" name="champLienImage" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp, image/gif" onchange="refreshImageSelector(\'champImageTampon\',\'imageTampon\')">
                <img src="' . afficherImageRecompense($idRecompense) . '" alt=" " id="imageTampon">';
                echo '<input type="hidden" value="' . afficherImageRecompense($idRecompense) . '" name="hiddenImageLink">';
            }
        }
    }
}
// Requête qui permet de supprimer une recompense selon son id
function supprimerRecompense($idRecompense)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerUneRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour supprimer un membre de la BD');
    }
    // execution de la Requête sql
    $req->execute(array(':idRecompense' => clean($idRecompense)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un membre de la BD');
    }
}
// fonction qui permet d'afficher toutes les recompenses de la BD pour un enfant donnee
function afficherRecompense($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererRecompenseUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une récompense');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une récompense');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Lien_Image') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; min-width: 70px; border-radius: 8px; margin: 10px;"></td>';
                }
                if ($key == 'Intitule') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Descriptif') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Id_Recompense') {
                    $idRecompense = $value;
                }
                if ($key == 'objIntitule') {
                    echo '<td>' . $value . '</td>';
                }
            }
            echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idRecompense . '" 
             class="boutonModifier" formaction="modifierRecompense.php" >
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idRecompense . '
            " class="boutonSupprimer" formaction="recompense.php" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cette recompense ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas de récompenses !</p>";
        }
    }
}

function ajouterLienRecompenseObj($idObjectif, $idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterLienUneRecompenseUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une récompense');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif), ':idRecompense' => clean($idRecompense)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une récompense');
    }
}

function rechercherIdRecompenseSelonIntitule($intitule)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererUnIdRecompenseSelonIntitule']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une récompense');
    }
    // execution de la Requête sql
    $req->execute(array(':intitule' => clean($intitule)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une récompense');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}
function supprimerImageRecompense($idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerImageUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            // selectionne toutes les colonnes $key necessaires
            return $value;
        }
    }
}

function afficherRecompenseSelonObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererRecompenseSelonIdObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher une récompense');
    }
    // execution de la Requête sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher une récompense');
    }
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="recompense">';
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<img src="' . $value . '" alt="Image de la récompense" class="imgRecompense">';
                echo '<img src="images/noeud.png" class="noeud">';
            }
            if ($key == 'Intitule') {
                echo '<div class="fondRecompense" ><h2 class="intituleRecompense">' . $value . '</h2>';
            }
            if ($key == 'Descriptif') {
                echo '<p>' . $value . '</p>';
            }
            if ($key == 'Id_Recompense') {
                if (NombreDeJetons($idObjectif) == NombreDeJetonsPlaces($idObjectif)) {
                    echo '
                    <button type="submit" name="boutonRecuperer" value="' . $value . '" 
                    class="boutonRecuperer" onclick="holdSubmit(event)">
                        <img onclick="holdSubmit(event)" src="images/panier.png" class="imageIcone" alt="icone modifier">
                        <span onclick="holdSubmit(event)">Récupérer</span>
                    </button></div>
                    ';
                } else {
                    echo '
                    <button type="submit" name="boutonRecuperer" value="' . $value . '" 
                    class="boutonRecuperer" style="background-color: lightgrey;" disabled>
                        <img src="images/cadenas2.png" class="imageIcone" alt="icone modifier">
                        <span>A débloquer</span>
                    </button></div>
                    ';
                }
            }
        }
        echo '</div>';
    }
}

//! -------------------------------------------- EQUIPE --------------------------------------------------------------------------
function afficherNomPrenomMembre()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherNomPrenomMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les information des membres');
    }
    // execution de la Requête sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les information des membres');
    }
    echo '<select name="idMembre" required>';
    echo '<option value="">Veuillez choisir un Membre</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                echo '<option value=' . $idMembre . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

function ajouterUneEquipe($idEnfant, $idMembre, $dateDemandeEquipe, $role)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUneEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter une recompense a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant),
        ':idMembre' => clean($idMembre),
        ':dateDemandeEquipe' => $dateDemandeEquipe, //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':role' => clean($role)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}
// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherGererEquipe($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererEquipeUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    if ($req->rowCount() >= 1) {
        // permet de parcourir toutes les lignes de la Requête
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la Requête
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Role') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Nom') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Prenom') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Id_Enfant') {
                    $idEnfant = $value;
                }
                if ($key == 'Id_Membre') {
                    $idMembre = $value;
                }
            }
            // creation du bouton supprimer dans le tableau
            echo '
        <td>
            <button type="submit" name="boutonSupprimer" value="' . $idMembre . ',' . $idEnfant . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir retirer ce membre de cette équipe ?\');" >
                <img src="images/annuler.png" class="imageIcone" alt="icone supprimer">
                <span>Retirer</span>
            </button>
        </td>
    </tr>';
        }
    } else {
        if ($idEnfant != 0) {
            echo "<p class='msgSelection'>Cet enfant n'a pas d'équipe !</p>";
        }
    }
}
function supprimerMembreEquipe($chaineConcatene)
{
    $chaineDeconcatene = explode(",", $chaineConcatene);
    $idMembre = $chaineDeconcatene[0];
    $idEnfant = $chaineDeconcatene[1];
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerUnMembreEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    $req->execute(array(
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour supprimer un membre de la BD');
    }
}
//! -------------------------------------------- MESSAGE -------------------------------------------------------------------------

function ajouterMessage($sujet, $corps, $dateHeure, $idObjectif, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUnMessage']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter une recompense a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':sujet' => clean($sujet),
        ':corps' => clean($corps),
        ':dateHeure' => clean($dateHeure), //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':idObjectif' => clean($idObjectif),
        ':idMembre'   => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}
function afficherMessage($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererMessage']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la Requête
    $i = 1;
    $count = $req->rowCount();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgPrenomSortant">Vous</p>';
                } else {
                    echo '<p class="msgPrenomEntrant">' . $nom . ' ' . $prenom . '</p>';
                }
            }
            if ($key == 'Intitule') {
                $intitule = $value;
            }
            if ($key == 'Sujet') {
                $sujet = $value;
            }
            if ($key == 'Corps') {
                $corps = $value;
                if ($i == $count) {
                    $lastMsg = "id='lastMsg'";
                } else {
                    $lastMsg = " ";
                }
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgSortant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                } else {
                    echo '<p class="msgEntrant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                }
            }
            if ($key == 'Date_Heure') {
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgHeureSortant">' . strtolower($value) . '</p>';
                } else {
                    echo '<p class="msgHeureEntrant">' . strtolower($value) . '</p>';
                }
            }
        }
        $i++;
    }
}

function faireChatTb()
{
    echo '
    <form id="form" method="POST" onsubmit="erasePopup(\'erreurPopup\'),erasePopup(\'validationPopup\')," enctype="multipart/form-data">      
    <div id="chat">
        <div class="chatBox">
        <p id="txtChatType">Chat par équipe</p>  
          <button id="closeChatbox" type="button" onclick="chatClose(\'chatBox\',\'openChatButton\')"><img src="images/annuler2.png" alt="annuler" class="imageIcone"></button>
          
          <div id="scrollChat">';
    afficherMessage($_SESSION['enfant']);

    echo '
    
            <div id="selecteursMsg">
            <label>Objectifs : </label>';
    if (isset($_POST['idObjectif'])) {
        afficherIntituleObjectif($_POST['idObjectif'], $_SESSION['enfant']);
    } else {
        afficherIntituleObjectif(null, $_SESSION['enfant']);
    }
    if ($_SESSION['enfant'] == 0) {
        echo '
        <p class=\'msgSelection\'>Choisissez un enfant pour pouvoir sélectionner un objectif et envoyer un message !</p>';
    }



    echo '
            </div>
            <button type="button" id="boutonSelecteurs" onclick="selectMsgToggle(\'selecteursMsg\'),scrollToButton(\'boutonSelecteurs\')"><img src="images/objectifs.png" id="boutonsImgMsg" alt="icone selecteurs"></button>
          </div>

          <div id="containerBoutonsChat">
            <textarea name="champSujet" id="msgObjet" maxlength="50" placeholder="Objet"></textarea>
            <textarea name="champCorps" id="msgTextArea" placeholder="Message"></textarea>
            <button type="submit" name="boutonEnvoiMessage" id="boutonEnvoiMessage"><img src="images/envoi.png" id="boutonsImgMsg" alt="icone envoi"></button>
          </div>
        </div>
        
        <button type="button" id="openChatButton" onclick="chatOpen(\'chatBox\',\'openChatButton\'),scrollToLastMsg(\'lastMsg\')"><img src="images/message.png" class="imageIcone" alt=""></button>
    </form>
    ';
}

function faireChatObjectif()
{
    echo '
    <form id="form" method="POST" onsubmit="erasePopup(\'erreurPopup\'),erasePopup(\'validationPopup\')" enctype="multipart/form-data">      
    <div id="chat">
        <div class="chatBox">
        <p id="txtChatType">Chat par objectif</p>  
          <button id="closeChatbox" type="button" onclick="chatClose(\'chatBox\',\'openChatButton\')"><img src="images/annuler2.png" alt="annuler" class="imageIcone"></button>
          <div id="scrollChat">';
    afficherMessageParObjectif($_SESSION['enfant'], $_SESSION['objectif']);

    echo '
            <div id="selecteursMsg">
            <label>Objectifs : </label>';

    echo '
            </div>
          </div>

          <div id="containerBoutonsChat">
            <textarea name="champSujet" id="msgObjet" maxlength="50" placeholder="Objet"></textarea>
            <textarea name="champCorps" id="msgTextArea" placeholder="Message"></textarea>
            <button type="submit" name="boutonEnvoiMessage" id="boutonEnvoiMessage"><img src="images/envoi.png" id="boutonsImgMsg" alt="icone envoi"></button>
          </div>
        </div>
        
        <button type="button" id="openChatButton" onclick="chatOpen(\'chatBox\',\'openChatButton\'),scrollToLastMsg(\'lastMsg\')"><img src="images/message.png" class="imageIcone" alt=""></button>
    </form>
    ';
}

function afficherMessageParObjectif($idEnfant, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherMessageParObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher un objectif');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la Requête
    $i = 1;
    $count = $req->rowCount();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgPrenomSortant">Vous</p>';
                } else {
                    echo '<p class="msgPrenomEntrant">' . $nom . ' ' . $prenom . '</p>';
                }
            }
            if ($key == 'Intitule') {
                $intitule = $value;
            }
            if ($key == 'Sujet') {
                $sujet = $value;
            }
            if ($key == 'Corps') {
                $corps = $value;
                if ($i == $count) {
                    $lastMsg = "id='lastMsg'";
                } else {
                    $lastMsg = " ";
                }
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgSortant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                } else {
                    echo '<p class="msgEntrant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                }
            }
            if ($key == 'Date_Heure') {
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgHeureSortant">' . strtolower($value) . '</p>';
                } else {
                    echo '<p class="msgHeureEntrant">' . strtolower($value) . '</p>';
                }
            }
        }
        $i++;
    }
}

// fonction qui retourne les lignes si un enfant a le meme nom, prenom, date naissance qu'un enfant de la BD
function messageIdentique($sujet, $corps, $idObjectif, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qMessageIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour verifier si un enfant existe deja');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':sujet' => clean($sujet),
        ':corps' => clean($corps),
        ':idObjectif' => clean($idObjectif),
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour verifier si un enfant existe deja');
    }
    $cout = $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
    $i = 0;
    // permet de parcourir toutes les lignes de la Requête
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $key => $value) {
            if ($i == $cout) {
            }
        }
    }
    $i++;
}

//! -------------------------------------------- PLACER JETON --------------------------------------------------------------------

//fonction qui permet d'ajouter 
function ajouterJeton($idObjectif, $dateHeure, $idMembre, $tempsDebut)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterJeton']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un jeton a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif),
        ':dateHeure' => clean($dateHeure), //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':idMembre' => clean($idMembre),
        ':tempsDebut' => clean($tempsDebut)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un enfant a la BD');
    }
}

function supprimerDernierJeton($idObjectif)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerDernierJetonUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
}
function supprimerTousLesJetons($idObjectif)
{
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerTousLesJetons']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour ajouter un objectif a la BD');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la Requête pour ajouter un objectif a la BD');
    }
}

//function qui permet de récupérer l'id d'un membre
function recupererIdMembre($courriel)
{
    $linkpdo = connexionBd();
    $req = $linkpdo->prepare($GLOBALS['qRecupererIdUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour récupérer id membre ');
    }
    $req->execute(array(':courriel' => clean($courriel)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour récupérer id membre');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            return $value;
        }
    }
}

//! -------------------------------------------- STATISTIQUES --------------------------------------------------------------------

function afficherBarresProgression($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la Requête sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNbJetonsPlacesUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour afficher les barres de progression');
    }
    // execution de la Requête sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour afficher les barres de progression');
    }
    $i = 0;
    $reussi = 0;
    echo '<div class="containerStats fenButtonOff transparent">';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            $i += 1;
            echo '<div class="containerSeance"><p class="txtSeance">Séance ' . $i . ' finie à : </p>';
            $pourcentage = ($value / NombreDeJetons($idObjectif)) * 100;
            $pourcentage = ceil($pourcentage);
            if ($pourcentage > 100) {
                $pourcentage = 100;
            }
            if ($pourcentage == 100) {
                $reussi += 1;
            }
            echo '
            <div class="progress-container">
                <div class="progress-bar" style="width: ' . $pourcentage . '%;"><p class="pourcentageTxt">' . $pourcentage . '%</p></div>
            </div></div>';
        }
    }
    $total = $req->rowCount();
    if ($total != 0) {
        $data = ceil(($reussi / $total * 100));
        $tata =  ceil(100 - $data);

        // convert the data to json format
        $json_data = json_encode($data);
        $json_tata = json_encode($tata);
        //fonction avec json data et json tata
        echo '<input type="hidden" value="' . $json_data . '" id="chartData">';
        echo '<input type="hidden" value="' . $json_tata . '" id="chartTata">';
        echo '<canvas id="pie-chart"></canvas>';
    } else {
        echo '<p class="msgSelection">Pas de statistiques disponibles<p>';
    }
    echo '</div>';
    echo '
        <input type="hidden" name="pourcentPie" value="' . $data . '">';
    $_SESSION['pourcentPie'] = $data;
}

function recupererPremierJetonJamaisPose($idObjectif)
{
    $linkpdo = connexionBd();
    $req = $linkpdo->prepare($GLOBALS['qRecupererPremierJetonJamaisPose']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la Requête pour récupérer id Objectif ');
    }
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la Requête pour récupérer id Objectif');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la Requête
        foreach ($data as $value) {
            if ($value == null) {
                return null;
            } else {
                return $value;
            }
        }
    }
}

/**
 * nettoyerObjectif
 * Fonction qui permet de modifier l'état de l'objectif au bout de 4 semaines, en fonction de s'il a été validé a 80% ou non
 * @return void
 */
function nettoyerObjectif(): void
{
    if (isset($_POST['boutonAVenir'])) {
        modifierObjectifAVenir($_SESSION['objectif']);
        supprimerTousLesJetons($_SESSION['objectif']);
        supprimerTousJetonsPlaces($_SESSION['objectif']);
        reinitialiserObjectif($_SESSION['objectif']);
    }
    if (isset($_POST['boutonAnnuler'])) {
        supprimerTousLesJetons($_SESSION['objectif']);
        supprimerTousJetonsPlaces($_SESSION['objectif']);
        reinitialiserObjectif($_SESSION['objectif']);
    }
}

/*                                                                
/                                                                                   .                                                
/                                                                                  / V\                                               
/                                                                               / `  /                                                
/                                                                             <<    |                                                 
/         ,_)/                                                                 /    |                                                 
/           (-'                    ":"                                       /      |               ', ,'                                
/        .-'\                    ___:____     |"\/"|                       /        |            ,----'--------------------------.    
/          "'\'"""""'),        ,'        `.    \  /                      /    \  \ /            ("""|```|```|```|```|```|```|``|` |   
/            )/- -,(          |  O        \___/  |                      (      ) | |            |---'---'---'---'---'---'---'--'--|   
/           / \  / |        ~^~^~^~^~^~^~^~^~^~^~^~^~          ________|   _/_  | |          __,_    ______           ______     |_o 
/                                                            <__________\______)\__)            '---'(O)(O)'---------'(O)(O)'---'   
*/