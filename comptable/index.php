<?php
    session_start ();
    include 'database.php';
    include 'verif.php';
    include 'form.php';
    include 'extract.php';

    global $expenses;
    global $expensesSum;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon comptable en ligne</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title"><h1>Ajouté mes dépenses (<?php echo $_SESSION['login']?>) - </h1>
    <p><a href="../logout.php">Logout</a></p></div>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="coins">Montant</label>
                </div>
                <div class="col-75">
                    <input type="number" name="coins" step="0.01">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <input type="text" name="description">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
        <div class="message" style="color:<?php if(isset($color)) { echo $color; } ?>">
            <?php if(isset($message)) { echo $message; } ?></div>
    </div>

    <h1>Récapitulatif</h1>

    <table class="recap">
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Montant</th>
        </tr>

        <?php foreach($expenses as $_expense): ?>
        <tr>
            <td><?= $_expense->date_time ?></td>
            <td><?= $_expense->description ?></td>
            <td><?= $_expense->amount ?> €</td>
            <td class='delete'><a href="<?= 'delete.php?id='.$_expense->id ?>">X</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <?php foreach($expensesSum as $Sum): ?>
            <td><?= number_format($Sum->total, 2); ?> €</td>
            <?php endforeach; ?>
        </tr>
    </table>


</body>

</html>