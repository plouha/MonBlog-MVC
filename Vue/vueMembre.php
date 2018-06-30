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
                    if (isset($insert_erreur) AND $insert_erreur) :
                  ?>            
                    <p><strong style="color: red">Mauvais identifiants ... recommencez !</strong></p>
                  
                <?php  endif; ?>

                <form id="contact-form" method="post" role="form" action="index.php?action=enregistrerMembre">
                  <div class="form-group">
                    <label for="pseudo"><strong>Entrez votre pseudo : *</strong></label>
                    <input type="text" name="pseudo" id="pseudo"  class="form-control" placeholder="Votre pseudo" value="<?php if (isset($pseudo)) echo htmlspecialchars($pseudo);?>" required>
                  </div>
                  <div class="form-group">
                    <label for="email"><strong>Entrez votre email : *</strong></label>
                    <input type="email" name="mail" id="mail"  class="form-control" placeholder="Votre email" value="<?php if (isset($mail)) echo htmlspecialchars($mail);?>" required>
                  </div>
                  <div class="form-group">
                    <label for="pass"><strong>Entrez votre password : *</strong></label>
                    <input type="password" name="pass" id="pass" class="form-control"  placeholder="Votre password" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="pass"><strong>Retapez votre password : *</strong></label>
                    <input type="password" name="verif" id="verif" class="form-control"  placeholder="Retapez votre password" value="" required>
                  </div>
                    </br>
                  <button type="submit" class="btn btn-outline-primary" >Envoyer</button>
                  <p class="text-muted" ><strong style="color: red">* Ces champs sont obligatoires.</strong> </p>
                </form>
            </div>
        </div>    
    </div>
</main>