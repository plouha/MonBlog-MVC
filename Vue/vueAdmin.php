<?php
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

            <div > 
                <h3>Que souhaitez-vous faire ?</h3>         
                <br/>
            </div>
            <div class="container" >
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="index.php?action=formulaireBillet" class="alert-link">Ecrire un nouvel article</a></button>
                </div>
            
                <br/>
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="index.php?action=blog" class="alert-link">Modifier ou supprimer un article</a></button>
                </div>
                <br/>
                <div class="form-row">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning"><a href="index.php?action=blog" class="alert-link">Modérer un commentaire</a></button>
                </div>
            </div>    
                <br/>
                <br/>
                <br/>
            <a class="btn btn-outline-danger" href="index.php?action=deconnexion">Déconnexion</a>



        <?php
        }
        else {
            ?>
            <div class="container" >

                <?php
                    if(isset($insert_erreur) AND $insert_erreur) :
                  ?>            
                    <p><strong style="color: red">Mauvais identifiants ... recommencez !</strong></p>
                  
                <?php  endif; ?>

                <form action="./index.php?action=gestionAdmin" method="post">
                  <div class="form-group">
                    <label for="pseudo"><strong>Entrez votre pseudo : </strong></label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo"  placeholder="Votre pseudo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"><strong>Entrez votre password</strong></label>
                    <input name="pass" id="pass" type=password class="form-control"  placeholder="Votre password">
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