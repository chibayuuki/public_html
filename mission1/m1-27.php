<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27.php</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num" placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
    <?php
        $num = $_POST["num"];
        $filename="mission_1-27.txt";
        $fp = fopen($filename,"a");
        echo "書き込み成功！<br>";
        fwrite($fp, $num.PHP_EOL);
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "FizzBuzz<br>";
        } elseif ($num % 3 == 0) {
            echo "Fizz<br>";
        } elseif ($num % 5 == 0) {
            echo "Buzz<br>";
        } else {
            echo $num."<br>" ;
        }
        fclose($fp);
        if(file_exists($filename)){
        $lines = file($filename,FILE_SKIP_EMPTY_LINES);
        foreach($lines as $line){
        echo $line ."<br>" ;
        }
    }
    ?>
</body>
</html>


