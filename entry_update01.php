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
            td { width: 450px; }
            input type=submit {
                margin-left: auto;
            }
        </style>
        <title>社員情報登録画面</title>
        <script type="text/javascript">
            function check(){
                if (window.confirm('送信してもよろしいですか？')) {
                    return true;
                }else{
                    return false;
                }
            }
        </script>
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
        ?>

        <h1>社員情報編集</h1>
        <p style="text-align:right"> <a href="./index.php">トップ画面</a>
        <a style="text-align:right" href="./entry01.php">新規登録</a></p>
        <hr>
        <form method="post" action ="edit.php" onsubmit="return check()">
            <table border="1" >
                <?php require 'include/common.php'; ?>
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

                            <?php
                                foreach ($pref_array as $key => $value){
                                    if($result['pref'] == $key ){
                                        echo "<option id='pref' selected='selected' value=". $key .">" . $value . "</option>";
                                    }else{
                                        echo "<option id='pref' value=". $key .">" . $value . "</option>";
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
                            foreach ($gender_array as $key => $value){
                                if($key == 0){

                                }else if($result['seibetu'] == $key ){
                                    echo "<label><input type='radio' name='seibetu' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='seibetu' value=". $key .">" . $value . "</label>";
                                }
                            }
                       ?>
                  </td>
               </tr>
               <tr>
                   <th>所属部署</th>
                    <td >
                        <?php
                            foreach ($section_ID_array as $key => $value){
                                if($key == 0){

                                }else if($result['section_ID'] == $key ){
                                    echo "<label><input type='radio' name='section_ID' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='section_ID' value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
               </tr>
               <tr>
                   <th>役職</th>
                    <td>
                        <?php
                            foreach ($grade_ID_array as $key => $value){
                                if($key == 0){

                                }else if($result['grade_ID'] == $key ){
                                    echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='grade_ID' value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?>
                   </td>
                </tr>
            </table>
            <p style="text-align:right">
                <input type="submit" value="編集" onclick="check()">
                <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
            </p>
            <p style="text-align:right">
                <input type="reset">
            </p>
       </form>
    </body>
</html>
