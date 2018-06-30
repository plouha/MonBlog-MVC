<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    // Lorsque la fonction Accueil est appelée depuis le routeur
    // Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }

}

