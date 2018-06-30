<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */


require_once 'Modele/Modele.php';


class Billet extends Modele {

    // Renvoie la liste des billets du blog

    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date, BIL_AUTEUR as auteur,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';      // liste des articles par id descendant
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    // Renvoie les informations sur un billet

    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date, BIL_AUTEUR as auteur,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Fetch n'affiche qu'un élément (= 1 article)
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }    

    // fonction qui realise l'insertion dans la base de données
    
    public function insertBillet($titre, $contenu){
        $sql = 'INSERT INTO T_BILLET(BIL_TITRE, BIL_CONTENU) VALUES(?, ?)';
        $this->executerRequete($sql, array($titre, $contenu));
    }

    //Méthode qui recupere tous les billets
    public function getBlog(){
        $sql = 'select BIL_ID as id, BIL_TITRE as titre, BIL_AUTEUR as auteur, BIL_DATE as date '
                . '  from T_BILLET order by id desc';
                
        $billets = $this->executerRequete($sql);
        return $billets;
    }
}
