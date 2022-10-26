<!-- <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Création</title>
</head>
<body> -->
  <?php
  require_once './lib/File.php';

  ?>

    <form method="get" action="index.php">
        <fieldset>
          <legend>Mon formulaire :</legend>
          <p>
            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="Ex : Tesla" name="marque" id="marque_id" required/>
          </p>
          <p>
            <label for="couleur_id">Couleur</label> :
            <input type="text" placeholder="Ex : Noire" name="couleur" id="couleur_id" required/>
          </p>
          <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="Ex : 256AB34" name="immat" id="immat_id" required/>
          </p>
          <p>
            <input type="submit" value="Envoyer" formmethode="action" />
            <input type="hidden" name="action" value="created">
          </p>
        </fieldset> 
      </form>
      
    
<!-- </body>
</html> -->