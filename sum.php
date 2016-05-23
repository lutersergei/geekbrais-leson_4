<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
error_reporting(E_ALL);
/*Инициализирование констант*/
define('ERROR_DIVISION_BY_ZERO',"zero" );
define('SUMMA','+' );
define('DIFFERENCE','-' );
define('MULTIPLIC','*' );
define('DIVISION','/' );
$operator_array=[1=> SUMMA, 2=> DIFFERENCE, 3=> MULTIPLIC, 4=>DIVISION];  //Массив операторов для использования в select в цикле
/*Инициализирование переменных*/
$a=false;
$b=false;
$result = "";
if (count($_POST))                                       //Проверка на наличие содержимого в запросе POST(признак обработки формы)
{
    if (isset($_POST['a']) && isset($_POST['b']))
    {                                                    //Проверяем, переданы ли значения аргументов
        $a = $_POST['a'];
        $b = $_POST['b'];
    }
}
function MathOperation ($a, $b)
{
    if (isset($_POST['operator']))                       //Проверяем, передано ли значение оператора
    {
        if ($_POST['operator'] == SUMMA) {
            return $a + $b;
        }
        elseif ($_POST['operator'] == DIFFERENCE) {
            return $a - $b;
        }
        elseif ($_POST['operator'] == MULTIPLIC) {
            return  $a * $b;
        }
        elseif ($_POST['operator'] == DIVISION)
        {
            if ($b == 0) {
                return ERROR_DIVISION_BY_ZERO;              //Обработка деления на ноль
            } else return $a / $b;
        }
        else return "";
    }
    else return "";
}
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
                        <td><input type="number" class="form-control" name="a" id="first_number"  placeholder="Введите первое число" value="<?php if ($a!==false)echo $a ?>"/></td>
                        <td><select class="form-control" name="operator" id="operator" style="margin: 0 5px">
                                <?php
                                for ($i=1; $i<=4; $i++)         //Цикл подстановки значений $operator_array в select->option
                                {
                                    if ($operator_array[$i]==$_POST['operator'])        //Option выбранный в предыдущем подсчете получает атрибут selected
                                    {
                                        echo "<option selected value=\"$operator_array[$i]\">$operator_array[$i]</option>";
                                    }
                                    else echo "<option value=\"$operator_array[$i]\">$operator_array[$i]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="b" id="second_number" style="margin:10px;" placeholder="Введите второе число" value="<?php if ($b!==false) echo $b ?>"/></td>
                        <td><input type="submit" style="margin-left:15px" class="btn btn-primary" value="=" /></td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php
                            if (MathOperation($a, $b)===ERROR_DIVISION_BY_ZERO) echo "<p style=\"padding: 15px\"  class=\"bg-danger\">Некорректный знаменатель</p>";
                            else
                            {
                                $result=MathOperation($a, $b);
                                echo "<p style=\"padding: 15px\" class=\"bg-info\">Реузьтат: $result</p>";
                            }
                            ?></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>