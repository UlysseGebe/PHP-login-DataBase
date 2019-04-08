<?php
if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $get_id = ((((htmlspecialchars($_GET['id'])/111)-666)/2));
        $users = $pdo->prepare('SELECT * FROM `connexion` WHERE id = ?');
        $users->execute(array($get_id));
        if($users->rowCount() !== 1) {
            die('Cet identifiant n\'existe pas !'.$get_id);
        }
        else{
            if (is_null($_SESSION['login']) && is_null($_SESSION['password'])) {
                // On teste pour voir si nos variables ont bien été enregistrées
                echo 'Les variables ne sont pas déclarées.';
                // On démarre la session
                session_start ();

                // On détruit les variables de notre session
                session_unset ();

                // On détruit notre session
                session_destroy ();

                // On redirige le visiteur vers la page d'accueil
                header ('location: ../index.php');
            }
        }
    } 
    else {
        die('Erreur');
    }