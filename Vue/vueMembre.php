<?php
/**
 * Created by PhpStorm.
 * User: bernardgermain
 * Date: 17/06/2018
 * Time: 16:03
 */

include_once 'head.php';
?>
<main role="main" class="container">
    <div class="row" id=gauche >
        <div class="col-md-8 blog-main" >
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <h2 id="h2"> <em>S'inscrire sur Le Blog de Bernard</em></h2>
                <br/>
                <br/>
            </h3>
        
            <div class="container" >            <!-- Formulaire d'inscription d'un membre -->

                <?php
                    if(isset($insert_erreur) AND $insert_erreur) :
                  ?>            
                    <p><strong style="color: red">Mauvais identifiants ... recommencez !</strong></p>
                  
                <?php  endif; ?>

                <form action="./index.php?action=enregistrerMembre" method="post">
                  <div class="form-group">
                    <label for="pseudo"><strong>Entrez votre pseudo : *</strong></label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo"  placeholder="Votre pseudo" required>
                  </div>
                  <div class="form-group">
                    <label for="pseudo"><strong>Entrez votre email : *</strong></label>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="Votre email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"><strong>Entrez votre password : *</strong></label>
                    <input name="pass" id="pass" type=password class="form-control"  placeholder="Votre password" required>
                  </div>
                  </br>
                  <button type="button" class="btn btn-outline-primary">S'inscrire</button>
                  <p class="text-muted" ><strong style="color: red">* Ces champs sont obligatoires.</strong> </p>
                </form>
            </div>
        </div>    
    </div>
</main>