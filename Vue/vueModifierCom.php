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
        <div class="col-md-12 blog-main" >
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <strong>ADMINISTRATION</strong>
          </h3>

             <?php
                 if (isset($_COOKIE['admin']))
                {
            ?>
            <div class="container">
                <div class="form-row">
                    <h2>Modifier un commentaire</h2>
   
                        <?php
                            if (isset($insert_erreur) && isset($insert_erreur)) {
                        ?>

                            <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>
                        <?php
                            } ;
                        ?>

                    <form <?php if (isset($commentaire['id']) && $commentaire['id']) ?>  action="<?= 'index.php?action=moderer&id=' . $commentaire['id'] ?>" method="post" >
                        <div class="form-group"> 
                            <br/>
                            <br/> 
                            <br/>
                            <br/>                                
                            <label for="val"><strong>Statut du commentaire : </strong></label>
                            <br/>
                                <input class="form-control" name="val" id="val" type="text" <?php if (isset($commentaire['id']) && $commentaire['id']) :?> value="<?= htmlspecialchars($commentaire['val']);?>"<?php endif;?>  required>
                            <br/>
                            <label for="contenu"><strong>Contenu : </strong>
                                <br/>
                                <textarea name="contenu" id="contenu" class="form-control" rows="5" cols="80"><?php if (isset($commentaire['id']) && $commentaire['id']) :?> <?= nl2br(htmlspecialchars($commentaire['contenu']));?><?php endif;?></textarea></label>
                            <br/>
                            
                            <button type="submit" class="btn btn-outline-primary" >Modifier</button> <a class="btn btn-outline-warning" href="index.php?action=blog2">Retour</a>
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
            } ;
            ?>
