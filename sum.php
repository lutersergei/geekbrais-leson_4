<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
error_reporting(E_ALL);
define('ERROR_DIVISION_BY_ZERO',"zero" );
$a="";
$b="";
$result = "";
if(isset($_POST['a']) && isset($_POST['b']))
{
    $a=(int)$_POST['a'];
    $b=(int)$_POST['b'];
    if ($_POST['operator']=='1')
    {
        $result = $a + $b;
    }
    elseif ($_POST['operator']=='2')
    {
        $result = $a - $b;
    }
    elseif ($_POST['operator']=='3')
    {
        $result = $a * $b;
    }
    elseif ($_POST['operator']=='4')
    {
        if ($b==0)
        {
            $result=ERROR_DIVISION_BY_ZERO;
        }
        else $result = $a / $b;
    }
}
?>
<body>
<form method="post">
    <label for="first_number">Первое число</label>
    <input type="text" name="a" id="first_number" value="<?php echo $a ?>"/>
    <select name="operator" id="operator">
        <option value="1">+</option>
        <option value="2">-</option>
        <option value="3">*</option>
        <option value="4">/</option>
    </select>
    <label for="second_number">Второе число</label>
    <input type="text" name="b" id="second_number" value="<?php echo $b ?>"/>
    <input type="submit" value="=" />
    <?php
    if ($result===ERROR_DIVISION_BY_ZERO) echo "Некорректный знаменатель";
    else echo $result;
    ?>
</form>
</body>
</html>