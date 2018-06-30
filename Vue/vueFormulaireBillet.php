<?php

/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */
include_once 'head.php';
?>
            
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <strong>ADMINISTRATION</strong>
          </h3>

            <?php
                if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                {
            ?>
                <div class="container">
                    <div class="form-row">
                        <h2>Ecrire un nouvel article</h2>
                            <?php
                                if(isset($insert_erreur) AND $insert_erreur) :
                            ?>
                        <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>
                                <?php                            endif;?>
                        <form action="index.php?action=ecrireBillet" method="post">
                            <div class="form-group">                                
                                <label for="titre"><strong>Titre : </strong></label>
                                <input class="form-control" placeholder="Titre de l'article" name="titre" id="titre" type=text required>
                                <label for="contenu"><strong>Contenu : </strong>
                                <textarea name="contenu" id="contenu" rows="20" cols="80" required></textarea></label>
                                <br/>
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button> <a class="btn btn-outline-warning" href="index.php?action=Admin">Retour</a>
                                <br/>
                                <br/>
                            </div>    

                        </form>                    
                    </div>
                </div>
        </div>
    </div>
</main>
            <?php
                }
            ?>