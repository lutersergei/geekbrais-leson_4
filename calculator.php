<?php
error_reporting(E_ALL);
/*Инициализирование констант*/
define('ERROR_DIVISION_BY_ZERO',"zero" );
define('SUMMA','+' );
define('DIFFERENCE','-' );
define('MULTIPLIC','*' );
define('DIVISION','/' );
/*Инициализирование переменных*/
$a=false;
$b=false;
$result = "";
$operator_array=[1=> SUMMA, 2=> DIFFERENCE, 3=> MULTIPLIC, 4=>DIVISION];         //Массив операторов для использования в select в цикле
$operator="";
if (isset($_POST['operator']) && isset($_POST['a']) && isset($_POST['b']))      //Проверяем, переданы ли значения аргументов и оператора
{
    $a = $_POST['a'];
    $b = $_POST['b'];
    $operator = $_POST['operator'];
}
function MathOperation ($a, $b)
{
    if (isset($_POST['operator']))                          //Проверяем, передано ли значение оператора
    {                                                       //По значению оператора выбираем математическую операцию
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
                return ERROR_DIVISION_BY_ZERO;                       //Обработка деления на ноль
            } else return $a / $b;
        }
        else return "";
    }
    else return "";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Продвинутый калькулятор</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="col-md-12">
      <ul class="nav nav-tabs">
          <li role="presentation"><a href="index.php">Главная</a></li>
          <li role="presentation"><a href="sum.php">Калькулятор</a></li>
          <li role="presentation" class="active"><a href="calculator.php">Продвинутый калькулятор</a></li>
      </ul>
    <form method="post">
      <fieldset><legend style="font-size: 35px">Продвинутый калькулятор</legend>
        <table>
            <tr>
                <td><input type="number" class="form-control" name="a" id="first_number" placeholder="Введите первое число" value="<?php if ($a!==false)echo $a ?>"/></td>
                <td style="min-width: 30px; padding: 0 10px"><?php echo $operator?></td>
                <td><input type="number" class="form-control" name="b" id="second_number" placeholder="Введите второе число" value="<?php if ($b!==false)echo $b ?>"/></td>
                <td style="padding: 0 10px"> = </td>
                <td><?php
                    if (MathOperation($a, $b)===ERROR_DIVISION_BY_ZERO) echo "<p class=\"bg-danger\">Некорректный знаменатель</p>";
                    else echo MathOperation($a, $b);
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    for ($i=1; $i<=4; $i++)         //Цикл подстановки значения value submit'а из массива операторов
                    {
                        echo "<input style=\"margin-top: 10px; margin-right: 5px\" class=\"btn btn-default\" type=\"submit\" value=\"$operator_array[$i]\" name=\"operator\" />";
                    }
                    ?></td>
            </tr>
        </table>
      </fieldset>
    </form>
  </div>
</div>