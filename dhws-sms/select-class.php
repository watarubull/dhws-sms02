<?php
    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);
        // SQL作成&実行
        $sql = 'SELECT * FROM class_table';
        $stmt = $pdo->prepare($sql);
        $statusDB = $stmt->execute();
        if ($statusDB == false) {
            $error = $stmt->errorInfo();
            exit('sqlError:'.$error[2]);
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $output = "";
            if($page=="class"){
                foreach ($result as $record) {
                    $output .= "
                        <li>
                            <div>{$record["className"]}</div>
                            <div>{$record["courseTerm"]}</div>
                            <div><a href='./page-class-edit.php?id={$record["classID"]}'>編集</a></div>
                        </li>
                    ";
                }
            }else if($page=="student"){
                foreach ($result as $record) {
                    $output .= "
                        <option value='{$record["classID"]}'>
                            {$record["className"]}
                        </option>
                    ";
                }
            }
            
        }

    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
?>