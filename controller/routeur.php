<?php
require_once File::build_path(['controller','ControllerVoiture.php']);
// On recupère l'action passée dans l'URL
$action = $_GET["action"];

if($action == "created"){
    $marque = $_GET['marque'];
    $couleur = $_GET['couleur'];
    $immat = $_GET['immat'];
    ControllerVoiture::created($immat,$marque,$couleur);
}
elseif($action == "create"){
    ControllerVoiture::create();
}
elseif($action == "read"){
    $immat = $_GET['immat'];
    ControllerVoiture::read($immat);
}else{
    if($action == "readall"){
        ControllerVoiture::readAll();
    }
}


// Appel de la méthode statique $action de ControllerVoiture
?>