<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


    // Classe abstraite Modèle. Centralise les services d'accès à une base de données.
    // en Utilisant PDO


abstract class Modele {

    //Objet PDO d'accès à la BD
    private $bdd;


     // Exécute une requête SQL éventuellement paramétrée

    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe si pas de paramètre
        } else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée si paramètres (empêche les injections SQL)
            $resultat->execute($params);
        }
        return $resultat;
    }

     // Renvoie un objet de connexion à la BD en initialisant la connexion

    private function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
                    'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }
        return $this->bdd;
    }

}