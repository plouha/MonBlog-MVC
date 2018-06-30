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

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }
      //ajoute un billet
    public function ecrireBillet($titre, $contenu) {
  
        $this->billet->insertBillet($titre, $contenu);
        header("location: index.php?action=Admin");
    }

       // Affiche la liste de tous les billets du blog
    public function blog() {
        session_start();
        $blog = $this->billet->getBlog();
        $vue = new Vue("Blog");
        $vue->generer(array('blog' => $blog));
    }

    public function vue($params = null) {
    session_start();
    if ($params == null) {
    $vue = new Vue("FormulaireBillet");
    $vue->generer(array (null));
    }    
    else {
    $billet = $this->billet->getBillet($params);
    $vue = new Vue("FormulaireBillet");
    $vue->generer(array('billet' => $billet));
    }
  }

}

