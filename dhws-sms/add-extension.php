<?php
    //変数の設定
    $message = "";
    $status = 1;
    //エラー回避して変数に代入
    $exName = isset($_POST['exName']) ? $_POST['exName'] : "";
    $courseTerm = isset($_POST['courseTerm']) ? $_POST['courseTerm'] : "";

    //ポストがある時
    if(!empty($_POST)){
        //入力有無のチェック
        if($exName==""||$courseTerm==""){
            $message = "入力されていない項目があります。";
            $status = 2;
        }else{
            $message = "";
            $status = 1;

            // 各種項目設定
            $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
            $user = 'root';
            $pwd = '';

            // DB接続
            try {
                $pdo = new PDO($dbn, $user, $pwd);
                // SQL作成&実行
                $sql = 'INSERT INTO ex_table (exID,exName,courseTerm) VALUES (NULL, :exName, :courseTerm)';

                $stmt = $pdo->prepare($sql);

                // バインド変数を設定
                $stmt->bindValue(':exName', $exName, PDO::PARAM_STR);
                $stmt->bindValue(':courseTerm', $courseTerm, PDO::PARAM_STR);

                // SQL実行（実行に失敗すると$statusにfalseが返ってくる）
                $statusDB = $stmt->execute();

                if ($statusDB == false) {
                    $error = $stmt->errorInfo();
                    exit('sqlError:'.$error[2]);
                } else {
                    header('Location:page-extension.php');
                }

            } catch (PDOException $e) {
                echo json_encode(["db error" => "{$e->getMessage()}"]);
                exit();
            }
        }
    }

?>