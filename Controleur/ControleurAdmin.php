<?php

/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 05/06/2018
 */

require_once 'Vue/Vue.php';
require_once 'Modele/Admin.php';

class ControleurAdmin {

    
    public function __construct() {
        $this->admin = new Admin();
  }
    
    //affiche la page d'administration
    public function vue() {


        if(isset($_COOKIE['admin'])){

        $vue = new Vue("Admin");
        $vue->generer(array($_COOKIE['admin']));

        } else{
            $vue = new Vue("Admin");
            $vue->generer(array(null));
        }

    }

    //connexion a l'administration
    public function gestionAdmin($pseudo, $pass) {
        $pseudo = htmlspecialchars($pseudo);
        $pass = htmlspecialchars($pass);
      
        $admin = $this->admin->getAdmin($pseudo, $pass);

        if (!$admin)
        {
            //on redirige vers la page d'erreur de l'Aministrateur
            header("location: index.php?action=ErreurAdmin");

        } else {

            $cookie = setcookie('admin', mt_rand(1, 50000000000), time() + 1*4*3600, null, null, false, true);
            $_COOKIE['admin'] = $cookie;

            $vue = new Vue("Admin");
            $vue->generer(array($_COOKIE['admin']));

        }
    }
}


