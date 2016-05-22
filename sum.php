<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
error_reporting(E_ALL);
$operator_array=[1=>"+",2=>"-",3=>"*",4=>"/"];
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
//else $result="Введите оба числа";
?>
<body>
<div class="container">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="index.php">Главная</a></li>
            <li role="presentation" class="active"><a href="#">Калькулятор</a></li>
            <li role="presentation"><a href="calculator.php">Продвинутый калькулятор</a></li>
        </ul>
        <form method="post">
        <fieldset><legend>Калькулятор</legend>
        <table>
            <tr>
                <td><label for="first_number">Первое число</label></td>
                <td></td>
                <td><label for="second_number">Второе число</label></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" name="a" id="first_number" placeholder="Введите первое число" value="<?php echo $a ?>"/></td>
                <td><select name="operator" id="operator">
                        <?php
                        for ($i=1; $i<5; $i++)
                        {
                            if ($i==$_POST['operator'])
                            {
                                echo "<option selected value=\"$i\">$operator_array[$i]</option>";
                            }
                            else echo "<option value=\"$i\">$operator_array[$i]</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" name="b" id="second_number" placeholder="Введите второе число" value="<?php echo $b ?>"/></td>
                <td><input type="submit" value="=" /></td>
            </tr>
            <tr>
                <td colspan="3"><?php
                    if ($result===ERROR_DIVISION_BY_ZERO) echo "Некорректный знаменатель";
                    else echo "<strong>Реузьтат: $result</strong>";
                    ?></td>
            </tr>
        </table>
        </fieldset>
        </form>
    </div>
</div>
</body>
</html>