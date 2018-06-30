<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 17/06/2018
 * Time: 15:52
 */

require_once 'Modele/Modele.php';

class Membre extends Modele
{


    // Ajoute un membre dans la base

    public function insertMembre($pseudo, $mail, $pass)
    {
        $sql = 'insert into T_MEMBRE (pseudo, mail, pass, date) values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($pseudo, $mail, $pass, $date));
    }

}