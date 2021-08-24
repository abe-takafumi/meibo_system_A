<!DOCTYPE html>
<html>
        <?php require_once 'include/header.php'; ?>
    <body>
        <?php require_once 'include/def.php'; ?>
            <table border="1"style="border-collapse:collapse" align="center" >
                <form action="detail01.php" method="post"onsubmit="return check()">
                            <tr>
                                <th>名前 </th>
                                <td ><input type="text" name="name" id=name value=""></td>
                            </tr>
                            <tr>
                               <th>出身地 </th>
                               <td ><select name='pref'id=pref>
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
                                <td ><label><input type="radio" name="section_name" value="1"checked="checked">第一事業部</label>
                                    <label><input type="radio" name="section_name" value="2">第二事業部</label>
                                    <label><input type="radio" name="section_name" value="3">営業</label>
                                    <label><input type="radio" name="section_name" value="4">総務</label>
                                    <label><input type="radio" name="section_name" value="5">人事</label>
                               </td>
                            </tr>
                            <tr>
                               <th>役職</th>
                                <td><label><input type="radio" name="grade_name" value="1"checked="checked">事業部長</label>
                                    <label><input type="radio" name="grade_name" value="2">部長</label>
                                    <label><input type="radio" name="grade_name" value="3">チームリーダー</label>
                                    <label><input type="radio" name="grade_name" value="4">リーダー</label>
                                    <label><input type="radio" name="grade_name" value="5">メンバー</label>
                               </td>
                            </tr>
            </table>
                            <p style="text-align: right">
                             <input type="submit"value="登録"><input type="reset">
                            </p>
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
                        }else if(age.value >= 100){
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
