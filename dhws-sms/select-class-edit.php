<?php
    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    $id = $_GET['id'];

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);

        // SQL作成&実行
        $sql = 'SELECT * FROM class_table WHERE classID=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stmt->execute();

        if ($status == false) {
            $error = $stmt->errorInfo();
            exit('sqlError:'.$error[2]);
        } else {
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $output = "";
            if($page=="class"){
                $output .= "
                    <li>
                        <div><input type='text' name='className' value='{$record["className"]}' /></div>
                        <div><input type='text' name='courseTerm' value='{$record["courseTerm"]}' /></div>
                        <input type='hidden' name='classID' value='{$record["classID"]}'>
                    </li>
                ";
            }
            
        }

    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
?>