<?php
    //変数の設定
    $message = "";
    $status = 1;
    //エラー回避して変数に代入
    $className = isset($_POST['className']) ? $_POST['className'] : "";
    $courseTerm = isset($_POST['courseTerm']) ? $_POST['courseTerm'] : "";

    //ポストがある時
    if(!empty($_POST)){
        //入力有無のチェック
        if($className==""||$courseTerm==""){
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
                $sql = 'INSERT INTO class_table (classID,className,courseTerm) VALUES (NULL, :className, :courseTerm)';

                $stmt = $pdo->prepare($sql);

                // バインド変数を設定
                $stmt->bindValue(':className', $className, PDO::PARAM_STR);
                $stmt->bindValue(':courseTerm', $courseTerm, PDO::PARAM_STR);

                // SQL実行（実行に失敗すると$statusにfalseが返ってくる）
                $statusDB = $stmt->execute();

                if ($statusDB == false) {
                    $error = $stmt->errorInfo();
                    exit('sqlError:'.$error[2]);
                } else {
                    header('Location:page-class.php');
                }

            } catch (PDOException $e) {
                echo json_encode(["db error" => "{$e->getMessage()}"]);
                exit();
            }
        }
    }

?>