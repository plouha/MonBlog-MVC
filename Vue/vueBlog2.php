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
            <strong>ADMINISTRATION des COMMENTAIRES</strong>
          </h3>

  <?php
    if (isset($_SESSION['id']) && isset($_SESSION['admin']))
            { ?>
<div class="container" >
	<table class="table table-striped table-bordered">
		<tr>
		<th>id</th><th>Val</th><th>Date</th><th>Auteur</th><th>Contenu</th><th></th><th></th>
		</tr>
	  <?php

	 foreach ($blog2 as $comment) {

	  ?>

		<tr>	
		<td><?= $comment['id']; ?></td><td><?= $comment['val']; ?></td><td><?= htmlspecialchars(date_format(date_create($comment['date']), "d-m-Y - H:i")); ?></td><td><?= htmlspecialchars($comment['auteur']); ?></td><td><?= htmlspecialchars($comment['contenu']); ?></td><td><button type="button" class="btn btn-outline-warning btn-sm" ><a href="<?= "index.php?action=modifierCom&id=" . $comment['id'] ?>">Modifier</a></button></td><td><button type="button" class="btn btn-outline-danger btn-sm" ><a href="<?= "index.php?action=supprimerCom&id=" . $comment['id'] ?>">Supprimer</a></button></td>
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