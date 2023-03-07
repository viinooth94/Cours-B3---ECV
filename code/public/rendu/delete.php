<?php
session_start();
require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `voitures` WHERE `id`=:id;";

    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $voiture = $query->fetch();

    if(!$voiture){
        $_SESSION['message'] = 'La voiture '.$id.' a été supprimée avec succès !';
        header('Location: read.php');
    }else{
        $_SESSION['message'] = 'URL invalide !';
        header('Location: read.php');
    }
}

?>

