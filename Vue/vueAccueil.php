<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */
?>

<?php foreach ($billets as $billet){ ?>

    <article>
        <div class="blog-post">
            <h2 class="blog-post-title"><?= $billet['titre'] ?></h2>
            <p class="blog-post-meta"><?= date_format(date_create($billet['date']), "d-m-Y - H:i") .'&nbsp;'?>&nbsp; &nbsp;<a><strong>  <?=' '. $billet['auteur']?></strong></a></p>
            <p><?= substr($billet['contenu'], 0, 200) .' ...' ?></p>
            <p class="p-3"><a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>"><em>Lire la suite ...</em></a>
        </div>
    </article>
    
<?php  } ?>
