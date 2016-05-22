<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
error_reporting(E_ALL);
define('ERROR_DIVISION_BY_ZERO',"zero" );
define('SUMMA',1 );
define('DIFFERENCE',2 );
define('MULTIPLIC',3 );
define('DIVISION',4 );
$operator_array=[SUMMA=>"+",DIFFERENCE=>"-",MULTIPLIC=>"*",DIVISION=>"/"];
$a=false;
$b=false;
$result = "";
if(isset($_POST['a']) && isset($_POST['b']))
{
    $a=$_POST['a'];
    $b=$_POST['b'];
    if ($_POST['operator']==SUMMA)
    {
        $result = $a + $b;
    }
    elseif ($_POST['operator']==DIFFERENCE)
    {
        $result = $a - $b;
    }
    elseif ($_POST['operator']==MULTIPLIC)
    {
        $result = $a * $b;
    }
    elseif ($_POST['operator']==DIVISION)
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
        <fieldset><legend style="font-size: 35px">Калькулятор</legend>
        <table>
            <tr>
                <td><label for="first_number">Первое число</label></td>
                <td></td>
                <td><label for="second_number">Второе число</label></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" class="form-control" name="a" id="first_number"  placeholder="Введите первое число" value="<?php if ($a!==false)echo $a ?>"/></td>
                <td><select class="form-control" name="operator" id="operator" style="margin: 0 5px">
                        <?php
                        for ($i=1; $i<=4; $i++)
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
                <td><input type="text" class="form-control" name="b" id="second_number" style="margin:10px;" placeholder="Введите второе число" value="<?php if ($b!==false) echo $b ?>"/></td>
                <td><input type="submit" style="margin-left:15px" class="btn btn-primary" value="=" /></td>
            </tr>
            <tr>
                <td colspan="3"><?php
                    if ($result===ERROR_DIVISION_BY_ZERO) echo "<p style=\"padding: 15px\"  class=\"bg-danger\">Некорректный знаменатель</p>";
                    else echo "<p style=\"padding: 15px\" class=\"bg-info\">Реузьтат: $result</p>";
                    ?></td>
            </tr>
        </table>
        </fieldset>
        </form>
    </div>
</div>
</body>
</html>