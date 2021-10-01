<?php

    if (
    !isset($_POST['className']) || $_POST['className'] == '' ||
    !isset($_POST['courseTerm']) || $_POST['courseTerm'] == '' ||
    !isset($_POST['classID']) || $_POST['classID'] == ''
    ){
        echo json_encode(["error_msg" => "no input"]);
        exit();
    }
  
    $className = $_POST['className'];
    $courseTerm = $_POST['courseTerm'];
    $classID = $_POST['classID'];
    $id = $_GET['id'];

    // 各種項目設定
    $dbn ='mysql:dbname=gsacs_d03_01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd);
        $sql = 'UPDATE class_table SET className=:className, courseTerm=:courseTerm, updated_at=now() WHERE classID=:id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':className', $className, PDO::PARAM_STR);
        $stmt->bindValue(':courseTerm', $courseTerm, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $status = $stmt->execute();

        if ($status == false) {
            $error = $stmt->errorInfo();
            echo json_encode(["error_msg" => "{$error[2]}"]);
            exit();
        } else {
            header('Location:page-class.php');
            exit();
        }
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
?>