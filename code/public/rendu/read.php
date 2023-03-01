<?php 
require_once 'fonction.ini.php';
$connexion = connexion();

$sql = 'SELECT * FROM `voitures`';
$query = $connexion->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>je suis connecter</h1>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures</title>
</head>
<body>

    <h1>Liste des Voitures</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Année</th>
            <th>Puissance</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $voiture){
        ?>
                <tr>
                    <td><?= $voiture['id'] ?></td>
                    <td><?= $voiture['Modele'] ?></td>
                    <td><?= $voiture['Marque'] ?></td>
                    <td><?= $voiture['Annee'] ?></td>
                    <td><?= $voiture['Puissance'] ?></td>
                    <td><a href="information.php?id=<?= $produit['id'] ?>">Voir</a>  <a href="update.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="add.php">Ajouter</a>
</body>
</html>



//TODO : Faire la requete Select pour avoir les bonnes données
//TODO : Faire le HTML avec  la boucle d'affichage des données
