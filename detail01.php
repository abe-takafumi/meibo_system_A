<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <style type="text/css">
            table {
                margin-left: auto;
                margin-right: auto;
            }
            th { width: 80px; }
            td { width: 280px; }
        </style>
        <title>社員情報詳細画面</title>
    </head>
    <body>
        <h1>社員名簿システム</h1>
        <p style="text-align:right">
            |
            <a href="./hobby.html" style="text-align:right" >トップ画面</a>
            |
            <a href="./works.html" style="text-align:right">新規社員登録へ</a>
            |
        </p>
        <hr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            //$id = $_GET['member_ID'];
            //メンバー
            $query_str = "SELECT * FROM member WHERE member.member_ID = 84";   // 実行するSQL文を作成して変数に保持
            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する
            $result = $sql->fetch();           // 実行結果を取得して$resultに代入する


            $sec_id = $result['section_ID'];
            $gra_id = $result['grade_ID'];

            //所属部署
            $query_str_sec = "SELECT * FROM section1_master WHERE section1_master.ID = $sec_id";   // 実行するSQL文を作成して変数に保持
            $sql_sec = $pdo->prepare($query_str_sec);     // PDOオブジェクトにSQLを渡す
            $sql_sec->execute();                      // SQLを実行する
            $res_sec = $sql_sec->fetch();           // 実行結果を取得して$resultに代入する

            //役職
            $query_str_gra = "SELECT * FROM grade_master WHERE grade_master.ID = $gra_id";   // 実行するSQL文を作成して変数に保持
            $sql_gra = $pdo->prepare($query_str_gra);     // PDOオブジェクトにSQLを渡す
            $sql_gra->execute();                      // SQLを実行する
            $res_gra = $sql_gra->fetch();          // 実行結果を取得して$resultに代入する
        ?>
        <table  border="1" >

            <?php
                require 'include/common.php';
                echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                echo "<tr><th>名前</th><td>" . $result['name'] . "</td></tr>";
                echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                echo "<tr><th>年齢</th><td>" . $result['age'] . "</td></tr>";
                echo "<tr><th>所属部署ID</th><td>" . $res_sec['section_name'] . "</td></tr>";
                echo "<tr><th>役職</th><td>" . $res_gra['grade_name'] . "</td></tr>";

            ?>
        </table>

        <form method='post' action='entry_update01.php' style="text-align:right">
            <input type="submit" name="member_ID" value="編集" >
            <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
        </form>
        <form method='post' action='delete.php' style="text-align:right">
            <input type="submit" name="delete" id="del"   value="削除" onclick="func1()"><div id="div1"></div>
            <input type="hidden" name="delete" id="del" value="<?php echo $result['member_ID']; ?>" />
        </form>
        <script language="javascript" type="text/javascript">
            const del = document.getElementById('del');
            const div1 = document.getElementById('div1');

            const func1 = () => {
                if(del.value.length == 0 ) {
                    alert('名前は必須です');
                }else {
                    if (window.confirm('削除してもよろしいですか？')) {

                    }else{

                    }
                }
            };
        </script>

    </body>
</html>
