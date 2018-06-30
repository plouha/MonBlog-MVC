<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 16/06/2018
 */
include_once 'head.php';

?>

<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <strong>GESTION DE COMPTE</strong>
            </h3>

            <?php
                if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))

                {

            ?>
            <div class="container">
                    <p><h2>Modifier votre compte</h2></p>


                <?php
                    if(isset($insert_erreur) AND isset($insert_erreur)) {
                ?>

                    <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>

                <?php
                    } ;

                ?>

                    <form  <?php if(isset($membre['id']) AND $membre['id']) ?> action="<?= 'index.php?action=modifMembre&id=' . $membre['id'] ?>" method="post" >
                        <div class="form-group"> 
                            <br/>
                            <br/>
                            <div class="form-group">                                
                            <label for="pseudo"><strong>Pseudo : </strong></label>
                            <br/>
                                <input class="form-control" name="pseudo" id="pseudo" type="text" <?php if(isset($membre['id']) AND $membre['id']) ?>value="<?= nl2br(htmlspecialchars($membre['pseudo']));?>"  required>
                            </div>
                            <br/>

                            <div class="form-group">
                            <label for="pass"><strong>Mot de passe : </strong></label>
                            <br/>
                                <input class="form-control" name="pass" id="pass" type="text" <?php if(isset($membre['id']) AND $membre['id']) ?>value="" Placeholder="Entrez votre nouveau mot de passe ..."required>
                            </div>
                            <br/>
                            <div class="form-group">
                            <label for="mail"><strong>Mail : </strong></label>
                            <br/>
                                <input class="form-control" name="mail" id="mail" type="email"  <?php if(isset($membre['id']) AND $membre['id']) ?>value="<?= nl2br(htmlspecialchars($membre['mail']));?>" required>
                            </div>
                            <br/>
                            <br/>
                            <button type="submit" class="btn btn-outline-primary" >Modifier</button> <a class="btn btn-outline-warning" href="index.php?action=AdminMembre">Retour</a>
                            <br/>
                            <br/>
                        </div>
                    </form>               
            </div>
        </div>
    </div>  
</main>

            <?php  
            }
            else{
                    echo 'pas de session en cours';
            };
            ?>