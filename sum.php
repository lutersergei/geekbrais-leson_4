<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
error_reporting(E_ALL);
$option_array=[1=>"+",2=>"-",3=>"*",4=>"/"];
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
<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php">Главная</a></li>
    <li role="presentation" class="active"><a href="#">Калькулятор</a></li>
</ul>
<div class="container">
    <div class="col-md-12">
        <form method="post">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <label for="first_number">Первое число</label>
        <input type="text" name="a" id="first_number" placeholder="Введите первое число" value="<?php echo $a ?>"/>
        <select name="operator" id="operator">
            <?php
            for ($i=1; $i<5; $i++)
            {
                if ($i==$_POST['operator'])
                {
                    echo "<option selected value=\"$i\">$option_array[$i]</option>";
                }
                else echo "<option value=\"$i\">$option_array[$i]</option>";
            }
            ?>
        </select>
        <label for="second_number">Второе число</label>
        <input type="text" name="b" id="second_number" placeholder="Введите второе число" value="<?php echo $b ?>"/>
        <input type="submit" value="=" />
        <?php
        if ($result===ERROR_DIVISION_BY_ZERO) echo "Некорректный знаменатель";
        else echo $result;
        ?>
        </form>
    </div>
</div>
</body>
</html>