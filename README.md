# Monblog-MVC

Blog PHP - POO en MVC

<h2>INSTALLATION DU BLOG</h2>

1- Créer un répertoire "Monblog"</br></br>
2- Copier l'ensemble des répertoires du code PHP dans ce répertoire Monblog</br>
    Vous veillerez à ce que le fichier index.php soit à la racine (c'est le seul fichier à cet endroit).</br></br>
3- créer la base de données et ses tables dans PHPMYADMIN à partir du fichier SQL présent dans ce repository</br></br>
4- Le compte de l'administrateur (Table ADMIN) se crée automatiquement. Il n'a pas de formulaire de saisie. Raison de sécurité. Un enregistrement "admin" "admin" existe déjà. A vous de le modifier si vous le souhaitez.</br></br>
5- Pour accéder à l'espace administrateur, il cliquer sur "blog" dans le footer.</br>
   Après connexion (via le formulaire de connexion administrateur), vous arrivez sur le menu administrateur.</br>
   Il permet plusieurs actions (créer/modifier un article, supprimer un article, modérer un commentaire)</br>
   On sort de l'espace administration en cliquant sur le bouton rouge "Déconnexion" sur le bord droit de l'écran.</br></br>
6- Pour consulter le site, aucune connexion n'est nécessaire. Mais ajouter un commentaire est impossible sans avoir un compte.Seul l'administrateur peut écrire un article.</br></br>
7- Un utilisateur du blog peut s'inscrire en cliquant sur "S'inscrire". Il doit renseigner tous les champs.
   Une fois inscrit, un utilisateur pourra commenter les articles, après connexion à son compte.</br></br>
8- La connexion d'un membre se fait en cliquant sur le bouton "Se Connecter".</br>
   L'utilsateur arrive alors sur un menu Membre qui lui permet l'accès au site, de modifier son compte ou le supprimer.</br>
   La déconnexion se fait en cliquant sur le bouton rouge "Déconnexion".</br></br>
9- Un commentaire n'est visible qu'après validation par l'administrateur.</br>
   Par défaut, dans la base de données, un commentaire possède un attribut "B" (Brouillon).</br>
   L'administrateur s'il accepte le commentaire (via le menu administrateur) mettra cet attibut à "V" (validé) et dès lors le commentaire s'affichera.</br></br>
10- Sur la page d'accueil, les articles sont affichés de manière partielle. Pour voir la totalité il faut cliquer sur "Lire la suite"</br>
   Dès lors, on voit l'article en entier ainsi que tous les commentaires liés à cet article et validés par l'administrateur.</br>
