<?php 
require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_POST)){
    if(isset($_POST['modele']) && !empty($_POST['modele'])
        && isset($_POST['marque']) && !empty($_POST['marque'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['puissance']) && !empty($_POST['puissance'])){
            $sql = 'INSERT INTO `voitures` (`modele`, `marque`, `annee`, `puissance`) VALUES (:modele, :marque, :annee, :puissance);';
            $query = $connexion->prepare($sql);
            $query->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
            $query->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
            $query->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
            $query->bindValue(':puissance', $_POST['puissance'], PDO::PARAM_INT);
            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: read.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}
    
?>

<h1> Create </h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une voiture </title>
</head>
<body>
    <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
            <h1>Ajouter une voiture</h1>
                <form method="post">
                    <label for="modele">Modèle</label>
                    <input type="text" name="modele" id="modele">
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" id="marque">
                    <label for="annee">Année</label>
                    <input type="number" name="annee" id="annee">
                    <label for="puissance">Puissance</label>
                    <input type="number" name="puissance" id="puissance">
                    <button>Enregistrer</button>
                </form>
            </section>
                </div>

</body>
</html>


//TODO: Créer le formulaire HTML
//TODO: Si formulaire soumi, alors faire la requete d'insertion
//TODO: Bonus : Gérer les erreurs / Le typages des champs / Messages de succès / Message d'Echec / Redirection