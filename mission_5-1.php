<!DOCTYPE html> 
<html lang="ja"> 
<head> 
    <meta charset="UTF-8"> 
    <title>mission_5-1</title> 
</head> 
<body> 
     
    <?php 
                        // DB接続設定
                       $dsn = 'mysql:dbname=データベース名;host=localhost';
                       $user = 'ユーザ名';
                       $password = 'パスワード';
                        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                        //CREATE文：データベース内にテーブルを作成
                        $tbname="mission_table";
                        $sql = "CREATE TABLE IF NOT EXISTS tbtest"
                        ." ("
                        . "id INT AUTO_INCREMENT PRIMARY KEY,"
                        . "name char(32),"
                        . "comment TEXT,"
                        . "date DATETIME,"
                        . "pas TEXT"
                        .");";
                        $stmt = $pdo->query($sql);
            //新規投稿フォーム 
              if ( !empty( $_POST["comment"] ) && ( !empty( $_POST["name"] )) && ( !empty( $_POST["pas"]))){ 
                    $comment = $_POST["comment"]; 
                    $name = $_POST["name"];
                    $date=date("Y-m-d H:i:s");
                    $pas = $_POST["pas"];
                    
                    //編集フォーム
                    //編集番号からjudgeに番号が送られた場合に編集モードになる
                    if ( !empty( $_POST["judge"]) ){
                        $edit_pas = $_POST["edit_pas"];
                    
                        $judge = $_POST["judge"]; 
                        //UPDATE文：入力されているデータレコードの内容を編集
                        $id = $judge; //変更する投稿番号
                        $comment = $_POST["comment"]; 
                        $name = $_POST["name"];
                        $date=date("Y-m-d H:i:s");
                        $edit_pas = $_POST["edit_pas"];
                        $sql = 'UPDATE tbtest SET name=:name, comment=:comment, date=:date WHERE id=:id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                    }
                        //編集番号からjudgeに番号が送られなかった場合に新規投稿モードになる
                        if ( empty( $_POST["judge"]) ){
                            $pas = $_POST["pas"];
                        //INSERT文：データを入力（データレコードの挿入）
                    $sql = "INSERT INTO tbtest (name, comment, date, pas) VALUES (:name,:comment,:date,:pas)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                    $stmt->bindParam(':pas', $pas, PDO::PARAM_STR);
                    $stmt->execute();
                    //bindParamの引数名（:name など）はテーブルのカラム名に併せるとミスが少なくなります。最適なものを適宜決めよう。
                    }}
                 //削除フォーム    
           if ( !empty( $_POST["delete"] ) && ( !empty( $_POST["delete_pas"]))){ 
                
                        //DELETE文：入力したデータレコードを削除
                        $id = $_POST["delete"];
                        $pas = $_POST["delete_pas"];
                        $sql = 'delete from tbtest where id=:id && pas=:pas';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt->bindParam(':pas', $pas, PDO::PARAM_INT);
                        $stmt->execute();
                }
          
          ?>
          <form action="" method="post"> 
          <?php
          //編集番号に入力されたとき、その番号と投稿番号が一致する投稿の「名前」を入力フォームに表示
          ?>
        <input type="text" name="name" placeholder="名前" value=<?php if( !empty( $_POST["edit"] ) && ( !empty( $_POST["edit_pas"]))){ 
               $id = $_POST["edit"];
               $pas = $_POST["edit_pas"];
               $sql = 'SELECT * FROM tbtest where id=:id && pas=:pas ' ;
               $stmt = $pdo->prepare($sql);
               $stmt->bindParam(':id', $id, PDO::PARAM_INT);
               $stmt->bindParam(':pas', $pas, PDO::PARAM_INT);
               $stmt->execute();
               $results = $stmt->fetchAll();
               foreach ($results as $row){
                   echo $row['name'].'';
              }}?>> 
                   <?php
                    //編集番号に入力されたとき、その番号と投稿番号が一致する投稿の「コメント」を入力フォームに表示
                    ?>
        <input type="text" name="comment" placeholder="コメント" value=<?php if( !empty( $_POST["edit"] ) && ( !empty( $_POST["edit_pas"]))){ 
               $id=$_POST["edit"];
               $pas = $_POST["edit_pas"];
               $sql = 'SELECT * FROM tbtest where id=:id && pas=:pas ' ;
               $stmt = $pdo->prepare($sql);
               $stmt->bindParam(':id', $id, PDO::PARAM_INT);
               $stmt->bindParam(':pas', $pas, PDO::PARAM_INT);
               $stmt->execute();
               $results = $stmt->fetchAll();
               foreach ($results as $row){
                   echo $row['comment'].'';
               
              }}  ?>>
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
        <input type="number" name = "judge" value=<?php  if(!empty($_POST["edit"])){$edit=$_POST["edit"]; echo"$edit";} ?> ><br>
    </form> 
    
<?php 
//ブラウザに表示
              //SELECT文：入力したデータレコードを抽出し、表示する
    $sql = 'SELECT * FROM tbtest';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['date'].',';
        echo $row['pas'].'<br>';
    echo "<hr>";
    }
                
             
             
           ?> 
           </body> 
</html> 