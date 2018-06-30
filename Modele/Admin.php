<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 05/06/2018
 */
require_once 'Modele/Modele.php';

class Admin extends Modele {
    
    //recupere le compte admin
    public function getAdmin($pseudo, $pass) {

        $resultat = $this->executerRequete("select * from T_ADMIN where pseudo= '$pseudo'");

        $resultat = $resultat->fetch(PDO::FETCH_OBJ);
        $hash = $resultat->pass;

        $verify = password_verify($pass, $hash);

        if($verify) {

            $sql = "SELECT id FROM T_ADMIN WHERE pseudo= '$pseudo'";
            $membre = $this->executerRequete($sql, array($pseudo, $pass));

            if ($membre->rowCount() == 1) {
                return $membre->fetch();
            }
        }
        else {
            $vue = new Vue("ErreurAdmin");
            $vue->generer(array(NULL));
        }
    }

}