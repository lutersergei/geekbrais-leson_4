<?php
if(isset($_POST['a']) && isset($_POST['b']))
    $result = $_POST['a'] + $_POST['b'];
else
    $result = "";
?>
<html>
<head>
    <title>Галерея изображений</title>
</head>
<body>
<form method="post">
    <input type="text" name="a" />
    +
    <input type="text" name="b" />
    <input type="submit" value="=" />
    <?php echo $result; ?>
</form>
</body>
</html>