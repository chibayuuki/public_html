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
    </body>
</html>
  
    <?php
            $filename="mission_3-3.txt";

            if ( !empty( $_POST["delete"] )){
                $delate=$_POST["delete"];
                $fp = fopen($filename,"w");
                for ($i = 0; $i < count($lines); $i++){
                    $line = explode(" <> ", $lines[0]);
                    print_r($line);
             }
                if ($line[0] == $delete){
                    array_splice($delcon, $i, 1);
                    file_put_contents($filename, implode("<br>", $lines));
                }
                    fclose($fp);
            }
            
                if ( !empty( $_POST["comment"] ) & (!empty($_POST["name"]))){
                     $comment = $_POST["comment"];
                    $name=$_POST["name"];
                    if (file_exists($filename)) {
                        $line= count(file($filename))+1;
                    } else {
                        $line= 1;
                    }
                    $str=($line."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
                    $fp = fopen($filename,"a");
           fwrite($fp,$str);
           fwrite($fp, PHP_EOL);
           fclose($fp);
              
           $strs=($line."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
           $arrayLine=explode("<>",$strs);
           print_r ($arrayLine);
           
           $items = file($filename);
        foreach($items as $str){
        echo $str.'<br>';
        }
        }?>