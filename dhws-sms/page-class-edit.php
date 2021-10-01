<?php 
    $page = "class";
    include 'select-class-edit.php';
?>

<?php include 'header.php';?>

    <main id="class"><div class="full-h-box">
        <div class="layout flex">
            <?php include 'sidebar.php';?>
            <div class="content">
                <h2 class="heading">クラス一覧</h2>
                <div class="list-wrap">
                    <form action="./add-class.php" method="POST">
                        <ul class="list class-list">
                            <li>
                                <div>クラス名</div>
                                <div>受講期間（ヶ月）</div>
                            </li>
                            <?= $output ?>
                        </ul>
                        <input type="submit" value="編集">
                    </form>
                </div>
            </div>
        </div>
    </div></main>
<?php include 'footer.php';?>
