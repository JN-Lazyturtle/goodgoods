# goodgoods

Site commercial de biens en provenance des vilains dans les dessins animés:
A noter :
- utilisation de GET dans routeur : toujours passer les arguments DANS L'ORDRE demandé par la fonction !

En cours :

- classe utilisateur
- classe panier :
    tableau lignepanier : indexé par idproduit et associé à une quantité
    date gérer et mise à jour par ajout produit (quand on ajoute dans un panier vide)
    
- session() : 
    organisation session : $_SESSION['utilisateur'] et $_SESSION['panier'] distinct
    si non connecté, $_SESSION['utilisateur'] n'existe pas et $_SESSION['panier'] corresponds à un panier temporraire
    dès la connexion $_SESSION['panier'] doit correspondre au panier lié à l'utilisateur dans la base de données
    panier : update de la base de donnée à chaque ajout/retrait panier
    update de la date panier quand on fait appel à ajoutPanier() alors que le panier est vide



A faire :
- cookies ?
- securité des vues (voir TD5)
- hachage mdp
- authentification et validation par email

transformer le panier en commande
mettre la TVA et le prix total du panier
afficher les commandes (en pdf si possible)
un site fonctionnel
