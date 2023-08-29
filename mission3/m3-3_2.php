<!DOCTYPE html>
2: <html lang="ja">
3: <head>
4:     <meta charset="UTF-8">
5:     <title>mission_3-3</title>
6: </head>
7: <body>
8:     <form action="" method="post">
9:         <input type="text" name="name" placeholder="名前">
10:         <input type="text" name="comment" placeholder="コメント">
11:         <input type="submit" name="submit">
12:         <input type="number" name = "delete" placeholder="削除対象番号">
13:         <input type="submit" name="submit" value = "削除">
14:     </form>
15:     </body>
16: </html>
17:   
18:     <?php
19:     $filename="mission_3-3.txt";
21:            
35:                 
36:             
37:                 if ( !empty( $_POST["comment"] ) & (!empty($_POST["name"]))){
38:                      $comment = $_POST["comment"];
39:                     $name=$_POST["name"];
40:                     if (file_exists($filename)) {
41:                         $line = count(file($filename))+1;
42:                     } else {
43:                         $line = 1;
44:                     }
45:                     $str=($line."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
46:                     $fp = fopen($filename,"a");
47:            fwrite($fp,$str);
48:            fwrite($fp, PHP_EOL);
49:            fclose($fp);
50:            
51:            $strs=($line."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" ));
52:            $arrayLine=explode("<>",$strs);
53:            print_r ($arrayLine);
54:            
55:            $items = file($filename);
56:         foreach($items as $str){
57:         echo $str.'<br>';
58:         }
59:         }?>