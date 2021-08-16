<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>トップページ</title>
    </head>
    <body>

        <?php
            $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

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

            $section_ID_array = array(
                '1'=>'第一事業部',
                '2'=>'第二事業部',
                '3'=>'営業',
                '4'=>'総務',
                '5'=>'人事',
            );

            $grade_ID_array = array(
                '1'=>'事業部長',
                '2'=>'部長',
                '3'=>'チームリーダー',
                '4'=>'リーダー',
                '5'=>'メンバー',
            );
        ?>

        <h1>社員名簿システム</h1>
        <form method='post' action='.php'>
            名前入力：<input type="text" name="name" size="40" maxlength="10"><br>
            <select name="pref"><option value="0" selected="selected">都道府県を選択してください</option>
                <option value="1">北海道</option>
                <option value="2">青森県</option>
                <option value="3">岩手県</option>
                <option value="4">宮城県</option>
                <option value="5">秋田県</option>
                <option value="6">山形県</option>
                <option value="7">福島県</option>
                <option value="8">茨木県</option>
                <option value="9">栃木県</option>
                <option value="10">群馬県</option>
                <option value="11">埼玉県</option>
                <option value="12">千葉県</option>
                <option value="13">東京都</option>
                <option value="14">神奈川県</option>
                <option value="15">新潟県</option>
                <option value="16">富山県</option>
                <option value="17">石川県</option>
                <option value="18">福井県</option>
                <option value="19">山梨県</option>
                <option value="20">長野県</option>
                <option value="21">岐阜県</option>
                <option value="22">静岡県</option>
                <option value="23">愛知県</option>
                <option value="24">三重県</option>
                <option value="25">滋賀県</option>
                <option value="26">京都府</option>
                <option value="27">大阪府</option>
                <option value="28">兵庫県</option>
                <option value="29">奈良県</option>
                <option value="30">和歌山県</option>
                <option value="31">鳥取県</option>
                <option value="32">島根県</option>
                <option value="33">岡山県</option>
                <option value="34">広島県</option>
                <option value="35">山口県</option>
                <option value="36">徳島県</option>
                <option value="37">香川県</option>
                <option value="38">愛媛県</option>
                <option value="39">高知県</option>
                <option value="40">福岡県</option>
                <option value="41">佐賀県</option>
                <option value="42">長崎県</option>
                <option value="43">熊本県</option>
                <option value="44">大分県</option>
                <option value="45">宮崎県</option>
                <option value="46">鹿児島県</option>
                <option value="47">沖縄県</option>
            </select><br>

            <input type="radio" name="seibetu" checked="checked" value="1">男性<br>
                <input type="radio" name="seibetu" value="2">女性<br>

            <input type="text" name="name" size="5" maxlength="10"><br>

            <input type="radio" name="section_ID" checked="checked" value="1">第一事業部<br>
                <input type="radio" name="section_ID" value="2">第二事業部<br>
                <input type="radio" name="section_ID" value="3">営業<br>
                <input type="radio" name="section_ID" value="4">総務<br>
                <input type="radio" name="section_ID" value="5">人事<br>

            <input type="radio" name="grade_ID" checked="checked" value="1">事業部長<br>
                <input type="radio" name="grade_ID" value="2">部長<br>
                <input type="radio" name="grade_ID" value="2">チームリーダー<br>
                <input type="radio" name="grade_ID" value="2">リーダー<br>
                <input type="radio" name="grade_ID" value="2">メンバー<br>

        </form>

        <table border="1" style="border-collapse:collapse";>
            <tr>
                <th>社員ID</th>
                <th>名前</th>
                <th>都道府県</th>
                <th>性別</th>
                <th>年齢</th>
                <th>部署</th>
                <th>役職</th>
            </tr>

            <?php
                $query_str = "SELECT * FROM member WHERE 1";

                echo $query_str;
                $sql = $pdo->prepare($query_str);
                $sql->execute();
                $result = $sql->fetchAll();

                foreach($result as $member){
                    echo "<tr><td>" . $member['member_ID'] . "</td>";
                    echo "<td>" . $member['name'] . "</td>";
                    echo "<td>" . $pref_array[$member['pref']] . "</td>";
                    echo "<td>" . $gender_array[$member['seibetu']] . "</td>";
                    echo "<td>" . $member['age'] . "</td>";
                    echo "<td>" . $section_ID_array[$member['section_ID']] . "</td>";
                    echo "<td>" . $grade_ID_array[$member['grade_ID']] . "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>
