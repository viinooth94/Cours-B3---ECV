<?php 
require_once 'fonction.ini.php';
$connexion = connexion();

$sql = 'SELECT * FROM `voitures`';
$query = $connexion->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des voitures</title>
</head>
<body>

    <h1>Liste des voitures : </h1>
    <a class="btn-ajout-voiture" href="create.php">Ajouter une voiture</a>
    <table>
        <thead>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Année</th>
            <th>Puissance (en ch)</th>
            <th>Édition</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $voiture){
        ?>
                <tr>
                    <td><?= $voiture['modele'] ?></td>
                    <td><?= $voiture['marque'] ?></td>
                    <td><?= $voiture['annee'] ?></td>
                    <td><?= $voiture['puissance'] ?></td>
                    <td>
                        <a class="btn-voir" href="information.php?id=<?= $voiture['id'] ?>">Voir</a>
                        <a class="btn-modifier" href="update.php?id=<?= $voiture['id'] ?>">Modifier</a>
                        <a class="btn-supprimer" href="delete.php?id=<?= $voiture['id'] ?>">Supprimer</a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>




