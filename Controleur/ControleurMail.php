<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 16/06/2018
 */


require_once 'Vue/Vue.php';
require_once 'Modele/Mail.php';

class ControleurMail {

    private $nom;
    private $prenom;
    private $email;
    private $sujet;
    private $message;
    private $to;
    private $headers;



    public function __construct() {
        $this->mail = new Mail();
    }

    //affiche la page du mail
    public function vueMail($params = null)
    {
        if ($params == null) {
            $vue = new Vue("Mail"); // pas de paramètre --> formulaire pour un nouveau mail
            $vue->generer(array(null));
        }
    }


    //ajoute un mail dans la base
    public function enregistrerMail($nom, $prenom, $email, $sujet, $message) {

        $this->mail->insertMail($nom, $prenom, $email, $sujet, $message);

    }

    //Méthode d'envoi du mail
    public function sendmail($sujet, $email, $message) {
        $this->to = 'bernard-germain5@orange.fr';
        $this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);

        $this->headers = 'From:'.$this->email."\r\n";
        $this->headers.='MIME-version: 1.0'."\r\n";
        $this->headers.='Content-type: text/html; charset=utf-8'."\r\n";

        mail($this->to, $this->sujet, $this->message, $this->headers);

        header("location: index.php?action=confirmeMail");
    }

    //affiche la page de confirmation de suppression d'un article
    public function vueConfirmeMail() {

        $vue = new Vue("ConfirmeMail");
        $vue->generer(array (null));
    }

}

?>