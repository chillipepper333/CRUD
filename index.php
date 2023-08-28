<?php
include 'functions.php';
$pdo = connect_db();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 6;
$stmt = $pdo->prepare('SELECT * FROM overzicht_presentie ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_contacts = $pdo->query('SELECT COUNT(*) FROM overzicht_presentie')->fetchColumn();
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
                <a href="create.php" class="button">Nieuwe absentie aanmaken</a>
                <img src="img/logo transparent.png" class="logo">
            </div>
        </header>
        <h2>studenten die te laat zijn</h2>
        <div class="table">
            <div class="table_header">
                <div class="item"><a>student</a></div>
                <div class="item"><a>klas</a> </div>
                <div class="item"><a>minuten te laat</a> </div>
                <div class="item"><a>reden</a> </div>
                <div class="edit"> </div>
                <div class="trash"> </div>
            </div>
        
            <?php foreach ($contacts as $contact): ?>
                <div class="row">
                    <div class="item"><?=$contact['student']?></div>
                    <div class="item"><?=$contact['klas']?></div>
                    <div class="item"><?=$contact['minuten_te_laat']?></div>
                    <div class="item"> <?=$contact['reden']?> </div>
                    
                    <a href="edit.php?id=<?=$contact['id']?>" class="edit"><img src="img/edit.png" class="icon"></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><img src="img/trash.png" class="icon"></a>
                </div>    
            <?php endforeach; ?>

            <div class="pagination">         
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?=$page-1?>" class="page_change"><img src="img/left-arrow.png" class="pagi_icon"></a>
                <?php endif; ?>
        
                <?php if ($page*$records_per_page < $num_contacts): ?>
                    <a href="index.php?page=<?=$page+1?>" class="page_change"><img src="img/right-arrow.png" class="pagi_icon"></a>
                <?php endif; ?>     
            </div>
        </div>

    </div>
</body>
</html>

