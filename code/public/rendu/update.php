<?php 
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

        header('Location: read.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `voitures` WHERE `id`=:id;";

    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}
?>

<h1> Update </h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Modifier les informations d'un vehicules</h1>
    <form method="post">
        <p>
            <label for="modele">Modèle</label>
            <input type="text" name="modele" id="modele" value="<?= $result['modele'] ?>">
        </p>
        <p>
            <label for="marque">Marque</label>
            <input type="text" name="marque" id="marque" value="<?= $result['marque'] ?>">
        </p>
        <p>
            <label for="annee">Année</label>
            <input type="number" name="annee" id="annee" value="<?= $result['annee'] ?>">
        </p>
        <p>
            <label for="puissance">Puissance</label>
            <input type="number" name="puissance" id="puissance" value="<?= $result['puissance'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <p><a href="read.php">Retour</a></p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>

//Todo : Récupérer l'id depuis l'url
//TODO : Remplir le forumaire HTML avec les valeur récupérées depuis la requete correspondante
//TODO: Penser a mettre un input hidden pour l'ID
//TODO: mettre a jour le contenu avec une requete correspondante. 
//TODO: Bonus : Gérer les erreurs / Le typages des champs / Messages de succès / Message d'Echec / Redirection