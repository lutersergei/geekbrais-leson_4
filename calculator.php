<?php
error_reporting(E_ALL);
define('ERROR_DIVISION_BY_ZERO',"zero" );
$a="";
$b="";
$result = "";
$operator_array=[1=>"+",2=>"-",3=>"*",4=>"/"];
//var_dump($_POST);
$operator="";
if (isset($_POST['operator']) && isset($_POST['a']) && isset($_POST['b']))
{
    $a=(int)$_POST['a'];
    $b=(int)$_POST['b'];
    $operator=$_POST['operator'];
    if ($_POST['operator']=='+')
    {
        $result = $a + $b;
    }
    elseif ($_POST['operator']=='-')
    {
        $result = $a - $b;
    }
    elseif ($_POST['operator']=='*')
    {
        $result = $a * $b;
    }
    elseif ($_POST['operator']=='/')
    {
        if ($b==0)
        {
            $result=ERROR_DIVISION_BY_ZERO;
        }
        else $result = $a / $b;
    }
}
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
      <ul class="nav nav-tabs">
          <li role="presentation"><a href="index.php">Главная</a></li>
          <li role="presentation"><a href="sum.php">Калькулятор</a></li>
          <li role="presentation" class="active"><a href="calculator.php">Продвинутый калькулятор</a></li>
      </ul>
    <form method="post">
      <fieldset><legend>Продвинутый калькулятор</legend>
        <table>
            <tr>
                <td><input type="text" name="a" id="first_number" placeholder="Введите первое число" value="<?php echo $a ?>"/></td>
                <td style="min-width: 30px; padding: 0 10px"><?php echo $operator?></td>
                <td><input type="text" name="b" id="second_number" placeholder="Введите второе число" value="<?php echo $b ?>"/></td>
                <td style="padding: 0 10px"> = </td>
                <td><?php
                    if ($result===ERROR_DIVISION_BY_ZERO) echo "Некорректный знаменатель";
                    else echo "<strong>$result</strong>";
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    for ($i=1; $i<5; $i++)
                    {
                        echo "<input type=\"submit\" value=\"$operator_array[$i]\" name=\"operator\" />";
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
      </fieldset>
    </form>
  </div>
</div>