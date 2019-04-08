<?php
    include 'base.php';
    include 'form-handler.php';
    if($messages['success'] == true) {
        header('location:index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Login</a></li>
            <!-- <li><a href="register.php">Register</a></li> -->
        </ul>
    </header>
    <main>
        <form  method="post">
            <div>
                <label for="login">Entrer mon pseudo: </label>
                <input type="text" name="login" placeholder="pseudo">
            </div>
            <div>
                <label for="password">Entrer mon mots de passe: </label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <label for="mail">Entrer mon mail: </label>
                <input type="email" name="mail" placeholder="mail@boite.com">
            </div>
            <input type="submit" value="submit">
        </form>
        <?php foreach($messages['error'] as $_message): ?>
            <div class="message error">
                <?= $_message ?>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>