<?php
session_start();
include 'database.php';
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $pdo->prepare('DELETE FROM expenses WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location: index.php?id='.$_SESSION['idmod']);
}