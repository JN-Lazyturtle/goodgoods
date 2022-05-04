<?php
require_once(File::build_path(array("model", "Model.php")));

class ModelPanier {

    private $idPanier;
    private $mailUtilisateur;
    private $date;
    private $lignesPanier;


    public function __construct($idPanier = NULL, $mailUtilisateur = NULL, $date = NULL, $lignesPanier = NULL){
        if (!is_null($mailUtilisateur) && !is_null($idPanier) && !is_null($date)) {
            $this->idPanier = $idPanier;
            $this->mailUtilisateur = $mailUtilisateur;
            $this->date = $date;
        }
        if(is_null($lignesPanier)){$this->lignesPanier = [];}
        else {$this->lignesPanier = $lignesPanier;}
    }

    /**  Retourne un objet panier avec les infos de la base de données */
    static public function getPanierParMail($mailUtilisateur){
        $sql = "SELECT idPanier, date FROM paniers WHERE mailUtilisateur = :mail";
        $req_prep = model::getPDO()->prepare($sql);
        $values = array('mail' => $mailUtilisateur);
        $req_prep->execute($values); // ici sont stockés l'id panier et la date
        $res = $req_prep->fetchAll()[0];
        if (empty($res)){
            self::creationPanierVide();
            self::getPanierParMail($mailUtilisateur);
        }
        else {
            $tab_produits = ModelPanier::getAllProduitsPanier($res['idPanier']);
            return new ModelPanier($res['idPanier'], $mailUtilisateur, $res['date'], $tab_produits);
        }
    }

    /** - creer un panier vide et l'enregistre dans la base de donnée
        - attention à ne pas créer deux panier pour la même personne ! */
   static public function creationPanierVide($mailUtilisateur){
       // creation du panier dans la BDD
       $sql = "INSERT INTO `paniers` (`mailUtilisateur`)
                VALUES (:tag_mailUtilisateur)";
       $req_prep = model::getPDO()->prepare($sql);
       $values = array(
           "tag_mailUtilisateur" => $mailUtilisateur
       );
       $req_prep->execute($values);
   }

    /** Retourne un tableau des produits présents dans le panier en BDD
        le tableau est indexé par idProduit avec une quantité associée */
    static public function getAllProduitsPanier($idPanier){
        $sql = "SELECT idProduit, quantite FROM lignesPanier WHERE idPanier = :idPanier";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array('idPanier' => $idPanier);
        $req_prep->execute($values);
        $res = [];
        foreach ($req_prep->fetchAll() as $ligne){
            $res[$ligne['idProduit']] = $ligne['quantite'];
        }
        return $res;
    }


    public function getIdPanier()
    {
        return $this->idPanier;
    }

    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLignesPanier()
    {
        return $this->lignesPanier;
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
