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
    $mail = trim($_POST['mail']);
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
    else if(strlen($password) < 8)
    {
        $messages['error'][] = 'Password too short';
    }

    if(empty($mail))
    {
        $messages['error'][] = 'Missing mail';
    }

    if (empty($messages['error'])) {
        $query = $pdo->query('
            SELECT 
                `mail`, `login`
            FROM 
                `connexion`
        ');

        $users = $query -> fetchAll();

        foreach ($users as $_user) {
            if (($_user -> login) === $login ) {
                $messages['error'][] = "The pseudo already exist";
            }
            if ($_user -> mail === $mail ) {
                $messages['error'][] = "The mail already exist";
            }
        }
    }

    // Check success
    if(empty($messages['error']))
    {

        $prepare = $pdo->prepare('
            INSERT INTO
                connexion (mail, login, password)
            VALUES
                (:mail, :login, :password)
        ');

        $prepare -> bindValue('mail', $mail);
        $prepare -> bindValue('login', $login);
        $prepare -> bindValue('password', $password);

        $execute = $prepare -> execute();

        if (!$execute) {
            $messages['error'][] = 'An error occured';
        }

        $messages['success'][] = 'All good';

        $_POST['mail'] = '';
        $_POST['login'] = '';
        $_POST['password'] = '';
    }
}
else
{
    $_POST['mail'] = '';
    $_POST['login'] = '';
    $_POST['password'] = '';
}