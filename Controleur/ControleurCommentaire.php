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
      $vue = new Vue("ModifierCom");
      $vue->generer(array('commentaire' => $commentaire)); 
  }


  // Affiche la liste de tous les commentaires du blog
    public function blog2() {
        session_start();
        $blog2 = $this->commentaire->getBlog2();
        $vue = new Vue("Blog2");
        $vue->generer(array('blog2' => $blog2));
  }

  
  //Confirme la modification d'un commentaire
    public function moderer($idCom, $var, $contenu) {
       session_start();
      $this->commentaire->moder($idCom, $var, $contenu);
      $vue = new Vue("Admin");      // on revient au menu administrateur
      $vue->generer(array(NULL));
  }
  
  //affiche la page de confirmation de suppression d'un commentaire
    public function vueConfirmation2($idCom) {
      session_start();
      $commentaire = $this->commentaire->getCommentaire($idCom);

      $vue = new Vue("Confirmation2");
      $vue->generer(array ('commentaire' => $commentaire));
  }
  
  //confirme la suppression d'un commentaire
    public function confirmer2($idCom) {
      $this->commentaire->confirmer2($idCom);
      $this->blog2();

  }
}