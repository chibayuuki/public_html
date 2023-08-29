<!DOCTYPE html> 
<html lang="ja"> 
<head> 
    <meta charset="UTF-8"> 
    <title>mission_3-5</title> 
</head> 
<body> 
     
    <?php 
     $filename = "mission_3-5.txt"; 
            //新規投稿フォーム 
              if ( !empty( $_POST["comment"] ) && ( !empty( $_POST["name"] )) && ( !empty( $_POST["pas"]))){ 
                    $comment = $_POST["comment"]; 
                    $name = $_POST["name"];
                    $pas = $_POST["pas"];
                    if ( file_exists($filename)) { 
                        $num = count(file($filename))+1; 
                    } else { 
                        $num = 1; 
                    }
                    //編集フォーム
                    //パスワードが入力されたとき編集フォームを送信できる
                    if ( !empty( $_POST["edit_pas"])  && ( !empty( $_POST["juge"]) )){
                        $edit_pas = $_POST["edit_pas"];
                        $lines = file( $filename,FILE_IGNORE_NEW_LINES );
                        foreach( $lines as $line ){
                        $arrayLine = explode("<>",$line);
                        
                    //編集番号からjugeに番号が送られた場合に編集モードになる
                        if ( $arrayLine[4] = $edit_pas){
                        $judge = $_POST["judge"]; 
                        $lines = file( $filename,FILE_IGNORE_NEW_LINES ); 
                        $fp = fopen( $filename,"w"); 
                        $o=( $judge."<>".$name."<>".$comment."<>".date("Y年m月d日　H:i:s")."<>".$edit_pas );
                        foreach( $lines as $line ){
                        $arrayLine = explode("<>",$line);
                        if ( $arrayLine[0] = $juge){ 
                        fwrite( $fp,$o.PHP_EOL);
                        } else { fwrite( $fp,$line.PHP_EOL);
                        } 
                        fclose($fp);
                    }}}}
                    //編集番号からjugeに番号が送られなかった場合に新規投稿モードになる
                    if(empty($_POST["juge"])){
                        $pas = $_POST["pas"];
                        $str = ($num."<>".$name."<>".$comment."<>".date( "Y年m月d日  H:i:s" )."<>".$pas); 
                        $fp = fopen ($filename,"a"); 
                        fwrite($fp,$str.PHP_EOL); 
                        fclose($fp);
                    }
              } 
                 //削除フォーム    
           if ( !empty( $_POST["delete"] ) && ( !empty( $_POST["delete_pas"]))){ 
                $delete = $_POST["delete"];
                $delete_pas = $_POST["delete_pas"];
                if ( $arrayLine[4] = $delete_pas){
                $lines = file($filename,FILE_IGNORE_NEW_LINES); 
                $fp = fopen($filename,"w"); 
              foreach($lines as $line){ 
                   $arrayLine=explode("<>",$line); 
                   if($delete != $arrayLine[0]){ 
                       fwrite($fp,$line.PHP_EOL);} 
                   } 
               fclose($fp);
                }}
             //編集フォーム 
           if ( !empty( $_POST["edit"] )){ 
               $edit=$_POST["edit"]; 
               $lines=file($filename,FILE_IGNORE_NEW_LINES); 
               foreach($lines as $line){ 
                   $arrayLine=explode("<>",$line); 
                   if($edit = $arrayLine[0]){ 
                       $editname=$arrayLine[1]; 
                       $editcomment=$arrayLine[2]; 
                   } 
           }} 
          //入力フォーム
          ?>
          <form action="" method="post"> 
          <?php
          //編集番号に入力されたとき、その番号と投稿番号が一致する投稿の「名前」を入力フォームに表示
          ?>
        <input type="text" name="name" placeholder="名前" value=<?php if( !empty( $_POST["edit"] )){ 
               $edit=$_POST["edit"]; 
               $lines=file($filename,FILE_IGNORE_NEW_LINES); 
              foreach($lines as $line){ 
                   $arrayLine=explode("<>",$line); 
                   if($edit = $arrayLine[0]){ 
                   $editname=$arrayLine[1];     
                   echo$editname;}}}?>> 
                   <?php
                    //編集番号に入力されたとき、その番号と投稿番号が一致する投稿の「コメント」を入力フォームに表示
                    ?>
        <input type="text" name="comment" placeholder="コメント" value=<?php if( !empty( $_POST["edit"] )){ 
               $edit=$_POST["edit"]; 
               $lines=file($filename,FILE_IGNORE_NEW_LINES); 
              foreach($lines as $line){ 
                   $arrayLine=explode("<>",$line); 
                   if($edit = $arrayLine[0]){ 
                   $editcomment=$arrayLine[2];   
                   echo$editcomment;}}}  ?>>
        <input type="text" name = "pas" placeholder="パスワード">
        <input type="submit" name="submit"><br>
        <input type="number" name = "delete" placeholder="削除対象番号">
        <input type="text" name = "delete_pas" placeholder="パスワード">
        <input type="submit" name="submit" value = "削除"><br>
        <input type="number" name = "edit" placeholder="編集対象番号">
        <input type="text" name = "edit_pas" placeholder="パスワード">
        <input type="submit" name="submit" value = "編集">
        <?php
        //本来、編集フォームの横にあるjudgeを表示させないようにする
        ?>
        <hidden type="number" name = "judge" value=<?php  if(!empty($_POST["edit"])){$edit=$_POST["edit"]; echo"$edit";} ?> ><br>
    </form> 
    
<?php 
//ブラウザに表示
              if (file_exists($filename)) { 
            $lines=file($filename,FILE_IGNORE_NEW_LINES); 
             foreach($lines as $line){ 
                $arrayLine=explode("<>",$line);  
                echo $arrayLine[0] ." ". $arrayLine[1] ."　". $arrayLine[2] ."　". $arrayLine[3]."　". $arrayLine[4]."<br>"; 
             } 
              } 
           ?> 
           </body> 
</html> 