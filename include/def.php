<h1>社員名簿システム</h1>
<p style="text-align:right">
    |
    <a href="./index.php" style="text-align:right" >トップ画面</a>
    |
    <a href="./entry01.php" style="text-align:right">新規社員登録へ</a>
    |
</p>
<hr>

<?php
    $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
    $DB_USER = "webaccess";
    $DB_PW = "toMeu4rH";
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);
?>
