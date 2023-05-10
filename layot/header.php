<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зоомагазин</title>
    <link rel="icon" type="image/x-icon" href="/sourse/images.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <header>
        <nav>
            <div class="nav-item"><a href="http://localhost/petshop/index.php?action=mainpage">Домашня сторінка</a></div>
            <div class="nav-item"><a href="http://localhost/petshop/index.php?action=procedures">Процедури</a></div>
            <div class="nav-item"><a href="http://localhost/petshop/index.php?action=shop">Магазин</a> </div>
            <div class="nav-item"><a href="http://localhost/petshop/index.php?action=cart">Кошик</a> </div>
            
            
            <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) { ?>
                <div class="nav-item"><a href="index.php?action=login">Увійти</a> </div>
                <?php } else { ?>
                    <div class="nav-item"><a href="index.php?action=logout">Вийти</a> </div>
                    <div class="nav-item"><a href="index.php?action=addNewGoods">Адмін панель</a> </div>
                <?php } ?>

        </nav>
    </header>