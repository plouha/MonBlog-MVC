<?php

/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 05/06/2018
 */

require_once 'Vue/Vue.php';
require_once 'Modele/Admin.php';

class ControleurAdmin {

    private $pass;
    private $pseudo;
    
    public function __construct() {
        $this->admin = new Admin();
  }
    
  //affiche la page d'administration
    public function vue() {
      session_start();
      $vue = new Vue("Admin");
      $vue->generer(array (null));
  }

  //connexion a l'administration
    public function gestionAdmin($pseudo, $pass){

      $pseudo = htmlspecialchars($pseudo);
      $pass = htmlspecialchars($pass);
      
      $admin = $this->admin->getAdmin($pseudo, $pass);

      if (!$admin)
      {
          //on redirige vers la page d'erreur de l'Aministrateur
          header("location: index.php?action=ErreurAdmin");

      }
      else
      {
         session_start();
         $_SESSION['id'] = $admin;
         $_SESSION['pseudo'] = $pseudo;

         $vue = new Vue("Admin");
         $vue->generer(array($_SESSION['id'], $_SESSION['pseudo']));

      }
  }
}


