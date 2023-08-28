<?php
include 'functions.php';
$pdo = connect_db();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $student = isset($_POST['student']) ? $_POST['student'] : '';
        $klas = isset($_POST['klas']) ? $_POST['klas'] : '';
        $minuten_te_laat = isset($_POST['minuten_te_laat']) ? $_POST['minuten_te_laat'] : '';
        $reden = isset($_POST['reden']) ? $_POST['reden'] : '';
        if($minuten_te_laat<0){
            $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
        }
        elseif(!is_numeric($minuten_te_laat)){
            $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
        } 
        elseif($student == null){
            $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
        }
        elseif($reden == null){
            $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
        }
        elseif($klas == null){
            $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
        }
        else{
            $stmt = $pdo->prepare('UPDATE overzicht_presentie SET student = ?, klas = ?, minuten_te_laat = ?, reden = ? WHERE id = ?');
            $stmt->execute([$student, $klas, $minuten_te_laat, $reden, $id]);
            $msg = 'Update is gelukt!';
        }
    }
    $stmt = $pdo->prepare('SELECT * FROM overzicht_presentie WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
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
                <a href="index.php" class="button">Terug </a>
                <img src="img/logo transparent.png" class="logo">
            </div>
        </header>
        <div class="forms">
            <form action="edit.php?id=<?=$contact['id']?>" method="post" class="form_items">
                <input type="hidden" name="id" value="<?=$contact['id']?>" id="id">
                <label for="name">Student:</label>
                <input type="text" name="student" id="student" value="<?=$contact['student']?>" class="form_item">
                <label for="email">Klas:</label>
                <input type="text" name="klas" id="klas" value="<?=$contact['klas']?>" class="form_item">
                <label for="phone">Minuten te laat:</label>
                <input type="text" name="minuten_te_laat" id="minuten_te_laat" value="<?=$contact['minuten_te_laat']?>" class="form_item">
                <label for="title">Reden:</label>
                <input type="text" name="reden" id="reden" value="<?=$contact['reden']?>" class="form_item">
                <input type="submit" value="Edit" class="form_button">  
            </form>
            <?php if ($msg): ?>
            <p><?=$msg?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>