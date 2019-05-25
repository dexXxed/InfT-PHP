<?php 
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
    <a href="./1.php">На задание  №1!</a>
    <a href="./2.php">На задание №2!</a>

    <!-- 
        На первой страничке сайта разместить форму для ввода имени пользователя.
        После того как пользователь отправил "имя пользователя", 
        зарегистрировать новую переменную в сессии со значением этого имени. 
        При переходе на другие странички - выводить это имя.
        Использовать функции для работы с сессиями (session_start)
        и массив глобальных переменных $_SESSION. 
    -->
    <?php if(!isset($_SESSION['name']) || !isset($_COOKIE['name'])): ?>
        <form method="post">
            <p>Введите имя пользователя: <input type="text" name="name" required></p>
            <p><input type="submit" name="sub"></p>
        </form>
    <?php endif; ?>

    <?php
        if (isset($_POST['sub']) && isset($_POST['name'])){
            $_SESSION['name'] = $_POST['name'];
            setcookie('name',$_POST['name']);
        }
        if (isset($_SESSION['name']) && isset($_COOKIE['name'])){
            echo "Ваше имя - ", $_SESSION['name'], " (cудя по сессии)\n";
            echo "Ваше имя - ", $_COOKIE['name'], " (cудя по кукам)";

        }
    ?>
</body> 
</html>