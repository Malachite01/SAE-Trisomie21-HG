<?php
session_start();
require('QUERY.php');
$linkpdo = connexionBd();
if(!empty($_POST['champIdentifiant']) && !empty($_POST['champMotDePasse'])) // Si il existe les champs email, password et qu'il sont pas vides
    {
        $courriel = $_POST['champIdentifiant'];
        $mdp = $_POST['champMotDePasse'];
        $check = $linkpdo -> prepare('SELECT courriel, Mdp, id_Membre from membre where courriel = ?');
        $check->execute(array($courriel));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        $courriel = strtolower($courriel);
        $courriel = clean($courriel);
        $mdp = clean($mdp);

        if($row>0)
            {
        // Se le courriel est au bon format
        if(filter_var($courriel, FILTER_VALIDATE_EMAIL)){ 
            // Si le mdp est bon (pas sécurisé faudra mettre un hash après)
            if($mdp === $data['Mdp']) 
            //(password_verify($mdp,$data['Mdp']))
                    {
            //On met l'id au $_SESSION pour le réutiliser après
                    $_SESSION['id']= $data['id_Membre'];
                   //on Redirige vers notre page d'accueil
                        header('Location: gererMembre.php');
                        die();
                    //Si mauvais password on redirige vers une autre page on l'on a codé une erreur du nom de 'password'
                    }else{ header('Location: index.php?login_err=password'); die();}
                //Si mauvais courriel au mauvais format redirige vers une autre page ou l'on a codé une erreur du nom de 'courriel'
                }else{ header('Location: index.php?login_err=courriel'); die();}
                //Si compte inexistant
            }else{ header('Location: index.php?login_err=already'); die();}
        }