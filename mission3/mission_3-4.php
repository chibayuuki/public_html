<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-4</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前" value=<?php if($edit != $arrayLine[0]){ echo $arrayLine[1]; } ?>>
        <input type="text" name="comment" placeholder="コメント" value=<?php if($edit != $arrayLine[0]){ echo $arrayLine[2]; } ?>>
        <input type="submit" name="submit">
        <input type="number" name = "delete" placeholder="削除対象番号">
        <input type="submit" name="submit" value = "削除">
        <input type="number" name = "edit" placeholder="編集対象番号">
        <input type="submit" name="submit" value = "編集">
    </form>
</body>
</html>
    <?php
     $filename="m3-4-1.txt";
            //新規投稿フォーム
              if ( !empty( $_POST["comment"] ) && (!empty($_POST["name"] )) && ( empty( $_POST["edit"] )) ){
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
                 //削除フォーム   
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
             //編集フォーム
           }elseif ( !empty( $_POST["edit"] )){
               $edit=$_POST["edit"];
               $lines=file($filename,FILE_IGNORE_NEW_LINES);
                $fp = fopen($filename,"w");
              foreach($lines as $line){
                   $arrayLine=explode("<>",$line);
                   if($edit != $arrayLine[0]){
                       $comment = $_POST["comment"];
                       $name=$_POST["name"];
                       $edit2=($edit."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
                    fwrite($fp, $edit2.PHP_EOL);
                   }
              }
              fclose($fp);
           }
          //ブラウザに表示
              if (file_exists($filename)) {
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
             foreach($lines as $line){
                $arrayLine=explode("<>",$line); 
                echo $arrayLine[0] ." ". $arrayLine[1] ."　". $arrayLine[2] ."　". $arrayLine[3]."<br>";
             }
              }
           ?>