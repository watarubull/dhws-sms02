<?php
    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);
        // SQL作成&実行
        $sql = 'SELECT * FROM ex_table';
        $stmt = $pdo->prepare($sql);
        $statusDB = $stmt->execute();
        if ($statusDB == false) {
            $error = $stmt->errorInfo();
            exit('sqlError:'.$error[2]);
        } else {
            $resultEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $outputEx = "";
            if($page=="extension"){
                foreach ($resultEx as $record) {
                    $outputEx .= "
                        <li>
                            <div>{$record["exName"]}</div>
                            <div>{$record["courseTerm"]}</div>
                        </li>
                    ";
                }
            }else if($page=="student"){
                foreach ($resultEx as $record) {
                    $outputEx .= "
                        <label>
                            <input type='checkbox' name='extension[]' value='{$record["exID"]}' />
                            {$record["exName"]}
                        </label>
                    ";
                }
            }
            
        }

    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
?>