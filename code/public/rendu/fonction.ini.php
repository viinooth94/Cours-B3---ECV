<?php

require 'config.ini.php';

function connexion(){

    try{
        $pdo = new PDO('mysql:host='.HOTE.';port='.PORT.';dbname='.BASE, USERNAME, MDP);
    $pdo->exec("SET CHARACTER SET utf8");

    var_dump($pdo);
    return $pdo;
    }catch(PDOException $e){
        echo 'Probleme de connexion'.$e->getMessage();
        return false;
    }

}

function HelloWorld($string){
    echo 'bonjour '.$string;
}







?>