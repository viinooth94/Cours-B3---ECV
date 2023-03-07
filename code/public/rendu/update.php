<?php 
session_start();
require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['modele']) && !empty($_POST['modele'])
        && isset($_POST['marque']) && !empty($_POST['marque'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['puissance']) && !empty($_POST['puissance'])){
        $id = $_GET['id'];
        $modele = $_POST['modele'];
        $marque = $_POST['marque'];
        $annee = $_POST['annee'];
        $puissance = $_POST['puissance'];


        $sql = "UPDATE `voitures` SET `modele`=:modele, `marque`=:marque, `annee`=:annee, `puissance`=:puissance WHERE `id`=:id;";

        $query = $connexion->prepare($sql);

        $query->bindValue(':modele', $modele, PDO::PARAM_STR);
        $query->bindValue(':marque', $marque, PDO::PARAM_STR);
        $query->bindValue(':annee', $annee, PDO::PARAM_INT);
        $query->bindValue(':puissance', $puissance, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();
        if($query){
            $_SESSION['status'] = 'La '.$modele.' '.$marque.' a été modifiée avec succès !';
        }else{
            $_SESSION['status'] = 'URL invalide !';
        }

        header('Location: read.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `voitures` WHERE `id`=:id;";

    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $voiture = $query->fetch();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier une voiture</title>
</head>
<body>
<h1>Modifier les informations de la <?= $voiture['modele'] ?> </h1>

    <form method="post" id="update_form">
        <p>
            <label for="modele">Modèle</label>
            <input type="text" name="modele" id="modele" value="<?= $voiture['modele'] ?>">
        </p>
        <p>
            <label for="marque">Marque</label>
            <input type="text" name="marque" id="marque" value="<?= $voiture['marque'] ?>">
        </p>
        <p>
            <label for="annee">Année</label>
            <input type="number" name="annee" id="annee" value="<?= $voiture['annee'] ?>">
        </p>
        <p>
            <label for="puissance">Puissance</label>
            <input type="number" name="puissance" id="puissance" value="<?= $voiture['puissance'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <p><a class="btn-retour" href="read.php">Retour</a></p>
        <input type="hidden" name="id" value="<?= $voiture['id'] ?>">
    </form>
</body>
</html>
