<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() { //Le constructeur 
        $this->billet = new Billet();       // instanciation 
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un article
    public function billet($idBillet) {

        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un article
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage de l'article
        $this->billet($idBillet);
    }
    //ajoute un article
    public function ecrireBillet($titre, $contenu) {
  
        $this->billet->insertBillet($titre, $contenu);
        header("location: index.php?action=Admin");
    }

    //modifie un article
    public function modifierBillet($idBillet, $titre, $contenu) {

        $this->billet->modifBillet($idBillet, $titre, $contenu); 

        $this->billet($idBillet);

    }

    //affiche la page de confirmation de suppression d'un article
    public function vueConfirmation($idBillet) {

        $billet = $this->billet->getBillet($idBillet);

        $vue = new Vue("Confirmation");
        $vue->generer(array ('billet' => $billet));
    }
    

    //confirme la suppression d'un article
    public function confirmer($idBillet) {
        $this->billet->confirmer($idBillet); 
        $this->blog();
    }

    // Affiche la liste de tous les billets du blog
    public function blog() {

        $blog = $this->billet->getBlog();
        $vue = new Vue("Blog");
        $vue->generer(array('blog' => $blog));
    }

    public function vue($params = null) {

    if ($params === null) {
    $vue = new Vue("FormulaireBillet"); // pas de paramètre --> formulaire pour un nouvel article
    $vue->generer(array (null));
    } else {
    $billet = $this->billet->getBillet($params); // sinon affiche le formulaire pour modifier l'article choisi
    $vue = new Vue("ModifierBillet");
    $vue->generer(array('billet' => $billet));
      }
    }

}

