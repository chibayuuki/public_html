<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-3</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前">
        <input type="text" name="comment" placeholder="コメント">
        <input type="submit" name="submit">
        <input type="number" name = "delete" placeholder="削除対象番号">
        <input type="submit" name="submit" value = "削除">
    </form>
    <?php
     $filename="mission_3-3-1.txt";
            if ( !empty( $_POST["comment"] ) && (!empty($_POST["name"]))){
                     $comment = $_POST["comment"];
                    $name=$_POST["name"];
                    if (file_exists($filename)) {
                        $num = count(file($filename))+1;
                    } else {
                        $num = 1;
                    }
                    $str=($num."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
                    $fp = fopen($filename,"a");
                    fwrite($fp,$str.PHP_EOL);
                    fclose($fp);
                    
           }elseif ( !empty( $_POST["delete"] )){
                $delete=$_POST["delete"];
                $lines=file($filename,FILE_IGNORE_NEW_LINES);
                $fp = fopen($filename,"w");
              foreach($lines as $line){
                   $arrayLine=explode("<>",$line);
                   if($delete != $arrayLine[0]){
                       fwrite($fp,$line.PHP_EOL);
                   }
              }
              fclose($fp);
           }
              if (file_exists($filename)) {
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
             foreach($lines as $line){
                $arrayLine=explode("<>",$line); 
                echo $arrayLine[0] ."". $arrayLine[1] ."　". $arrayLine[2] ."　". $arrayLine[3]."<br>";
             }
              }
           ?>
           </body>
           </html>