<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-3</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str" placeholder="コメント">
        <input type="submit" name="submit">
    </form>
    </body>
</html>
  
    <?php
            $filename="mission_2-3.txt";
       if  ( !empty( $_POST["str"] ) ){
           $str = $_POST["str"];
            echo $str."を受け付けました<br>";
     
       $fp = fopen($filename,"a");
       fwrite($fp, $str.PHP_EOL);
       fclose($fp);
       
        } 
?>