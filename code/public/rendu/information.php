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
    <link rel="stylesheet" href="style.css">
    <title>Détails de la voiture</title>
</head>
<body>
<main>
    <h1>Information concernant la <?= $voiture['modele'] ?></h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Année</th>
            <th>Puissance (en ch)</th>
            <th>Édition</th>
        </thead>
        <tbody>
        <tr>
            <td><?= $voiture['id'] ?></td>
            <td><?= $voiture['modele'] ?></td>
            <td><?= $voiture['marque'] ?></td>
            <td><?= $voiture['annee'] ?></td>
            <td><?= $voiture['puissance'] ?></td>
            <td>
                        <a class="btn-modifier" href="update.php?id=<?= $voiture['id'] ?>">Modifier</a>
                        <a class="btn-supprimer" href="delete.php?id=<?= $voiture['id'] ?>">Supprimer</a>
                    </td>
                </tr>
                 
                </tbody>
    </table>
    <a class="btn-retour" href="read.php">Retour</a>
    </main>
</body>
</html>
