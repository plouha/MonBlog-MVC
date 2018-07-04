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

    private $membre;


    public function __construct()
    {
        $this->membre = new Membre();
    }

    //affiche la page d'inscription
    public function vueMembre() {
        session_start();
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
        session_start();
        $vue = new Vue("AdminMembre");
        $vue->generer(array(null));
    }

    //affiche la page de modification du membre
    public function vue($idCompte) {
        session_start();
        $membre = $this->membre->getMembre($idCompte);    // Récupère les données pour modifier le membre choisi

        $vue = new Vue("ModifierMembre");
        $vue->generer(array('membre' => $membre));

    }    

    public function modifMembre($idCompte, $pseudo, $pass, $mail) { // MAJ des données du membre
        session_start();
        $this->membre->updateMembre($idCompte, $pseudo, $pass, $mail);
        $vue = new Vue("AdminMembre");
        $vue->generer(array(NULL));
    }

    public function confirmation3($idCompte) {       // Suppression du membre

        $membre = $this->membre->getMembre ($idCompte);

        $vue = new Vue("Confirmation3");
        $vue->generer(array('membre' => $membre));
    }

    //confirme la suppression d'un membre
    public function confirmer3($idCompte) {

        $this->membre->confirmer3($idCompte);

        session_start();
        session_destroy();
        header("location: index.php");

    }

    //connexion a l'administration d'un membre
    public function adminMembre($pseudo, $pass) {
        session_start();
        $pseudo = htmlspecialchars($pseudo);

        $membre = $this->membre->getAdminMembre($pseudo, $pass);

            $_SESSION['id'] = $membre;
            $_SESSION['pseudo'] = $pseudo;
//            setcookie('pseudo', $_SESSION['pseudo'], time() + 1*24*3600, null, null, false, true);
            $vue = new Vue("AdminMembre");
            $vue->generer(array($_SESSION['id'], $_SESSION['pseudo']));


    }
}

