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
require_once 'Controleur/ControleurMail.php';
require_once 'Controleur/ControleurMembre.php';
require_once 'Modele/Modele.php';

require_once 'Vue/Vue.php';


class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlCommentaire;
    private $ctrlAdmin;
    private $ctrlMail;
    private $ctrlMembre;


    public function __construct() {                             // constructeur
        $this->ctrlAccueil = new ControleurAccueil();           // création d'une instance de ControleurAccueil
        $this->ctrlBillet = new ControleurBillet();             // création d'une instance de ControleurBillet
        $this->ctrlCommentaire = new ControleurCommentaire();   // création d'une instance de ControleurAdmin
        $this->ctrlAdmin = new ControleurAdmin();               // création d'une instance de ControleurAdmin
        $this->ctrlMail = new ControleurMail();                 // création d'une instance de ControleurMail
        $this->ctrlMembre = new ControleurMembre();             // création d'une instance de ControleurMembre
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
 
 //---------------------------------------------------------------------------------- ARTICLES et COMMENTAIRES ---------------------
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

                } elseif ($_GET['action'] == 'modifierCom') {              // modifier commentaire
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

                        $this->ctrlCommentaire->vueConfirmation2($idCom);   // Affiche le formulaire de confirmation
                    } else {
                        throw new Exception("Identifiant de commentaire non valide");
                    }
                }

                elseif ($_GET['action'] == 'confirmer2') {           // Confirme la suppression d'un commentaire
                    $idCom = $this->getParametre($_GET, 'id');
                    $this->ctrlCommentaire->confirmer2($idCom);

                }

                elseif ($_GET['action'] == 'blog') {                // Affiche la liste de tous les articles
                    $this->ctrlBillet->blog();

                }

                elseif ($_GET['action'] == 'blog2') {               // Affiche la liste de tous les commentaires
                    $this->ctrlCommentaire->blog2();

                }


// ------------------------------------------------------------------------------------  MEMBRES DU BLOG -----------------------


                elseif ($_GET['action'] == 'membre') {              // Afficher formulaire d'inscription d'un membre
                        $this->ctrlMembre->vueMembre();
                }

                elseif ($_GET['action'] == 'enregistrerMembre') {       // Récupère les informations d'un membre

                    if ($_POST ['pass'] == $_POST ['verif']){

                        $_POST ['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                        if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass'])) {
                            $pseudo = $this->getParametre($_POST, 'pseudo');
                            $mail = $this->getParametre($_POST, 'mail');
                            $pass = $this->getParametre($_POST, 'pass');

                            $this->ctrlMembre->enregistrerMembre($pseudo, $mail, $pass);
                        }
                    }else
                        {
                            $this->ctrlMembre->erreurPwd();
                    }
                }

                elseif ($_GET['action'] == 'confirmeMembre') {       // Confirme l'inscription d'un membre
                    $this->ctrlMembre->vueConfirmeMembre();
                }

                elseif ($_GET['action'] == 'chercheMembre') {              // Affiche formulaire de connexion d'un membre
                        $this->ctrlMembre->chercheMembre();
                }

                elseif ($_GET['action'] == 'adminMembre') {            // Connexion d'un membre

                    if (isset($_POST['pseudo']) && $_POST['pass']) {

                        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {

                            $this->ctrlMembre->adminMembre($_POST['pseudo'], $_POST['pass']);
                        }
                        else {
                            $this->ctrlMembre->erreurMembre();
                        }
                    }
                }

                elseif ($_GET['action'] == 'modifierMembre') {          // Page de modification d'un membre
                    $idCompte = intval($this->getParametre($_GET, 'id'));
                    if ($idCompte != 0) {
                        $this->ctrlMembre->vue($idCompte);
                    }
                    else {
                        throw new Exception("Identifiant de compte non valide");
                    }

                }

                elseif ($_GET['action'] == 'modifMembre') {        // enregistre la mofication d'un membre
                    $idCompte = intval($this->getParametre($_GET, 'id'));

                    $_POST ['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                    if ($idCompte != 0) {
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['mail'])) {

                            $pseudo = $this->getParametre($_POST, 'pseudo');
                            $pass = $this->getParametre($_POST, 'pass');
                            $mail = $this->getParametre($_POST, 'mail');

                            $this->ctrlMembre->modifMembre($idCompte, $pseudo, $pass, $mail);

                        }
                    } else {
                        throw new Exception("Tous les champs ne sont pas remplis !");
                    }
                }

                elseif ($_GET['action'] == 'supprimerCompte') {

                    $idCompte = intval($this->getParametre($_GET, 'id'));
                    if ($idCompte != 0) {

                        $this->ctrlMembre->Confirmation3($idCompte);   // Affiche le formulaire de confirmation
                    } else {
                        throw new Exception("Identifiant de compte non valide");
                    }

                }

                elseif ($_GET['action'] == 'confirmer3') {           // Confirme la suppression d'un compte

                    $idCompte = $this->getParametre($_GET, 'id');

                    $this->ctrlMembre->confirmer3($idCompte);

                }

// --------------------------------------------------------------------------------- ADMINISTRATION DU BLOG --------------------


                elseif ($_GET['action'] == 'Admin') {               // Affiche le menu administrateur
                    $this->ctrlAdmin->vue();

                }

                elseif ($_GET['action'] == 'gestionAdmin') {            // Page de connexion administrateur
                    if (isset($_POST['pseudo']) && $_POST['pass']) {

                        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                            $this->ctrlAdmin->gestionAdmin($_POST['pseudo'], $_POST['pass']);
                        }
                        else {
                            throw new Exception("Tous les champs ne sont pas remplis");
                        }
                    }
                }

                elseif ($_GET['action'] == 'deconnexion') {     // Déconnexion
                    session_start();
                    session_destroy();
                    header("Location: index.php");
                }

// -------------------------------------------------------------------------------- MAIL --------------------------------------


                elseif ($_GET['action'] == 'ecrireMail') {              // Afficher formulaire de rédaction d'un mail
                    $this->ctrlMail->vueMail();
                }



                elseif ($_GET['action'] == 'sendMail') {            // Enregistrer et envoyer les informations d'un mail
                    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message'])) {
                        $nom = $this->getParametre($_POST, 'nom');
                        $prenom = $this->getParametre($_POST, 'prenom');
                        $email = $this->getParametre($_POST, 'email');
                        $sujet = $this->getParametre($_POST, 'sujet');
                        $message = $this->getParametre($_POST, 'message');
                        $this->ctrlMail->enregistrerMail($nom, $prenom, $email, $sujet, $message);
                        $this->ctrlMail->sendMail($email, $sujet, $message);
                    }
                    else {
                            throw new Exception("Tous les champs ne sont pas remplis");
                    }

                }

                elseif ($_GET['action'] == 'confirmeMail') {       // Confirme l'envoi d'un mail
                        $this->ctrlMail->vueConfirmeMail();
                }

                elseif ($_GET['action'] == 'enregistrerMail') {       // Récupère les informations d'un mail
                    $this->ctrlMail->enregistrerMail($nom, $prenom, $email, $sujet, $message);
                }

 // ---------------------------------------------------- SI AUCUNE PAGE DEMANDEE --> PAGE D'ACCUEIL ------------------------------

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

