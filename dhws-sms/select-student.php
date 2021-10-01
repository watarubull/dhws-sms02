<?php
    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);
        // SQL作成&実行
        if($page == "single"){
            $stuID = $singleID;
            $sql = 'SELECT * FROM stu_table WHERE stuID=:stuID';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':stuID', $stuID, PDO::PARAM_INT);
            $statusDB = $stmt->execute();
        }if($page == "single-edit"){
            $stuID = $singleID;
            $sql = 'SELECT * FROM stu_table WHERE stuID=:stuID';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':stuID', $stuID, PDO::PARAM_INT);
            $statusDB = $stmt->execute();
        }else{
            $sql = 'SELECT * FROM stu_table';
            $stmt = $pdo->prepare($sql);
            $statusDB = $stmt->execute();
        }
        
        if ($statusDB == false) {
            $error = $stmt->errorInfo();
            exit('sqlError:'.$error[2]);
        } else {
            if($page == "single"){
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                $output = "
                    <li><div>受講ID</div><div class='stuID'>{$record["stuID"]}</div></li>
                    <li><div>氏名</div><div>{$record["stuName"]}</div></li>
                    <li><div>よみがな</div><div>{$record["stuRuby"]}</div></li>
                    <li><div>受講クラス</div><div class='class'></div></li>
                    <li><div>開講月</div><div>{$record["startMonth"]}</div></li>
                    <li><div>卒業月</div><div>{$record["gradMonth"]}</div></li>
                    <li><div>受講開始</div><div>{$record["attendStart"]}</div></li>
                    <li><div>オリエン</div><div>{$record["orientation"]}</div></li>
                    <li><div>卒制担当</div><div>{$record["trainerID"]}</div></li>
                    <li><div>企画発表</div><div>{$record["1stPresen"]}</div></li>
                    <li><div>中間発表</div><div>{$record["2ndPresen"]}</div></li>
                    <li><div>講評会</div><div>{$record["3rdPresen"]}</div></li>
                ";
            }if($page == "single-edit"){
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                $ID = $record["stuID"];
                $output = "
                    <li><div>受講ID</div><div class='stuID'><input type='text' name='stuID' value='".$record["stuID"]."' /></div></li>
                    <li><div>氏名</div><div>{$record["stuName"]}</div></li>
                    <li><div>よみがな</div><div>{$record["stuRuby"]}</div></li>
                    <li><div>受講クラス</div><div class='class'></div></li>
                    <li><div>開講月</div><div>{$record["startMonth"]}</div></li>
                    <li><div>卒業月</div><div>{$record["gradMonth"]}</div></li>
                    <li><div>受講開始</div><div>{$record["attendStart"]}</div></li>
                    <li><div>オリエン</div><div>{$record["orientation"]}</div></li>
                    <li><div>卒制担当</div><div>{$record["trainerID"]}</div></li>
                    <li><div>企画発表</div><div>{$record["1stPresen"]}</div></li>
                    <li><div>中間発表</div><div>{$record["2ndPresen"]}</div></li>
                    <li><div>講評会</div><div>{$record["3rdPresen"]}</div></li>
                ";
            }else if($page == "student"){
                $result_stu = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $output = "";
                foreach ($result_stu as $record) {
                    // SQL作成&実行
                    $sqlEx = 'SELECT * FROM ex_attend_table WHERE id = '.$record["stuID"];
                    $stmtEx = $pdo->prepare($sqlEx);
                    $statusDBEx = $stmtEx->execute();
                    if ($statusDB == false) {
                        $error = $stmt->errorInfo();
                        exit('sqlError:'.$error[2]);
                    } else {
                        $result_ex = $stmtEx->fetchAll(PDO::FETCH_ASSOC);
                        $exIDs = "";
                        foreach ($result_ex as $reco) {
                            $exIDs .= $reco["exID"];
                        }
                        $output .= "
                            <li>
                                <div>{$record["stuID"]}</div>
                                <div>{$record["stuName"]}</div>
                                <div>{$record["startMonth"]}</div>
                                <div>{$record["gradMonth"]}</div>
                                <div class='class'></div>
                                <div class='extension'>".$exIDs."</div>
                                <div class='more'><a href='./page-single.php?id={$record["stuID"]}'>詳細</a></div>
                            </li>
                        ";
                    }  
                }
            }
        }

    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
?>