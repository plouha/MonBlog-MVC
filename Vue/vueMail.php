<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 16/06/2018
 * Time: 12:48
 */
include_once 'head.php';
?>
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
            <h3 class="pb-3 mb-4 font-italic border-bottom">
        <h2 id="h2"> <em>Contacter Le Blog de Bernard</em></h2>
        <br/>
        </div>

    <div class="container">             <!-- Formulaire de mail -->
        <form id="contact-form" method="post" action="index.php?action=sendMail">

        <div class="messages"></div>
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name"><strong>Nom *</strong></label>
                            <span class="error"><?php if (isset($erreurnom)) echo $erreurnom; ?></span>
                            <input id="form_name" type="text" name="nom" class="form-control" placeholder="Votre nom" data-error="Vous devez indiquer votre nom." value="<?php if(isset($nom)) echo htmlspecialchars($nom);?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_lastname"><strong>Prénom *</strong></label>
                        <span class="error"><?php if (isset($erreurprenom)) echo $erreurprenom; ?></span>
                        <input id="form_lastname" type="text" name="prenom" class="form-control" placeholder="Votre prénom" data-error="Vous devez indiquer votre prénom." value="<?php if(isset($prenom)) echo htmlspecialchars($prenom);?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email"><strong>Email *</strong></label>
                            <span class="error"><?php if (isset($erreuremail)) echo $erreuremail; ?></span>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Votre email" data-error="Vous devez indiquer un e-mail valide." value="<?php if(isset($email)) echo htmlspecialchars($email);?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sujet"><strong>Sujet *</strong> </label>
                            <span class="error"><?php if (isset($erreursujet)) echo $erreursujet; ?></span>
                            <input id="sujet" type="text" name="sujet" class="form-control" placeholder="Indiquez le sujet" value="<?php if(isset($sujet)) echo htmlspecialchars($sujet);?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message"><strong>Message *</strong> </label>
                            <span class="error" ><?php if (isset($erreurmessage)) echo $erreurmessage; ?></span>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Votre message " rows="4" data-error="Vous devez écrire un message."><?php if(isset($message)) echo htmlspecialchars($message);?></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary btn-send" value="Envoyer" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted"><strong style="color: red">* Ces champs sont obligatoires.</strong></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</main>
<!-- Fin du formulaire de mail -->