<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str" placeholder="コメント">
        <input type="submit" name="submit">
    </form>
    <?php
            $str = $_POST["str"];
            echo $str;

$filename="mission_2-1.txt";
$fp = fopen($filename,"a");
fwrite($fp, $str.PHP_EOL);
fclose($fp);
echo $str."を受け付けました<br>";

if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        echo $line . "<br>";
    }
}
?>
</body>
</html>
  