<?php 
 require_once 'fonction.ini.php';

 $connexion = connexion();

if(isset($_GET['id']) && !empty($_GET['id'])){
   
    $sql = 'SELECT * FROM `voitures` WHERE `id` = :id;';

    $id = strip_tags($_GET['id']);

    $query = $connexion->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $voiture = $query->fetch();

    // On vérifie si le produit existe
//     if(!$voiture){
//         $_SESSION['erreur'] = "Cet id n'existe pas";
//         header('Location: read.php');
// }else{
//     $_SESSION['erreur'] = "URL invalide";
//     header('Location: read.php');
// }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la voiture</title>
</head>
<body>
<main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Information concernant la <?= $voiture['modele'] ?></h1>
                <p>ID : <?= $voiture['id'] ?></p>
                <p>Modèle : <?= $voiture['modele'] ?></p>
                <p>Marque : <?= $voiture['marque'] ?></p>
                <p>Année : <?= $voiture['annee'] ?></p>
                <p>Puissance : <?= $voiture['puissance'] ?></p>
                <p><a href="read.php">Retour</a> <a href="update.php?id=<?= $produit['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>
