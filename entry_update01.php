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
            input type=submit {
                margin-left: auto;
            }
        </style>
    <title>社員情報登録画面</title>

    </head>
    <body>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            //メンバー
            $query_str = "SELECT * FROM member WHERE member.member_ID = :id";
            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute(array(':id' => $_POST["member_ID"]));                      // SQLを実行する
            $result = $sql->fetch();           // 実行結果を取得して$resultに代入する

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

        <h1>社員情報編集</h1>
        <p style="text-align:right"> <a href="./index.php">トップ画面</a>
        <a style="text-align:right" href="./entry01.php">新規登録</a></p>
        <hr>
        <form action="edit.php" method="post">
            <table border="1" >
                <tr>
                    <th>社員ID</th><td><?php echo $result['member_ID'] ?></td>
                </tr>
                <tr>
                   <th>名前 </th>
                   <td ><input type="text" name="name" id="name" value="<?php echo $result['name'] ?>"></td>
                </tr>

                <tr>
                    <th>出身地 </th>
                    <td>
                        <select name='pref'>
                            <?php require 'kyotu-deta.php'; ?>
                            <?php
                                $name='id="pref"';
                                $selected='"selected"';
                                foreach ($pref as $key => $value){
                                    if($result['pref'] == $key ){
                                        echo "<option ". $name ."selected=". $selected."value=". $key .">" . $value . "</option>";
                                    }else{
                                        echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <th>年齢 </th>
                    <td ><input type="text" name="age" id="age" value="<?php echo $result['age'] ?>">歳</td>
                </tr>
               <tr>
                   <th>性別</th>
                   <td >
                       <?php
                            $radio='"radio"';
                            $seibetu='"seibetu"';
                            $checked='"checked"';
                            foreach ($gender_array as $key => $value){
                                if($result['seibetu'] == $key ){
                                    echo "<label><input type=" . $radio . "name=" . $seibetu ."checked=". $checked ."value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type=" . $radio . "name=" . $seibetu ."value=". $key .">" . $value . "</label>";
                                }
                            }
                       ?>

                  </td>
               </tr>
               <tr>
                   <th>所属部署</th>
                    <td >
                        <?php
                            $radio='"radio"';
                            $section_ID='"section_ID"';
                            $checked='"checked"';
                            foreach ($section_ID_array as $key => $value){
                                if($result['section_ID'] == $key ){
                                    echo "<label><input type=" . $radio . "name=" . $section_ID ."checked=". $checked ."value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type=" . $radio . "name=" . $section_ID ."value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
               </tr>
               <tr>
                   <th>役職</th>
                    <td>
                        <?php
                            $radio='"radio"';
                            $grade_ID='"grade_ID"';
                            $checked='"checked"';
                            foreach ($grade_ID_array as $key => $value){
                                if($result['grade_ID'] == $key ){
                                    echo "<label><input type=" . $radio . "name=" . $grade_ID ."checked=". $checked ."value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type=" . $radio . "name=" . $grade_ID ."value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
                </tr>
            </table>
            <p style="text-align:right">
                <input type="submit" value="編集" id="button1" onclick="func1()"><div id="div1"></div>
                <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
            </p>
            <p style="text-align:right">
                <input type="reset">
            </p>
            <script language="javascript" type="text/javascript">
                const name = document.getElementById('name');
                const pref = document.getElementById('pref');
                const age = document.getElementById('age');
                const button1 = document.getElementById('button1');
                const div1 = document.getElementById('div1');

                const func1 = () => {
                    if(name.value.length == 0 ) {
                        alert('名前は必須です');
                    }else if(pref.value.length == 0 ) {
                        alert('都道府県は必須です');
                    }else if(age.value.length == 0){
                        alert('年齢は必須です');
                    }else if(isNaN(age.value)){
                        alert('数値を入力してください');
                    }else if(age.value >= 100){
                        alert('1-99の範囲で入力してください');
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
