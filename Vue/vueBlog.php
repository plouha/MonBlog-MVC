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
            <strong>ADMINISTRATION des ARTICLES</strong>
          </h3>

  <?php
    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
         { ?>
<div class="container" >
	<table class="table table-striped table-bordered">
		<tr>
		<th>id</th><th>Titre</th><th>Contenu</th><th></th><th></th>
		</tr>
	  <?php

	  foreach ($blog as $billet){

	  	?>

		<tr>	
		<td><?= $billet['id']; ?></td><td><?= $billet['titre']; ?></td><td><?= substr($billet['contenu'], 0, 100) .' ...'; ?></td><td><button type="button" class="btn btn-outline-warning btn-sm" ><a href="<?= "index.php?action=modifierBillet&id=" . $billet['id'] ?>">Modifier</a></button></td><td><button type="button" class="btn btn-outline-danger btn-sm" ><a href="<?= "index.php?action=supprimerBillet&id=" . $billet['id'] ?>">Supprimer</a></button></td>
		</tr>
	  <?php }  ?>
 
	</table>

	<a class="btn btn-outline-warning" href="index.php?action=Admin">Retour</a>
	<br/>
	<br/>
</div>
  <?php }  ?> 



        </div>
    </div>
</main>          