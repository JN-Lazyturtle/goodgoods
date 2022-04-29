# goodgoods

Site commercial de biens en provenance des vilains dans les dessins animés:

En cours :

- classe utilisateur
- classe panier :
    refaire getAllProduitsPanier = appelle directement lignePanier qui est à jour
    ligne panier a mettre dans le constructeur : 
    rajouter getproduitparID dans produit // FAIT 
    tableau lignepanier : indexé par idproduit et associé à une quantité
- session() : 
    organisation session : $_SESSION['utilisateur'] et $_SESSION['panier'] distinct
    si non connecté, $_SESSION['utilisateur'] n'existe pas et $_SESSION['panier'] corresponds à un panier temporraire
    dès la connexion $_SESSION['panier'] doit correspondre au panier lié à l'utilisateur dans la base de données
    panier : update de la base de donnée à chaque ajout/retrait panier
    update de la date panier quand on fait appel à ajoutPanier() alors que le panier est vide

A noter :
- utilisation de GET dans routeur : toujours passer les arguments DANS L'ORDRE demandé par la fonction !

A faire :
- cookies ?
- securité des vues (voir TD5)
- hachage mdp
- authentification et validation par email
