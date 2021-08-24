<!DOCTYPE html>
<html>
    <?php require_once 'include/header.php'; ?>
    <body>
        <?php
            require_once 'include/def.php';
            //メンバー
            $query_str = "SELECT * FROM member WHERE member.member_ID = :id";
            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute(array(':id' => $_POST["member_ID"]));                      // SQLを実行する
            $result = $sql->fetch();           // 実行結果を取得して$resultに代入する
        ?>
        <form method="post" action ="detail01.php" onsubmit="return check()">
            <table border="1" >
                <?php require 'include/common_no0.php'; ?>
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
                                        echo "<option id='pref'                     value=". $key .">" . $value . "</option>";
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
                   <th>所属部署</th>
                    <td >
                        <?php
                            foreach ($section_ID_array as $key => $value){
                                if($result['section_ID'] == $key ){
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
                                if($result['grade_ID'] == $key ){
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
                <input type="submit" value="編集" >
                <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
            </p>
            <p style="text-align:right">
                <input type="reset">
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
