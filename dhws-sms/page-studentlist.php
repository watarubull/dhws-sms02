<?php 
    $page = "student";
    include 'select-student.php';
?>

<?php include 'header.php';?>

    <main id="class"><div class="full-h-box">
        <div class="layout flex">
        <?php include 'sidebar.php';?>
            <div class="content">
                <h2 class="heading">受講生一覧</h2>
                <div class="list-wrap">
                    <ul class="list stu-list">
                        <li>
                            <div>受講ID</div>
                            <div>受講生氏名</div>
                            <div>受講月</div>
                            <div>卒業月日</div>
                            <div class="class">クラス名</div>
                            <div>エクステンション</div>
                        </li>
                        <?= $output ?>
                    </ul>
                </div>
            </div>
        </div>
    </div></main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
        $page = "student";
        include 'select-class.php';
    ?>
    <script>
        // PHPのデータをJSに渡す
        const resultArray = <?=json_encode($result) ?>;
        const resultStuArray = <?=json_encode($result_stu) ?>;
        console.log(resultArray);
        console.log(resultStuArray);

        const listNm = $(".stu-list li").length;
        for(let i = 0;i<listNm;i++){
            let classNm = resultStuArray[i].classID;
            $(".stu-list li").eq(i+1).find("div.class").html(resultArray[classNm-1].className);
        }
    </script>

    <?php
        include 'select-extension.php';
    ?>
    <script>
        // PHPのデータをJSに渡す
        const resultExArray = <?=json_encode($resultEx) ?>;
        console.log(resultExArray);

    </script>

<?php include 'footer.php';?>
