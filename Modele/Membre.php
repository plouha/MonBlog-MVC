<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 17/06/2018
 */

require_once 'Modele/Modele.php';
require_once 'Controleur/ControleurMembre.php';

class Membre extends Modele {


    // Ajoute un membre dans la base

    public function insertMembre($pseudo, $mail, $pass)
    {

        $resultat = $this->executerRequete("select * from T_MEMBRE where pseudo= '$pseudo' or mail= '$mail'");

        $resultat = $resultat->fetch(PDO::FETCH_OBJ);

        $member = $resultat->pseudo;
        $email = $resultat->mail;

        if($member == $pseudo){
            $vue = new Vue("ErreurDoublon");
            $vue->generer(array(NULL));
        }
        elseif($email == $mail){
            $vue = new Vue("ErreurMail");
            $vue->generer(array(NULL));
        }
        else{
        $sql = 'insert into T_MEMBRE (pseudo, mail, pass, date) values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante

        $this->executerRequete($sql, array($pseudo, $mail, $pass, $date));        // avec mot de passe crypté

        }
    }
//$membre =
    //recupere un compte membre
    public function getAdminMembre($pseudo, $pass)
    {

        $resultat = $this->executerRequete("select * from T_MEMBRE where pseudo= '$pseudo'");

        $resultat = $resultat->fetch(PDO::FETCH_OBJ);

        $hash = $resultat->pass;

        $verify = password_verify($pass, $hash);

        if($verify) {

            $sql = "SELECT id FROM T_MEMBRE WHERE pseudo= '$pseudo'";
            $membre = $this->executerRequete($sql, array($pseudo, $pass));

           if ($membre->rowCount() == 1) {
                return $membre->fetch();
            }
        }
        else {
            $vue = new Vue("ErreurMembre");
            $vue->generer(array(NULL));
        }
    }

    //Méthode qui récupère un membre dans la base de données
    public function getMembre($idCompte) {

        $sql = 'select id as id, pseudo as pseudo, pass as pass, mail as mail'
            . ' from T_MEMBRE where id=?';

        $membre = $this->executerRequete($sql, array($idCompte));

        if ($membre->rowCount() == 1) {             // on s'assure qu'il n'y a qu'un résultat récupéré

            return $membre->fetch();
        }
        else {      // sinon message d'erreur
            throw new Exception("Aucun membre ne correspond à l'identifiant '$idCompte'");
        }
    }

    //Méthode qui réalise la modification de la base de données
    public function updateMembre($idCompte, $pseudo, $pass, $mail){

        $sql = "UPDATE T_MEMBRE SET pseudo= ?, pass= ?, mail= ?  WHERE id=$idCompte";

        $this->executerRequete($sql, array($pseudo, $pass, $mail));

    }

    //Méthode qui réalise la suppression dans la base de données
    public function confirmer3($idCompte) {

        $sql = "DELETE FROM T_MEMBRE WHERE id=$idCompte";
        $this->executerRequete($sql, array($idCompte));

    }

}

