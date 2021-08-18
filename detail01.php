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

            //メンバー
            $query_str = "SELECT * FROM member WHERE member.member_ID = 66";   // 実行するSQL文を作成して変数に保持
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

            $pref_array = array(
                '1'=>'北海道',
                '2'=>'青森県',
                '3'=>'岩手県',
                '4'=>'宮城県',
                '5'=>'秋田県',
                '6'=>'山形県',
                '7'=>'福島県',
                '8'=>'茨城県',
                '9'=>'栃木県',
                '10'=>'群馬県',
                '11'=>'埼玉県',
                '12'=>'千葉県',
                '13'=>'東京都',
                '14'=>'神奈川県',
                '15'=>'新潟県',
                '16'=>'富山県',
                '17'=>'石川県',
                '18'=>'福井県',
                '19'=>'山梨県',
                '20'=>'長野県',
                '21'=>'岐阜県',
                '22'=>'静岡県',
                '23'=>'愛知県',
                '24'=>'三重県',
                '25'=>'滋賀県',
                '26'=>'京都府',
                '27'=>'大阪府',
                '28'=>'兵庫県',
                '29'=>'奈良県',
                '30'=>'和歌山県',
                '31'=>'鳥取県',
                '32'=>'島根県',
                '33'=>'岡山県',
                '34'=>'広島県',
                '35'=>'山口県',
                '36'=>'徳島県',
                '37'=>'香川県',
                '38'=>'愛媛県',
                '39'=>'高知県',
                '40'=>'福岡県',
                '41'=>'佐賀県',
                '42'=>'長崎県',
                '43'=>'熊本県',
                '44'=>'大分県',
                '45'=>'宮崎県',
                '46'=>'鹿児島県',
                '47'=>'沖縄県'
            );


            $gender_array = array(
                '1'=>'男性',
                '2'=>'女性'
            );
        ?>
        <table  border="1" >
            <?php
                echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                echo "<tr><th>名前</th><td>" . $result['name'] . "</td></tr>";
                echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                echo "<tr><th>年齢</th><td>" . $result['age'] . "</td></tr>";
                echo "<tr><th>所属部署ID</th><td>" . $res_sec['section_name'] . "</td></tr>";
                echo "<tr><th>役職</th><td>" . $res_gra['grade_name'] . "</td></tr>";

            ?>
        </table>

        <form method='post' action='result01.php' style="text-align:right">
            <input type="submit" value="編集" >
        </form>
        <form method='post' action='delete.php' style="text-align:right">
            <input type="submit" id="del" name="delete" value="削除" onclick="func1()"><div id="div1"></div>
            <input type="hidden" id="del" name="delete" value="<?php echo $result['member_ID']; ?>" />
            <script language="javascript" type="text/javascript">
                const del = document.getElementById('del');
                const div1 = document.getElementById('div1');

                const func1 = () => {
                    if(del.value == 0 ) {
                        alert('名前は必須です');
                    }else {
                        if (window.confirm('送信してもよろしいですか？')) {

                        }else{
                        }
                    }
                };
            </script>
        </form>
    </body>
</html>
