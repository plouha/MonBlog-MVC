<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/06/2018
 */


include_once 'head.php';
?>
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <h2 id="h2"> <em>Connexion sur le blog</em></h2>
                <br/>
                <br/>
                <br/>
                <br/>
            </h3>

            <div class="container" >            <!-- Erreur d'existence d'un membre -->

                <p class="text-muted" ><em style="color: red">Ce membre est inconnu sur le blog ... sans doute erreur d'identifiants. Recommencez la saisie.</em> </p>
                <br/>
                <br/>
                <a class="btn btn-outline-warning" href="./index.php?action=chercheMembre">Retour</a>

            </div>
        </div>
    </div>
</main>