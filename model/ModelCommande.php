<?php
require_once(File::build_path(array("model", "Model.php")));

class ModelCommande
{
    private $idCommande;
    private $mailUtilisateur;
    private $date;
    private $lignesCommande;


    public function __construct($idCommande, $mailUtilisateur, $date, $lignesCommande)
    {
        $this->idCommande = $idCommande;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->date = $date;
        $this->lignesCommande = $lignesCommande;
    }

    /** renvoies un objet Commande correspondant à l'id
     * retourne faux si aucun id ne correspond à celui demandé */
    static public function getCommandeParId($idCommande)
    {
        $sql = "SELECT * from Commandes WHERE idCommande=:idCommande";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("idCommande" => $idCommande);
        $req_prep->execute($values);
        $tab = $req_prep->fetchAll()[0];
        if (empty($tab))
            return false;
        $tab_produits = self::getAllProduitsCommande($idCommande);
        return new ModelCommande($idCommande, $tab['mailUtilisateur'], $tab['date'], $tab_produits);
    }

    /** Retourne un tableau des produits présents dans la Commande en BDD
     * le tableau est indexé par idProduit avec une quantité associée */
    static public function getAllProduitsCommande($idCommande)
    {
        $sql = "SELECT idProduit, quantite FROM lignesCommande WHERE idCommande = :idCommande";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array('idCommande' => $idCommande);
        $req_prep->execute($values);
        $res = [];
        foreach ($req_prep->fetchAll() as $ligne) {
            $res[$ligne['idProduit']] = $ligne['quantite'];
        }
        return $res;
    }

    /** retourne un tableau d'objets commandes appartenant au mailUtilisateur passé en paramètre
        Le tableau est indicé par les idCommandes  */
    static public function getAllCommandes($mailUtilisateur){
        $sql = "SELECT idCommande FROM Commandes WHERE mailUtilisateur = :mailUtilisateur";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array('mailUtilisateur' => $mailUtilisateur);
        $req_prep->execute($values);
        $res = [];
        foreach ($req_prep->fetchAll() as $idCommande) {
            $res[$idCommande[0]] = self::getCommandeParId($idCommande[0]);
        }
        return $res;
    }


}