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
    <title>2 Задание</title>
</head>
<body>
    <a href="./1.php">На задание  №1!</a>
    <a href="./index.php">На задание №3!</a>
    <?php
       if (isset($_SESSION['name']) && isset($_COOKIE['name'])){
        echo "Ваше имя - ", $_SESSION['name'], " (cудя по сессии)\n";
        echo "Ваше имя - ", $_COOKIE['name'], " (cудя по кукам)";

    }
    ?>
    <!-- 
        2. Написать сценарий прохода формы логина. 
        Есть форма с полями "логин", "пароль", если введенные данные не 
        совпадают с правильными (определенными в текстовом файле), то 
        выводить сообщение об ошибке, если совпадают, то выводить 
        "вы залогинены". Использовать массив глобальных переменных $_POST 
        (метод отправки формы - POST). 
    --> 
    <?php
        $file_user = fopen("user.dat","r");
        $lines = array();
        while(!feof($file_user))  {
            $result = fgets($file_user);
            array_push($lines, $result);
        }
        fclose($file_user);
    ?>
    <?php if (!isset($_POST['submit']) || $_POST['login'] !== trim($lines[0]) || md5(md5($_POST['password'])) !== trim($lines[1]) ) { ?>
        <form method="post">
            <p>Логин: <input type="text" name="login" /></p>
            <p>Пароль: <input type="password" name="password" /></p>
            <p><input type="submit" name="submit"/></p>
        </form>
    <?php }?>

    <?php 
        if(isset($_POST['submit']))  {
            if ($_POST['login'] === trim($lines[0]) && md5(md5($_POST['password'])) === trim($lines[1]) ){
                echo "<p>Вы залогинены!!!</p>";
            } else {
                echo "<p>Ошибка! Неправильно введен логин и/или пароль!</p>";
            }
        }
    ?>
</body>
</html>