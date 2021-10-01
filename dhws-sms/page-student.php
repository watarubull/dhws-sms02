<?php 
    $page = "student";
    include 'select-class.php';
    include 'select-extension.php';
?>

<?php include 'header.php';?>

    <main id="top"><div class="full-h-box">
        <div class="layout flex">
            <?php include 'sidebar.php';?>
            <div class="content">
                <h2 class="heading">受講生登録</h2>
                <div class="form-wrap">
                    <form action="./add-student.php" method="POST">
                        <dl>
                            <div>
                                <dt>受講生ID</dt>
                                <dd><input type="text" name="stuID" /></dd>
                            </div>
                            <div>
                                <dt>受講生氏名</dt>
                                <dd><input type="text" name="stuName" /></dd>
                            </div>
                            <div>
                                <dt>ふりがな</dt>
                                <dd><input type="text" name="stuRuby" /></dd>
                            </div>
                            <div>
                                <dt>コース名</dt>
                                <dd>
                                    <select name="classID">
                                        <?= $output ?>
                                    </select>
                                </dd>
                            </div>
                            <div>
                                <dt>エクステンション</dt>
                                <dd>
                                    <?= $outputEx ?>
                                </dd>
                            </div>
                            <div>
                                <dt>開講月</dt>
                                <dd>
                                    <input type="text" name="startY" />年
                                    <input type="number" name="startM" />月
                                </dd>
                            </div>
                        </dl>
                        <input type="submit" value="登録" />
                    </form>
                </div>
            </div>
        </div>
    </div></main>
<?php include 'footer.php';?>