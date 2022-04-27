<?php
require_once(File::build_path(array("model", "Model.php")));

class ModelPanier {

    private $idPanier;
    private $date;
    private $mailUtilisateur;


    // un constructeur
    public function __construct($mailUtilisateur = NULL){
        if (!is_null($mailUtilisateur)) {
//            $this->idPanier = $idPanier;
//            $this->date = $date;
            $this->mailUtilisateur = $mailUtilisateur;
        }
    }




    // méthode d'obtention de toutes les produits
    static public function getAllProduitsPanier(){

        $rep = Model::getPDO()->query("SELECT * FROM lignesPanier");  //obtenir une réponse illisible à la requête
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');        //rendre lisible la réponse en transformant en classe
        return $rep->fetchAll();
    }

//    /** retourne le panier de la BDD si non existant creation et ajout BDD */
//    static public function chargerPanierUtilisateur($idUtilisateur){
//
//    }

//
//    public static function getVoitureByImmat($immat) {
//        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
//        // Préparation de la requête
//        $req_prep = Model::getPDO()->prepare($sql);
//
//        $values = array(
//            "nom_tag" => $immat,
//            //nomdutag => valeur, ...
//        );
//        // On donne les valeurs et on exécute la requête
//        $req_prep->execute($values);
//
//        // On récupère les résultats comme précédemment
//        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
//        $tab_voit = $req_prep->fetchAll();
//        // Attention, si il n'y a pas de résultats, on renvoie false
//        if (empty($tab_voit))
//            return false;
//        return $tab_voit[0];
//    }
//
//
//    public function save(){
//        $sql = "INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`)
//                VALUES (:tag_immatriculation, :tag_marque, :tag_couleur)";
//        $req_prep = model::getPDO()->prepare($sql);
//        $values = array(
//            "tag_marque" => $this->marque,
//            "tag_immatriculation" => $this->immatriculation,
//            "tag_couleur" => $this->couleur
//        );
//
//        try {
//        $req_prep->execute($values);
//        } catch (PDOException $e) {
//            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
//            die();
//        }
//    }
//
//    public static function delete($immat) {
//        $sql = "DELETE FROM voiture WHERE immatriculation=:nom_tag";
//        $req_prep = Model::getPDO()->prepare($sql);
//        $values = array("nom_tag" => $immat);
//        $req_prep->execute($values);
//    }
}
