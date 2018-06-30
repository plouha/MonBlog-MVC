<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 16/06/2018
 */

require_once 'Modele/Modele.php';


class Mail extends Modele
    {


    // Méthode qui realise l'insertion dans la base de données
    public function insertMail($nom, $prenom, $email, $sujet, $message)
    {
        $sql = 'INSERT INTO T_MAIL (nom, prenom, email, sujet, message) VALUES(?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($nom, $prenom, $email, $sujet, $message));
    }
}


