<?php
    include 'base.php';
    include 'handler.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <!-- <li><a href="login.php">Login</a></li> -->
            <li><a href="register.php">Register</a></li>
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
            <input type="submit" value="submit">
        </form>
        <?php foreach($messages['error'] as $_message): ?>
            <div class="message error">
                <?= $_message ?>
            </div>
        <?php endforeach; ?>
        <?php foreach($messages['success'] as $_message): ?>
            <div class="message success">
                <?= $_message ?>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>