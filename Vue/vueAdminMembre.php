<?php

/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 05/06/2018
 */
include_once 'head.php';

?>
            
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <strong>GESTION DE VOTRE COMPTE</strong>
          </h3>

          <?php
            if (isset($_COOKIE['id'])) {

                if (isset($_SESSION['id'])) {

                    $utilisateur = "";
                    $utilisateur = $_SESSION['id'];
                }


            ?>

            <div > 
                <h3>Que souhaitez-vous faire ?</h3>         
                <br/>
            </div>
            <div class="container" >
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="<?= "index.php?id=" . $utilisateur['id'] ?>" class="alert-link">Aller sur le site</a></button>
                </div>
            
                <br/>
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="<?= "index.php?action=modifierMembre&id=" . $utilisateur['id'] ?>" class="alert-link">Modifier votre compte</a></button>
                </div>
                <br/>
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="<?= "index.php?action=supprimerCompte&id=" . $utilisateur['id'] ?>" class="alert-link">supprimer votre compte</a></</div>
            </div>    
                <br/>
                <br/>
                <br/>
            <a class="btn btn-outline-warning" href="./index.php">Retour</a>



        <?php
            } else {
            ?>
            <div class="container" >

                <?php
                    if (isset($insert_erreur) && $insert_erreur) :
                  ?>            
                    <p><strong style="color: red">Mauvais identifiants ... recommencez !</strong></p>
                  
                <?php  endif; ?>

                <form action="index.php?action=adminMembre" method="post">
                  <div class="form-group">
                    <label for="pseudo"><strong>Entrez votre pseudo : </strong></label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo"  placeholder="Votre pseudo" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"><strong>Entrez votre password</strong></label>
                    <input name="pass" id="pass" type=password class="form-control"  placeholder="Votre password" required>
                  </div>
                  </br>
                  <button type="submit" class="btn btn-outline-primary">Se connecter</button>
                </form>
            </div>

            <?php

                }
                ?>

        </div>
    </div>
</main>