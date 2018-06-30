<?php

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
                    <h2>Supprimer un article</h2>
                        

                    <form <?php if(isset($billet['id']) AND $billet['id']) ?>  action="<?= 'index.php?action=confirmer&id=' . $billet['id'] ?>" method="post" >
                        <div class="form-group">
                            <br/> 
                            <br/>                               
                            <br/>
                            <h5 class="pb-3 mb-4 font-italic" style="color: red">
                                <strong>ATTENTION ...</strong>
                                Confirmez-vous la suppression de cet article et ses commentaires ?
                            </h5>
                            
                            <button type="submit" class="btn btn-outline-danger" ">Supprimer</button> <a class="btn btn-outline-warning" href="index.php?action=Admin">Annuler</a>  
                                <br/>
                                <br/>                            
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>    
</main>