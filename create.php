<?php
include 'functions.php';
$pdo = connect_db();
$msg = '';

if (!empty($_POST)) {
    $student = isset($_POST['student']) ? $_POST['student'] : '';
    $klas = isset($_POST['klas']) ? $_POST['klas'] : '';
    $minuten = isset($_POST['minuten']) ? $_POST['minuten'] : '';
    $reden = isset($_POST['reden']) ? $_POST['reden'] : '';
    if($minuten<0){
        $msg = 'U heeft een veld op de verkeerde manier ingevuld probeer het opnieuw.';
    }
    elseif(!is_numeric($minuten)){
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
        $sql = "INSERT INTO overzicht_presentie (student, klas, minuten_te_laat, reden) VALUES (?,?,?,?)";
        $pdo->prepare($sql)->execute([$student, $klas, $minuten, $reden]);
        $msg = 'Absentie is aangemaakt!';
    }
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
            <form action="create.php" method="post" class="form_items">
                <label for="name">Student:</label>
                <input type="text" name="student" id="student" class="form_item">
                <label for="email">Klas:</label>
                <input type="text" name="klas" id="klas" class="form_item">
                <label for="phone">Minuten te laat:</label>
                <input type="text" name="minuten" id="minuten" class="form_item">
                <label for="title">Reden:</label>
                <input type="text" name="reden" id="reden" class="form_item">
                <input type="submit" value="Create" class="form_button">  
            </form>
        </div>
        <?php 
        echo $msg;
        ?>
    </div>
</body>
</html>
