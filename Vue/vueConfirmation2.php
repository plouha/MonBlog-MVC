<?php

/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 09/06/2018
 */

include_once 'head.php';
?>
            
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-12 blog-main" >
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <strong>ADMINISTRATION</strong>
          </h3>

            <div class="container">
                <div class="form-row">
                    <h2>Supprimer un commentaire</h2>

                    <form <?php if (isset($commentaire['id']) && $commentaire['id'])?> action="<?= 'index.php?action=confirmer2&id=' .$commentaire['id']?>" method="post" >
                        <div class="form-group">
                            <br/> 
                            <br/>                               
                            <br/>
                            <h5 class="pb-3 mb-4 font-italic" style="color: red">
                                <strong>ATTENTION ...</strong>
                                Confirmez-vous la suppression de ce commentaire ?
                            </h5>
                            
                            <button type="submit" class="btn btn-outline-danger">Supprimer</button> <a class="btn btn-outline-warning" href="index.php?action=Admin">Annuler</a>
                                <br/>
                                <br/>                            
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>    
</main>