<?php 
    $page = "class";
    include 'select-class.php';
?>

<?php include 'header.php';?>

    <main id="class"><div class="full-h-box">
        <div class="layout flex">
            <?php include 'sidebar.php';?>
            <div class="content">
                <h2 class="heading">クラス一覧</h2>
                <div class="list-wrap">
                    <ul class="list class-list">
                        <li>
                            <div>クラス名</div>
                            <div>受講期間（ヶ月）</div>
                        </li>
                        <?= $output ?>
                    </ul>
                </div>
                <div class="form-wrap">
                    <form action="./add-class.php" method="POST">
                        <div class="input-wrap flex">
                            <label>
                                クラス名
                                <input type="text" name="className" />
                            </label>
                            <label>
                                受講期間（ヶ月）
                                <input type="text" name="courseTerm" />
                            </label>
                            <input type="submit" value="追加">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div></main>
<?php include 'footer.php';?>
