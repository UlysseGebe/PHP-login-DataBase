<?php
    session_start ();
    include 'base.php';
    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $get_id = ((((htmlspecialchars($_GET['id'])/111)-666)/2));
        $users = $pdo->prepare('SELECT * FROM `connexion` WHERE id = ?');
        $users->execute(array($get_id));
        if($users->rowCount() !== 1) {
            die('Cet identifiant n\'existe pas !'.$get_id);
        }
        else{
            if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                // On teste pour voir si nos variables ont bien été enregistrées
                echo '<html>';
                echo '<head>';
                echo '<title>Page de notre section membre</title>';
                echo '</head>';
            
                echo '<body>';
                echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['password'].'.';
                echo '<br />';
            
                // On affiche un lien pour fermer notre session
                echo '<a href="logout.php">Déconnection</a>';
            }
            else {
                echo 'Les variables ne sont pas déclarées.';
            }
        }
    } 
    else {
        die('Erreur');
    }