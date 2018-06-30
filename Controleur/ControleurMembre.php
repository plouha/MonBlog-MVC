<?php
/**
 * Created by PhpStorm.
 * User: bernardgermain
 * Date: 17/06/2018
 * Time: 15:51
 */

require_once 'Vue/Vue.php';
require_once 'Modele/Membre.php';

class ControleurMembre
    {

    private $pseudo;
    private $mail;
    private $pass;

    public function __construct()
    {
        $this->membre = new Membre();
    }

    //affiche la page d'inscription
    public function vueMembre()  {
//        session_start();
//        if ($params == null) {
            $vue = new Vue("Membre"); // pas de paramètre --> formulaire pour un nouveau membre
            $vue->generer(array(null));
//        }
    }

    //ajoute un membre
    public function enregistrerMembre($pseudo, $mail, $pass) {

        $this->membre->insertMembre($pseudo, $mail, $pass);
        header("location: index.php?action=confirmeMembre");
    }

         //affiche la page de confirmation d'inscription d'un membre
    public function vueConfirmeMembre() {

        $vue = new Vue("ConfirmeMembre");
        $vue->generer(array (null));
    }

    //connexion a l'administration d'un membre
    public function gestionMembre($pseudo, $pass)
    {
        $pseudo = htmlspecialchars($pseudo);
        $pass = htmlspecialchars($pass);

        $membre = $this->membre->getMembre($pseudo, $pass);

        if (!$membre) {
            //on indique que si tout les champs ne sont pas remplis ou une erreur
            $insert_erreur = true;

        } else {
            session_start();
            $_SESSION['id'] = $membre;
            $_SESSION['pseudo'] = $pseudo;

            $vue = new Vue("Connexion");
            $vue->generer(array($_SESSION['id'], $_SESSION['pseudo']));

        }
    }
}