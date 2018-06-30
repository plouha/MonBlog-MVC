<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


require_once 'Modele/Modele.php';

class Commentaire extends Modele {

    // Renvoie la liste des commentaires associés à un billet

    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }


    //Méthode qui recupere tous les commentaires
    public function getBlog2(){
        $sql = 'select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu'
                . '  from T_COMMENTAIRE order by id desc';
                
        $comments = $this->executerRequete($sql);
        return $comments;
    }
}