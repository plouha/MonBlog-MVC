<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */

require_once 'Controleur/ControleurAccueil.php';  // on appelle les controleurs
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurCommentaire.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Modele.php';

require_once 'Vue/Vue.php';


class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlCommentaire;
    private $ctrlAdmin;

    public function __construct() {                             // constructeur
        $this->ctrlAccueil = new ControleurAccueil();           // création d'une instance de ControleurAccueil
        $this->ctrlBillet = new ControleurBillet();             // création d'une instance de ControleurBillet
        $this->ctrlCommentaire = new ControleurCommentaire();   // création d'une instance de ControleurAdmin
        $this->ctrlAdmin = new ControleurAdmin();               // création d'une instance de ControleurAdmin
    }


    // Affiche une erreur s'il y a eu une exception
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

   // Route une requête entrante avec exécution de l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
 
                // si on demande une page particulière via l'url
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    } else
                        throw new Exception("Identifiant de billet non valide");

               } else if ($_GET['action'] == 'commenter') {
                    if (!empty($_POST['auteur']) && !empty($_POST['contenu'])) {
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idBillet = $this->getParametre($_POST, 'id');
                        $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                    } else {
                        throw new Exception("Tous les champs ne sont pas remplis !");
                    }
 
                } elseif ($_GET['action'] == 'formulaireBillet') {    // Affiche formulaire pour écrire un nouvel article
                    $this->ctrlBillet->vue();
 
                } elseif ($_GET['action'] == 'ecrireBillet') {            // Permet d'écrire un article
                    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrlBillet->ecrireBillet($titre, $contenu);
                    }
 
                } elseif ($_GET['action'] == 'modifierBillet') {          // Permet de modifier un article
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->vue($idBillet);
                    } else {
                        throw new Exception("Identifiant de billet non valide");
                    }

                } elseif ($_GET['action'] == 'enregistrerModif') {        // enregistre la mofication d'un article
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {

                            $titre = $this->getParametre($_POST, 'titre');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlBillet->modifierBillet($idBillet, $titre, $contenu);

                        }
                    } else {
                        throw new Exception("Tous les champs ne sont pas remplis !");
                    }
 
                } elseif ($_GET['action'] == 'supprimerBillet') {         // Supprime un article
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->vueConfirmation($idBillet);
                    } else {
                        throw new Exception("Identifiant de billet non valide");
                    }
 
                } elseif ($_GET['action'] == 'confirmer') {           // Confirme la suppression d'un article
                    $idBillet = $this->getParametre($_GET, 'id');
                    $this->ctrlBillet->confirmer($idBillet);

                } elseif ($_GET['action'] == 'modifierCom') {              // modifier commentaire ... NOUVEAU
                    $idCom = intval($this->getParametre($_GET, 'id'));
                    if ($idCom != 0) {
                        $this->ctrlCommentaire->vue($idCom);
                    }

                } elseif ($_GET['action'] == 'moderer') {        // enregistre la mofication d'un commentaire
                    $idCom = intval($this->getParametre($_GET, 'id'));
                    if ($idCom != 0) {
                        if (!empty($_POST['val']) && !empty($_POST['contenu'])) {

                            $val = $this->getParametre($_POST, 'val');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlCommentaire->moderer($idCom, $val, $contenu);

                        }
                    } else {
                        throw new Exception("Tous les champs ne sont pas remplis !");
                    }

                } elseif ($_GET['action'] == 'supprimerCom') {

                    $idCom = intval($this->getParametre($_GET, 'id'));
                    if ($idCom != 0) {

                        $this->ctrlCommentaire->vueConfirmation2($idCom);
                    } else {
                        throw new Exception("Identifiant de commentaire non valide");
                    }
 
                } elseif ($_GET['action'] == 'confirmer2') {

                    $idCom = $this->getParametre($_GET, 'id');
                    $this->ctrlCommentaire->confirmer2($idCom);

                } elseif ($_GET['action'] == 'blog') {        // Affiche la liste de tous les articles
                    $this->ctrlBillet->blog();
 
                } elseif ($_GET['action'] == 'blog2') {       // Affiche la liste de tous les commentaires
                    $this->ctrlCommentaire->blog2();

                } elseif ($_GET['action'] == 'Admin') {       // Affiche le menu administrateur
                    $this->ctrlAdmin->vue();

                } elseif ($_GET['action'] == 'gestionAdmin') {            // Page de connexion administrateur
                    if (isset($_POST['pseudo']) && $_POST['pass']) {

                        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                            $this->ctrlAdmin->gestionAdmin($_POST['pseudo'], $_POST['pass']);
                        }
                        else {
                            throw new Exception("Tous les champs ne sont pas remplis");
                        }
                    }
                } elseif ($_GET['action'] == 'deconnexion') {     // Déconnexion
                    session_start();
                    session_destroy();
                    header("Location: index.php");
                }
            } else {  // Si aucune action particulière demandée --> affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {      // S'il y a une exception --> on récupère le message
                    $this->erreur($e->getMessage());
            }             

        }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];

        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }


}

