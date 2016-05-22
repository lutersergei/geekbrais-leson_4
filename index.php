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
    <div class="container">
        <div class="col-md-12">
            <h1>Урок 4. Запросы HTTP, параметры URL и формы HTML</h1>
            <pre><h2>Пример использования GET</h2></pre>
            <h3>Галерея</h3>
            <?php
            for($i = 1; $i <= 4; $i++)
            {
                echo "<a href = photo.php?id=$i target=\"_blank\">Фото №$i</a><br/>";
            }
            ?>
        </div>
    </div>
</body>

