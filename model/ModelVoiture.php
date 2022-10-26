<?php

  require_once File::build_path(['model','Model.php']);

class ModelVoiture {
   
  private $marque;
  private $couleur;
  private $immatriculation;
      
  // un getter      
  public function getMarque() {
       return $this->marque;  
  }
     
  // un setter 
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }

  // un getter      
  public function getCouleur() {
    return $this->couleur;  
}
  
// un setter 
public function setCouleur($couleur2) {
    $this->couleur = $couleur2;
}

// un getter      
public function getImmatriculation() {
    return $this->immatriculation;  
}
  
// un setter 
public function setImmatriculation($immatriculation2) {
  if(strlen($immatriculation) < 8){
    $this->immatriculation = $immatriculation2;
  }
}
      
  // un constructeur
  public function __construct($m = NULL, $c = NULL, $i = NULL)  {
    if(!is_null($m) && !is_null($c) && !is_null($i)){
      $this->marque = $m;
      $this->couleur = $c;
      $this->immatriculation = $i;
    }
   
  } 

  public static function getAllVoitures(){

    $_REQUEST ="SELECT * from voiture";
    $rep = Model::$pdo->query($_REQUEST);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
  }

  public static function getVoitureByImmat($immat) {
    $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
    "nom_tag" => $immat,
    //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête
    $req_prep->execute($values);
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit)){
      require File::build_path(['view','voiture','error.php']);
      return false;
    }
    else{
      return $tab_voit;
    }
  }
  
  // une methode d'affichage.
  // public function afficher() {
  //   echo $this->getMarque(); 
  //   echo "<br>";
  //   echo $this->getCouleur();
  //   echo "<br>";
  //   echo $this->getImmatriculation();
  // }

  static public function Save($i, $m, $c)
  {
      $sql = "INSERT INTO voiture(Immatriculation, Marque, Couleur) VALUES(:tag1, :tag2, :tag3);";
      $prep = Model::$pdo->prepare($sql);
      $values = array(
          "tag1" => $i,
          "tag2" => $m,
          "tag3" => $c,
      );
      $prep->execute($values);
  }


}

?>
