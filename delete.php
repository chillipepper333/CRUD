<?php
include 'functions.php';
$pdo = connect_db();
$msg = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM overzicht_presentie WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'Ja') {
            $stmt = $pdo->prepare('DELETE FROM overzicht_presentie WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
        } else {
            header('Location: index.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header_items">
                <a href="index.php" class="button">terug</a>
                <img src="img/logo transparent.png" class="logo">
            </div>
        </header>
        <div class="content">
            <?php if ($msg): ?>
            <p><?=$msg?></p>
            <?php else: ?>
            <p>Weet je zeker dat je absentie melding <?=$contact['id']?> wil verwijderen? </p>
            <div class="prompt">
                <a href="delete.php?id=<?=$contact['id']?>&confirm=Ja" class="prompt_awsner">Ja</a>  
                <a href="delete.php?id=<?=$contact['id']?>&confirm=Nee" class="prompt_awsner">Nee</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>