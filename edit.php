<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>編集画面</title>
    </head>
    <body>

        <?php

            try {

                $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
                $DB_USER = "webaccess";
                $DB_PW = "toMeu4rH";
                $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

                $stmt = $pdo->prepare('UPDATE member SET name = :name, pref = :pref , seibetu = :seibetu , age = :age , section_ID = :section_ID , grade_ID = :grade_ID WHERE member.member_ID = :id');

                $stmt->execute(array(':name' => $_POST['name'], ':pref' => $_POST['pref'], ':seibetu' => $_POST['seibetu'],
                ':age' => $_POST['age'], ':section_ID' => $_POST['section_ID'], ':grade_ID' => $_POST['grade_ID'], ':id' => $_POST['member_ID']));

                echo "編集完了しました。";

            } catch (Exception $e) {
                      echo 'エラーが発生しました。:' . $e->getMessage();
            }

        ?>
        <p>
            <a href="index.php">社員情報検索画面へ</a>
        </p>
    </body>
</html>
