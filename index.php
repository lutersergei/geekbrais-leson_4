<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lesson_4</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">Главная</a></li>
        <li role="presentation"><a href="sum.php">Калькулятор</a></li>
        <li role="presentation"><a href="calculator.php">Продвинутый калькулятор</a></li>
    </ul>
    <div class="container">
        <div class="col-md-12">
            <h1>Урок 4. Запросы HTTP, параметры URL и формы HTML</h1>
            <pre style="font-size: x-large">Пример использования GET</pre>
            <h3>Галерея</h3>
            <?php
            for($i = 1; $i <= 4; $i++)
            {
                echo "<a href = photo.php?id=$i>Фото №$i</a><br/>";
            }
            ?>
        </div>
    </div>
</body>

