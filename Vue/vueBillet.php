<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */
?>

<article>
    <header>
        <h1><?= $billet['titre'] ?></h1>
        <strong><?= $billet['auteur'] ?></strong> - <?= date_format(date_create($billet['date']), "d-m-Y") ?><br/>
        <br/>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
</br>
<hr />
<header>
</header>
    <h2 class="pb-3 mb-4 font-italic border-bottom">
        Commentaire(s)
    </h2><br/>

</header>
    <?php foreach ($commentaires as $commentaire){ 
    ?>
    
    <h5><strong><em><?= $commentaire['auteur'] ?></em></strong></h5><?= date_format(date_create($commentaire['date']), "d-m-Y - H:i") ?>
    <br/>
    <p><?= $commentaire['contenu'] ?></p>
    <?php 
    } ?>
</br>

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
?>

<hr />
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        <strong>Ajouter un commentaire</strong>
    </h3>
    <h6 class="pb-3 mb-4 font-italic" style="color: red">
        Votre commentaire apparaîtra après validation. Merci de votre compréhension.
    </h6>

<form method="post" action="index.php?action=commenter">
    <h5><em>Pseudo</em></h5>
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required />
    <br />
    <br />
    <h5><em>Commentaire</em></h5>
    <textarea id="contenu" name="contenu" rows="8" cols="80" placeholder="Votre commentaire" required></textarea>
    <br />
    <br />
    <input type="hidden" name="id" value="<?= $billet ['id'] ?>" />
    <input class="btn btn-outline-danger" type="submit" value="Valider" />
</form>
</br>

<?php

 }
    else {
        echo "erreur";
    } ?>




