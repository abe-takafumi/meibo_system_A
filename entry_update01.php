<!DOCTYPE html>
<html>
    <?php require_once 'include/header.php'; ?>
    <body>
        <?php
            require_once 'include/def.php';
            require_once 'include/DB.php';
            //メンバー
            if(empty($_POST['member_ID'])){
                echo "エラー";
                echo "<a class='btn btn-success' href='./index.php' style='text-align:right' >トップ画面</a>";
                exit;
            }else{
                $id=$_POST["member_ID"];
                $query_str = "SELECT * FROM member WHERE member.member_ID = :id";
                $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                $sql->execute(array(':id' => $_POST["member_ID"]));                      // SQLを実行する
                $result = $sql->fetch();           // 実行結果を取得して$resultに代入する

                $query_str_sec = "SELECT * FROM section1_master WHERE 1";                                                           // 実行するSQL文を画面に表示するだけ（デバッグプリント
                $sql_sec = $pdo->prepare($query_str_sec);                              // PDOオブジェクトにSQLを渡す
                $sql_sec->execute();                                                            // SQLを実行する
                $res_sec = $sql_sec->fetchAll();                                             // 実行結果を取得して$resultに代入する

                $query_str_gra = "SELECT * FROM grade_master WHERE 1";                                                           // 実行するSQL文を画面に表示するだけ（デバッグプリント
                $sql_gra = $pdo->prepare($query_str_gra);                              // PDOオブジェクトにSQLを渡す
                $sql_gra->execute();                                                            // SQLを実行する
                $res_gra = $sql_gra->fetchAll();
            }
        ?>
        <form method="post" action ="detail01.php" onsubmit="return check()">
            <table class='table table-striped table table-hover table-striped'>
                <?php require 'include/common_no0.php'; ?>
                <tr>
                    <th>社員ID</th><td><?php echo $result['member_ID'] ?></td>
                </tr>
                <tr>
                   <th>名前 </th>
                   <td ><input type="text" name="name" id="name" size="30" value="<?php echo $result['name'] ?>"></td>
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
                                        echo "<option id='pref'                     value=". $key .">" . $value . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
               </tr>
               <tr>
                   <th>性別</th>
                   <td >
                       <?php
                            foreach ($gender_array as $key => $value){
                                if($result['seibetu'] == $key ){
                                    echo "<label><input type='radio' name='seibetu' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='seibetu' value=". $key .">" . $value . "</label>";
                                }
                            }
                       ?>
                  </td>
                </tr>
                <tr>
                   <th>年齢 </th>
                   <td ><input type="number" name="age" id="age" value="<?php echo $result['age'] ?>">歳</td>
                </tr>
                <tr>
                   <th>所属部署</th>
                    <td >
                        <?php
                            foreach ($res_sec as $sec){
                                if($result['section_ID'] == $sec['ID'] ){
                                    echo "<label><input type='radio' name='section_ID' checked='checked' value=". $sec['ID'] .">" . $sec['section_name'] . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='section_ID' value=". $sec['ID'] .">" . $sec['section_name'] . "</label>";
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>役職</th>
                    <td>
                        <?php
                            foreach ($res_gra as $gra){
                                if($result['grade_ID'] == $gra['ID'] ){
                                    echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $gra['ID'] .">" . $gra['grade_name'] . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='grade_ID' value=". $gra['ID'] .">" . $gra['grade_name'] . "</label>";
                                }
                            }
                        ?>
                   </td>
                </tr>
            </table>
            <p style="text-align:right" class="d-grid gap-2">
                <input type="submit" value="編集" class="btn btn-outline-primary" />
                <input type="hidden" name="member_ID"value="<?php echo $result['member_ID']; ?>" />
                <input type="reset" class="btn btn-outline-danger">
            </p>
        </form>
        <script type="text/javascript">
            const name = document.getElementById('name');
            const pref = document.getElementById('pref');
            const age = document.getElementById('age');

            function check(){
                if(name.value == ""){
                    alert("名前を入力してください");
                    return false;
                }else if(age.value == ""){
                    alert('年齢は必須です');
                    return false;
                }else if(isNaN(age.value)){
                    alert('年齢欄に半角の数値を入力してください');
                    return false;
                }else if(age.value >= 100 || age.value < 1){
                    alert('1-99の範囲で入力してください');
                    return false;
                }else if (window.confirm('送信してもよろしいですか？')) {
                    return true;
                }else{
                    return false;
                }
            }
        </script>
    </body>
</html>
