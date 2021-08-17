<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>新規社員情報登録</title>
    </head>
    <body>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            //メンバー $_POST['member_ID']
            $query_str = "SELECT * FROM member WHERE member.member_ID = 60";   // 実行するSQL文を作成して変数に保持
            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する
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

        <h1>新規登録</h1>
        <p style="text-align:right"> <a href="./index.php">トップ画面</a>
        <a style="text-align:right" href="./entry01.php">新規登録</a></p>
        <hr>
        <table border="1" >
            <form action="result.php" method="post">
                <tr>
                    <th>社員ID</th><td><?php echo $result['member_ID'] ?></td>
                </tr>
                <tr>
                   <td>名前 </td>
                   <td ><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
                </tr>

                <tr>
                    <td>出身地 </td>
                    <td>
                        <select name='pref'>
                        <?php
                            //include('kyotu-deta.php');
                            $name='name="pref"';
                            $selected='"selected"';
                            foreach ($pref_array as $key => $value){
                                if($result['pref'] == $key ){
                                    echo "<option ". $name ."selected=". $selected."value=". $key .">" . $value . "</option>";
                                }else{
                                    echo "<option ". $name ."value=". $key .";>" . $value . "</option>";
                                }
                            }
                         ?>
                    </td>
               </tr>
                <tr>
                    <td>年齢 </td>
                    <td ><input type="text" name="age" value="<?php echo $result['age'] ?>">歳</td>
                </tr>
               <tr>
                   <td>性別</td>
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
                   <td>所属部署</td>
                    <td >
                        <?php
                            $radio='"radio"';
                            $section_name='"section_name"';
                            $checked='"checked"';
                            foreach ($section_ID_array as $key => $value){
                                if($result['section_ID'] == $key ){
                                    echo "<label><input type=" . $radio . "name=" . $section_name ."checked=". $checked ."value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type=" . $radio . "name=" . $section_name ."value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
               </tr>
               <tr>
                   <td>役職</td>
                    <td>
                        <?php
                            $radio='"radio"';
                            $grade_name='"grade_name"';
                            $checked='"checked"';
                            foreach ($grade_ID_array as $key => $value){
                                if($result['grade_ID'] == $key ){
                                    echo "<label><input type=" . $radio . "name=" . $grade_name ."checked=". $checked ."value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type=" . $radio . "name=" . $grade_name ."value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
               </tr>

               <p style="text-align:right"> <input type="submit"><input type="reset"></p>
           </form>
        </table>
    </body>
</html>
