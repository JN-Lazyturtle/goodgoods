<?php
require_once(File::build_path(array("model", "Model.php")));

class ModelPanier {

    private $idPanier;
    private $date;
    private $mailUtilisateur;
    private $lignesPanier;


    public function __construct($idPanier = NULL, $mailUtilisateur = NULL){
        if (!is_null($mailUtilisateur) && !is_null($idPanier)) {
            $this->idPanier = $idPanier;
            $this->mailUtilisateur = $mailUtilisateur;
        }
    }

    /**  get panier de la base de données */
    public function getPanierParID($idPanier){

    }

    /** - creer un panier vide et l'enregistre dans la base de donnée
        - retourne le panier crée
        - attention à ne pas créer deux panier pour la même personne ! */
   static public function creationPanierVide(){
   }

    public function save(){
        $sql = "INSERT INTO `paniers` (`idPanier`, `date`, `mailUtilisateur`)
                VALUES (:tag_idPanier, :tag_date, :tag_mailUtilisateur)";
        $req_prep = model::getPDO()->prepare($sql);
        $values = array(
            "tag_idPanier" => $this->idPanier,
            "tag_date" => $this->date,
            "tag_mailUtilisateur" => $this->mailUtilisateur
        );
        try {
        $req_prep->execute($values);
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href="indexx.php"> retour a la page d\'accueil </a>';
            die();
        }
    }

    // méthode d'obtention de toutes les produits
    static public function getAllProduitsPanier(){

        $rep = Model::getPDO()->query("SELECT * FROM lignesPanier");  //obtenir une réponse illisible à la requête
        $rep->setFetchMode(PDO::FETCH_ASSOC);        //rendre lisible la réponse en transformant en classe
        return $rep->fetchAll();
    }

//    static public function ajoutProduit($idProduit){
//        if ($this->date == null){
//            $this->date = date("m.d.y");
//            "INSERT INTO 'paniers' ('date') VALUES (getdate())";
//        }
//        if ("SELECT idProduit FROM 'lignesPanier' WHERE idProduit = '$idProduit'" == NULL){
//            $sql = "INSERT INTO `lignesPanier` (`idProduit`, `idPanier`, `quantite`)
//                VALUES ($idProduit, $this->idPanier, 1)";
//        } else {
//            $quantite = "SELECT quantite FROM lignespanier WHERE idProduit = '$idProduit'";
//            "UPDATE lignesPanier SET quantite = '$quantite+1' WHERE idProduit = '$idProduit'";
//        }
//    }


//    /** retourne le panier de la BDD si non existant creation et ajout BDD */
//    static public function chargerPanierUtilisateur($idUtilisateur){
//
//    }



//
//    public static function delete($immat) {
//        $sql = "DELETE FROM voiture WHERE immatriculation=:nom_tag";
//        $req_prep = Model::getPDO()->prepare($sql);
//        $values = array("nom_tag" => $immat);
//        $req_prep->execute($values);
//    }
}
