   <!DOCTYPE html>
   <html lang="ja">

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="/style.css" type="text/css">
     <title>TodoList</title>
   </head>

   <body>
     <?php

      try {
        $Id = $_GET['Id'];

        // DB接続
        $PDO = new PDO(

          // ホスト名、データベース名
          'mysql:host=host.docker.internal;dbname=TodoListSystem;',

          // ユーザー名
          'root',

          // パスワード
          '',

          // レコード列名をキーとして取得させる
          [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );

        // SQL文をセット(該当idのカラムを削除する)
        $Stmt = $PDO->prepare('DELETE FROM TodoList WHERE Id = :Id');

        // 値をセット
        $Stmt->bindValue(':Id', $Id);

        // SQL実行
        $Stmt->execute();
      ?>
       <p>削除しました</p>
     <?php
      } catch (PDOException $e) {

        // エラー発生
        echo $e->getMessage();
      } finally {

        // DB接続を閉じる
        $PDO = null;
      }
      ?>
     <button onclick="location.href='index.php'">TodoListへ戻る</button>
   </body>

   </html>