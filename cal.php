
<?php
//nullかどうか（符号）
if (isset($_POST['operator']) && isset($_POST['left']) && isset($_POST['right'])) {

    $sign = $_POST['operator'];
    $num1 = $_POST['left'];
    $num2 = $_POST['right'];
    $log = $_POST['left'];

    if(isNumeric($num1) && isNumeric($num2)){
        switch ($sign) {
            case '-':
                $answer = $num1 - $num2;
                break;
            case '*':
                $answer = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $answer = "0で割ることはできません";
                    break;
                }
                $answer = $num1 /$num2;

                break;
            case '+':
                default:
                $answer = $num1 + $num2;
                break;
        }
    }else{
        $answer = '半角数字を入力してください';
    }



} else {
    $answer = '計算結果なし';
}

function isNumeric($str) {
    # $strの中に0-9があるか
    if (!preg_match("/^[0-9]+$/", $str)) {
        # 半角数字以外が含まれていた場合、false
        return false;
    }
    return true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>test</title>
</head>
<body>
<form action="cal.php" method="POST">
    <input type="text" name="left"/>
    <select name="operator">
        <option value="+" selected>+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="right"/>
    <input type="submit" value="計算する">
</form>

<p>= <?php echo $answer; ?></p>

</body>
</html>
