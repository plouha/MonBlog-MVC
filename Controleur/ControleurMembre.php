<?php
/**
 * Created by PhpStorm.
 * User: bernardgermain
 * Date: 17/06/2018
 */

require_once 'Vue/Vue.php';
require_once 'Modele/Membre.php';

class ControleurMembre
    {


    public function __construct()
    {
        $this->membre = new Membre();
    }

    //affiche la page d'inscription
    public function vueMembre() {

            $vue = new Vue("Membre"); // Affiche formulaire pour un nouveau membre
            $vue->generer(array(null));
    }

    //ajoute un membre
    public function enregistrerMembre($pseudo, $mail, $pass) {

        $this->membre->insertMembre($pseudo, $mail, $pass);
        header("location: index.php?action=confirmeMembre");
    }

    //erreur de Password
    public function erreurPwd() {

        $vue = new Vue("erreurPwd");
        $vue->generer(array(null));
    }

    //erreur de Membre
    public function erreurMembre() {

        $vue = new Vue("erreurMembre");
        $vue->generer(array(null));
    }

    //affiche la page de confirmation d'inscription d'un membre
    public function vueConfirmeMembre() {

        $vue = new Vue("ConfirmeMembre");
        $vue->generer(array(null));
    }

    public function chercheMembre() { // page pour chercher un membre

        $vue = new Vue("AdminMembre");
        $vue->generer(array(null));
    }

    //affiche la page de modification du membre
    public function vue($id) {

        $membre = $this->membre->getMembre($id);    // Récupère les données pour modifier le membre choisi
        session_start();
        $vue = new Vue("ModifierMembre");
        $vue->generer(array('membre' => $membre));

    }    

    public function modifMembre($id, $pseudo, $pass, $mail) { // MAJ des données du membre

        $this->membre->updateMembre($id, $pseudo, $pass, $mail);
        session_start();
        $vue = new Vue("AdminMembre");
        $vue->generer(array($id));
    }

    public function confirmation3($id) {       // Suppression du membre

        $membre = $this->membre->getMembre ($id);

        $vue = new Vue("Confirmation3");
        $vue->generer(array('membre' => $membre));
    }

    //confirme la suppression d'un membre
    public function confirmer3($id) {

        $this->membre->confirmer3($id);

        session_start();
        session_destroy();
        header("location: index.php");

    }

    //connexion a l'administration d'un membre
    public function adminMembre($pseudo, $pass) {

        $pseudo = htmlspecialchars($pseudo);
        $pass = htmlspecialchars($pass);
        $membre = $this->membre->getAdminMembre($pseudo, $pass);
        $_COOKIE['id'] = setcookie('id', mt_rand(1, 50000000000), time() + 1*4*3600, null, null, false, true);
        session_start();
        $_SESSION['id'] = $membre;


            $vue = new Vue("AdminMembre");
            $vue->generer(array($_SESSION['id'], $_COOKIE['id']));

    }
}

