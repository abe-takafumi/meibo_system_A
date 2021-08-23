<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>新規社員情報登録</title>
    </head>
    <body>
        <h1>新規登録</h1>
        <p style="text-align:right"> |<a href="./index.php">トップ画面</a>|
        <a style="text-align:right" href="./entry01.php">新規登録</a>|</p>
            <?php
                echo "<hr>";
            ?>
            <table border="1"style="border-collapse:collapse" align="center" >
                <form action="result.php" method="post">
                            <tr>
                                <td>名前 </td>
                                <td ><input type="text" name="name" value=""></td>
                            </tr>
                            <tr>
                               <td>出身地 </td>
                               <td ><select name='pref'>
                                   <?php require './include/common.php'; ?>
                                   <?php
                                        $name='name="pref"';
                                            foreach ($pref as $key => $value){
                                                echo "<option ". $name ."value=". $key .">" . $value ."</option>";
                                            }
                                   ?>
                               </select>
                               </td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td ><label><input type="radio" name="seibetu" value="1">男</label>
                                    <label><input type="radio" name="seibetu" value="2">女</label>
                                </td>
                            </tr>
                            <tr>
                                <td>年齢 </td>
                                    <td ><input type="text" name="age" value="">歳</td>
                              </td>

                            </tr>
                            <tr>
                               <td>所属部署</td>
                                <td ><label><input type="radio" name="section_name" value="1">第一事業部</label>
                                    <label><input type="radio" name="section_name" value="2">第二事業部</label>
                                    <label><input type="radio" name="section_name" value="3">営業</label>
                                    <label><input type="radio" name="section_name" value="4">総務</label>
                                    <label><input type="radio" name="section_name" value="5">人事</label>
                               </td>
                            </tr>
                            <tr>
                               <td>役職</td>
                                <td><label><input type="radio" name="grade_name" value="1">事業部長</label>
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
    </body>
</html>
