<?php
/**
 * Created by PhpStorm.
 * User: Bernard Germain
 * Date: 26/05/2018
 */
?>

<!doctype html>
<html>
<head>

    <title>Blog</title>
<?php include_once 'head.php' ?>
</head>

<body>
    <div class="container">

      <div class="blog-header py-3">
          <a href="./index.php"><h1>Le Blog de Bernard</h1></a>
      </div>   

    <main role="main" class="container">
      <div class="row" id=gauche >
        <div class="col-md-9 blog-main" >
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Articles
          </h3>

          <!-- On affiche les articles via vueAccueil.php contenant la boucle foreach (pour les articles) -->
          <div>
            <?= $contenu  ?>
          </div> 


        </div><!--  fin du blog-main -->

        <!--  partie se trouvant sur le côté -->
        <aside class="col-md-3 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Auteur du blog</h4>
            <img src="images/BG2.png" alt="responsive">
            <p class="mb-1"><h4><strong><em>Bernard GERMAIN</em></strong></h4></p>
            <a>Développeur ... efficace</a><br>
            <a href="doc/CV_2018.pdf" target="_blank">Mon CV ... </a>
          </div>


          <div class="p-3">
            <h4 class="font-italic">Liens</h4>
            <ol class="list-unstyled">
              <li><img src="images/twitter.png" alt=""><a href="https://twitter.com/" target="_blank"> Twitter</a></li>
              <li><img src="images/facebook.png" alt=""><a href="https://fr-fr.facebook.com/" target="_blank"> Facebook</a></li>
              <li><img src="images/OC.png" alt=""><a href="https://openclassrooms.com/" target="_blank"> Openclassroom</a></li>              
            </ol>
          </div>

          <div class="p-3 mb-3 bg-light rounded">
          <p class="mb-1"><h4 class="font-italic">Exprimez-vous ...</h4></p>
            <a>Pour écrire un commentaire, il faut :</a><br>
            <p></p>
            <a class="btn btn-outline-primary" href="index.php?action=membre">S'inscrire</a>
            <a class="btn btn-outline-primary" href="index.php?action=chercheMembre">Se connecter</a>
            <p></p>
            <a class="btn btn-outline-danger" href="index.php?action=deconnexion">Déconnexion</a>
          </div>

          <div class="p-3 mb-3 bg-light rounded">
          <p class="mb-1"><h4 class="font-italic">Contactez-nous ...</h4></p>
            <a>Vous pouvez nous faire parvenir un mail</a><br>
              <br />
            <a class="btn btn-outline-primary" href="index.php?action=ecrireMail">Contact</a>
          </div>
        </aside><!-- / fin du blog-sidebar -->

      </div><!-- / fin du row -->
      <?php include_once 'vue/footer.php'; ?>
    </main><!-- / fin du container -->

  </body>
</html><br>