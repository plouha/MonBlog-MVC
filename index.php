<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


require 'Controleur/Routeur.php'; // On appelle le routeur

$routeur = new Routeur(); //on crée une instance de routeur
$routeur->routerRequete(); // et on appelle la méthode

