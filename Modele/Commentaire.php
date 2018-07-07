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
                . ' where val="v" AND BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C); // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }


    //Méthode qui récupère tous les commentaires

    public function getBlog2() {
        $sql = 'select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu, val as val'
                . '  from T_COMMENTAIRE where val="B" order by id desc';
                
        $comments = $this->executerRequete($sql);
        return $comments;
    }

    // Méthode qui récupère un commentaire

    public function getCommentaire($idCom) {                      
        $sql = 'select COM_ID as id, val as val, COM_CONTENU as contenu'
            . ' from T_COMMENTAIRE where COM_ID=?';
        $commentaire = $this->executerRequete($sql, array($idCom));

        if ($commentaire->rowCount() == 1) {            // on s'assure qu'il n'y a qu'un résultat récupéré

            return $commentaire->fetch();               // Si c'est le cas, on l'affiche

        } else {
                throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCom'");
            }
        }

    //Méthode qui réalise la modification de la base de données
    public function moder($idCom, $val, $contenu) {

        $sql = "UPDATE T_COMMENTAIRE SET val= ?, COM_CONTENU= ?  WHERE COM_ID=$idCom";

        $this->executerRequete($sql, array($val, $contenu));
        header("Location: index.php?action=Admin");
    }

    //Méthode qui réalise la suppression dans la base de données
    public function confirmer2($idCom) {

        $sql = "DELETE FROM T_COMMENTAIRE WHERE COM_ID=$idCom";
        $this->executerRequete($sql, array($idCom));        

    }
}