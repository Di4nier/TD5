<!-- <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD5 Controlleur</title>
</head>
<body> -->

    <?php
    require_once './lib/File.php'; 
    require_once File::build_path(['model','ModelVoiture.php']);


     ; // chargement du modèle
    class ControllerVoiture{
        public static function readAll(){
            $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
            $controller='voiture';
            $view='list';
            $pagetitle='Liste des Voitures';
            require File::build_path(['view','voiture','view.php']); //redirige vers la vue
        }

        public static function read($immat){
            $tab_voit = ModelVoiture::getVoitureByImmat($immat);
            $controller='voiture';
            $view='detail';
            $pagetitle='Info Voiture ' . $immat;
            require File::build_path(['view','voiture','view.php']);
        }

        public static function create(){
            $controller='voiture';
            $view='create';
            $pagetitle='Création Voiture';
            require File::build_path(['view','voiture','view.php']);
        }

        public static function created($i,$m,$c){
            ModelVoiture::Save($i, $m, $c);
            $tab_v = ModelVoiture::getAllVoitures();
            $controller='voiture';
            $view='created';
            $pagetitle='Voiture '. $i . ' Créer !';
            require File::build_path(['view','voiture','view.php']);
        }
    }
    ?>

<!-- </body>
</html> -->