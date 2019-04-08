<?php

// Error and success messages
$messages = [
    'error' => [],
    'success' => [],
];

// Form sent
if(!empty($_POST))
{

    // Get data
    $login = trim($_POST['login']);
    $password = md5($_POST['password']);

    // Check errors

    if(empty($login))
    {
        $messages['error'][] = 'Missing login';
    }

    if(empty($password))
    {
        $messages['error'][] = 'Missing password';
    }

    // Check success
    if(empty($messages['error']))
    {

        $query = $pdo->query('
            SELECT 
                `id`, `login`, `password` 
            FROM 
                `connexion`
        ');

        $users = $query -> fetchAll();

        if (!$query) {
            $messages['error'][] = 'An error occured';
        }
        $messages['success'][] = 'Rong';

        if($messages['success'] == true) {
            foreach ($users as $_user) {
                if (($_user -> login) === $login ) {
                    if ($_user -> password === $password ) {
                        $id = $_user -> id;
                        session_start();
                        $id = ((($id)*2)+666)*111;
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['password'] = $_POST['password'];
                        $_SESSION['idmod'] = $id;
                        header('location:comptable/index.php?id='.$id);
                        exit();
                    }
                }
            }
        }

        $_POST['login'] = '';
        $_POST['password'] = '';
    }
}
else
{
    $_POST['login'] = '';
    $_POST['password'] = '';
}