<!DOCTYPE html>
<html>
        <?php require_once 'include/header.php'; ?>
    <body>
        <?php require_once 'include/def.php';
        require_once 'include/DB.php';
            $query_str = "SELECT * FROM section1_master WHERE 1";
            $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result = $sql->fetchAll();

            $query_str = "SELECT * FROM grade_master WHERE 1";
            $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result01 = $sql->fetchAll();
        ?>
            <table border="1" align="center"  style="width: 40%"class="table table-striped table-hover table table-sm">
                <form action="detail01.php" method="post"onsubmit="return check()">
                            <tr>
                                <th>名前 </th>
                                <td ><input type="text" name="name" id=name maxlength="30" value=""></td>
                            </tr>
                            <tr>
                               <th>出身地 </th>
                               <td ><select class="form-select form-select-sm"name='pref'id=pref>
                                   <?php require './include/common.php'; ?>
                                   <?php
                                        $name='name="pref"';
                                            foreach ($pref_array as $key => $value){
                                                echo "<option ". $name ."value=". $key .">" . $value ."</option>";
                                            }
                                   ?>
                               </select>
                               </td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td >
                                    <label><input type="radio" name="seibetu" value="1" checked="checked">男</label>
                                    <label><input type="radio" name="seibetu" value="2">女</label>
                                </td>
                            </tr>
                            <tr>
                                <th>年齢 </th>
                                    <td ><input type="number" name="age" id=age value="">歳</td>
                              </td>

                            </tr>
                            <tr>
                               <th>所属部署</th>
                               <td><?php
                                    foreach ($result as $key){
                                       if($key['ID'] == 1 ){
                                           echo "<label><input type='radio' name='section_ID' checked='checked' value=". $key['ID'] .">" . $key['section_name'] . "</label>";
                                       }else{
                                           echo "<label><input type='radio' name='section_ID' value=".$key['ID'] .">" . $key['section_name']. "</label>";
                                       }
                                   }
                               ?></td>
                            </tr>
                            <tr>
                               <th>役職</th>
                               <td ><?php
                                    foreach ($result01 as $key){
                                       if($key['ID'] == 1 ){
                                           echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $key['ID'] .">" . $key['grade_name'] . "</label>";
                                       }else{
                                           echo "<label><input type='radio' name='grade_ID' value=".$key['ID'] .">" . $key['grade_name']. "</label>";
                                       }
                                   }
                               ?></td>
                            </tr>
            </table>
                        <div class="d-grid gap-2 col-4 mx-auto">
                        <input type="submit" class="btn btn-outline-success"value="登録">
                        <input type="reset" class="btn btn-outline-danger"></div>
                </form>
                <script type="text/javascript">
                    const name = document.getElementById('name');
                    const pref = document.getElementById('pref');
                    const age = document.getElementById('age');

                    function check(){
                        if(name.value.length == 0){
                            alert("名前を入力してください");
                            return false;
                        }else if(pref.value== 0 ) {
                            alert('都道府県は必須です');
                            return false;

                        }else if(age.value.length == 0){
                            alert('年齢は必須です');
                            return false;
                        }else if(isNaN(age.value)){
                            alert('数値を入力してください');
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
