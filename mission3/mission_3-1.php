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
        if (file_exists($filename)) {
$num = count(file($filename))+1;
        } else {
    $num = 1;
            
        }
           if ( !empty( $_POST["comment"] ) & (!empty($_POST["name"]))){
           $comment = $_POST["comment"];
           $name=$_POST["name"];
           
           $fp = fopen($filename,"a");
           $str=($num."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
           fwrite($fp,$str);
           fwrite($fp, PHP_EOL);
           fclose($fp);
           }
       
     $items = file($filename);
        foreach($items as $str){
        echo $str.'<br>';
      }
      ?>