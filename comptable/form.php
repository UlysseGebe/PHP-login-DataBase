<?php
if(isset($_POST['coins'], $_POST['description'])) {
        if(!empty($_POST['coins']) AND !empty($_POST['description']))
      {
        $data = [
            'valeur' => trim($_POST['coins']),
            'description' => trim($_POST['description']),
            'id_client' => $get_id,
        ];
    
        $prepare = $pdo->prepare('
        INSERT INTO `expenses` (amount, description, date_time, id_client)
        VALUES (:valeur, :description, NOW(), :id_client)
        ');
        $prepare->execute($data);
        $message = 'Votre montant a bien été ajouté';
        $color = 'green';
        }
        else {
           $message = 'Veuillez remplir tous les champs';
           $color = 'red';
        }
}