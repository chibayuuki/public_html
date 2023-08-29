<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-1</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前">
        <input type="text" name="comment" placeholder="コメント">
        <input type="submit" name="submit">
    </form>
    </body>
</html>
  
    <?php
            $filename="mission_3-1.txt";
       if  ( !empty( $_POST["comment"] ) & (!empty($_POST["name"]))){
           $comment = $_POST["comment"];
           $name=$_POST["name"];
           
           $fp = fopen($filename,"a");
           $str=(count(file($filename))+1)."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" );
           fwrite($fp,$str);
           fwrite($fp, PHP_EOL);
           fclose($fp);
           }
           ?>
       <?php
  $fp = fopen('mission_3-1.txt', "r");
  while ($line = fgets($fp)) {
  $line2 = explode("<>",$line);
  print_r($line2[0]." ".$line2[1]." ".$line2[2]." ".$line2[3]);
  print_r("<br>");
}
fclose($fp);

?>