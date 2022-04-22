<?php
require(File::build_path(array("model", "Model.php")));

class ModelPanier {

    private $idProduit;
    private $nom;
    private $prix;
    private $description;

    // getteur
    public function getidProduit(){
        return $this->idProduit;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getDescription(){
        return $this->description;
    }


    // un constructeur
    public function __construct($idProduit = NULL, $nom = NULL, $prix = NULL, $description = NULL){
        if (!is_null($idProduit) && !is_null($nom) && !is_null($prix) && !is_null($description)) {
            $this->idProduit = $idProduit;
            $this->nom = $nom;
            $this->prix = $prix;
            $this->description = $description;
        }
    }


//    // affichage
//    public function afficher(){
//        echo "<p>Voiture \""."\" de la marque ".$this->nom." (couleur ".$this->description.").</p>";
//    }


    // méthode d'obtention de toutes les produits
    static public function getAllProduits(){

        $rep = Model::getPDO()->query("SELECT * FROM produits");  //obtenir une réponse illisible à la requête
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');        //rendre lisible la réponse en transformant en classe
        return $rep->fetchAll();
    }


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
