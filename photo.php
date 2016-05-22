<?php
error_reporting(E_ALL);
$id = $_GET['id']; // Считываем передаваемый параметр
$image_description=[1 => "Мост днем", 2 => "Мост ночью",3 => "Общий вид днем",4 => "Общий вид ночью"]
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title>Просмотр фото № <?php echo $id;?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <a href="img/<?php echo $id;?>.jpg" target="_blank"><img src="img/<?php echo $id;?>.jpg" alt="photo_<?php echo $id;?>" width="600px"></a>
            <h2><?php echo $image_description[$id] ?></h2>
        </div>
    </div>
</body>
</html>