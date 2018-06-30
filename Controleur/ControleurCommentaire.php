<?php
require_once 'Controleur/ControleurBillet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurCommentaire {

  private $billet;
  private $commentaire;

  public function __construct() {
    $this->commentaire = new Commentaire();
    $this->billet = new Billet();
  }

  //affiche le formulaire de moderation d'un commentaire
    public function vue($idCom) {
      session_start();
      $commentaire = $this->commentaire->getCommentaire($idCom);
      $vue = new Vue("FormulaireCommentaire");
      $vue->generer(array('commentaire' => $commentaire)); 
  }

  // Affiche la liste de tous les commentaires du blog
    public function blog2() {
        session_start();
        $blog2 = $this->commentaire->getBlog2();
        $vue = new Vue("Blog2");
        $vue->generer(array('blog2' => $blog2));
  }

  
  //Confirme la modification d'un commenatire
    public function moderer($idCom, $auteur, $commentaire) {
       session_start();
      $this->commentaire->modifierCommentaire($idCom, $auteur, $commentaire); 
      $vue = new Vue("Admin");
      $vue->generer(array(NULL));
  }
  
  //affiche la page de confirmation de suppression d'un commentaire
    public function vueConfirmation($idCom) {
      session_start();
      $commentaire = $this->commentaire->getCommentaire($idCom);
      $vue = new Vue("Confirmation");
      $vue->generer(array ('commentaire' => $commentaire));
  }
  
  //confirma le suppression d'un commentaire
    public function confirmer($idCom) {
        session_start();
      $this->commentaire->confirmer($idCom); 
      $vue = new Vue("Admin");
      $vue->generer(array(NULL));
  }
}