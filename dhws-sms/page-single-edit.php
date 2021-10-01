<?php 
    if(isset($_GET['id'])){
        $singleID = $_GET['id'];
    }
    $page = "single-edit";
    include 'select-student.php';
?>


<?php include 'header.php';?>

    <main id="class"><div class="full-h-box">
        <div class="layout flex">
        <?php include 'sidebar.php';?>
            <div class="content">
                <h2 class="heading">受講生個別</h2>
                <div class="list-wrap">
                    <ul class="list single-list">
                        <?= $output ?>
                    </ul>
                </div>
                <p class="button"><a href="./page-single-edit.php?=<?php echo $singleID; ?>">編集</a></p>
            </div>
        </div>
    </div></main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <?php
        $page = "student";
        include 'select-class.php';
        include 'select-student.php';
    ?>
    <script>
        // PHPのデータをJSに渡す
        const resultArray = <?=json_encode($result) ?>;
        const resultStuArray = <?=json_encode($result_stu) ?>;
        console.log(resultArray);
        console.log(resultStuArray);

        const stuID = $(".single-list .stuID").text();
        let stuClassID;
        for (let i=0; i<resultStuArray.length; i++) {
            if(resultStuArray[i].stuID == stuID){
                stuClassID = resultStuArray[i].classID;
            }
        }
        $(".single-list .class").html(resultArray[stuClassID-1].className);
        
    </script>

<?php include 'footer.php';?>
