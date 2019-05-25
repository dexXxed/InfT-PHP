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
    <title>1 Задание</title>
</head>
<body>
    <a href="./2.php">На задание  №2!</a>
    <a href="./index.php">На задание №3!</a>
    <?php
        if (isset($_SESSION['name']) && isset($_COOKIE['name'])){
            echo "Ваше имя - ", $_SESSION['name'], " (cудя по сессии)\n";
            echo "Ваше имя - ", $_COOKIE['name'], " (cудя по кукам)";

        }
    ?>
     <!--
        1. Написать скрипт подсчета количества показов страницы. 
        Количество посещений хранить в текстовом файле. 
        Использовать функции для работы с файлами (например fread, fwrite, fclose...).
    -->
    <?php
        $f = fopen("statistics.dat", "a+"); // мы открываем файл statistics.dat
        // для чтения и записи, связываем его с файловой переменной $f. 
        flock($f, LOCK_EX); // на время работы данного скрипта (или до ее снятия) блокирует
        // доступ к файлу для других скриптов или копии данного.
        $count = fread($f, 100); // в переменную $count считываем значение счетчика.
        $count++; // засчитываем посещение
        ftruncate($f,0); // очищаем файл
        fwrite($f,$count); // записываем обновленные данные о значении счетчика
        fflush($f); //  принудительно очищаем буфер ввода/вывода для данного файла
        fclose($f); // закріваем файл корректно
    ?>
    <p>Кол-во просмотров данной страницы равно <?php echo $count; ?></p>
</body>
</html>