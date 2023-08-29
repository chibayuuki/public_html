
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
    
    $id = 2;
    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
?>