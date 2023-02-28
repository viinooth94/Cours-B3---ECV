<?php

require_once 'fonction.ini.php';

$connexion = connexion(); 

if(isset($_POST['username']) && !empty($_POST['username'])){
    //TODO Check si l'utilisateur existe dans la base

    $connexion -> query('select * from users where username='.$_POST['username'].'and password='.$_POST['password']);
    HelloWorld($_POST['username']);
    var_dump($_POST);
}
echo 'Bonjour '.$_GET['username'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form method="POST" action=".">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        
        <button type="submit">Connexion</button>

    </form>
    
</body>
</html>