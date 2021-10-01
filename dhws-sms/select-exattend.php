<?php
    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    if($exAttendID != ""){

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);
        // SQL作成&実行
        $sql = 'SELECT * FROM ex_attend_table WHERE id = '.$exAttendID;
        $stmt = $pdo->prepare($sql);
        $statusDB = $stmt->execute();
        if ($statusDB == false) {
            $error = $stmt->errorInfo();
            exit('sqlError:'.$error[2]);
        } else {
            $resultExAttend = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
    }
?>