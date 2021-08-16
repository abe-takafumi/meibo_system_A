<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>削除画面</title>
    </head>
    <body>

        <?php

            try {

                $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
                $DB_USER = "webaccess";
                $DB_PW = "toMeu4rH";
                $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

                $stmt = $pdo->prepare('DELETE FROM member WHERE member.member_ID = :id');

                $stmt->execute(array(':id' => $_POST["delete"]));

                echo "削除しました。";

            } catch (Exception $e) {
                      echo 'エラーが発生しました。:' . $e->getMessage();
            }

        ?>
        <p>
            <a href="detail01.php">社員情報検索画面へ</a>
        </p>
    </body>
</html>
