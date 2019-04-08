<?php
$data = [
    'id_client' => $get_id,
];
$prepare = $pdo->prepare('
SELECT * FROM expenses WHERE id_client = :id_client ORDER BY id DESC');
$prepare->execute($data);
$expenses = $prepare->fetchAll();

$querySum = $pdo->prepare('
SELECT SUM(amount) AS total FROM expenses WHERE id_client = :id_client');
$querySum->execute($data);
$expensesSum = $querySum->fetchAll();