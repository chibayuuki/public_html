
<?php
    //4-2以降でも毎回接続は必要。
    //$dsnの式の中にスペースを入れないこと！

    // 【サンプル】
    // ・データベース名：tb250221db
    // ・ユーザー名：tb-250221
    // ・パスワード：YX8MSZVUxt
    // の学生の場合：

    // DB接続設定
    $dsn = 'mysql:dbname=tb250221db;host=localhost';
    $user = 'tb-250221';
    $password = 'YX8MSZVUxt';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    //UPDATE文：入力されているデータレコードの内容を編集
    $id = 1; //変更する投稿番号
    $name = "千葉";
    $comment = "かきくけこ"; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
?>