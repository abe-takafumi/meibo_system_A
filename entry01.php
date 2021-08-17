<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>新規社員情報登録</title>
    </head>
    <body>
        <h1>新規登録</h1>
        <p style="text-align:right"> <a href="./index.php">トップ画面</a>
        <a style="text-align:right" href="./entry01.php">新規登録</a></p>
            <?php
                echo "<hr>";
            ?>
                <table border="1" >
                    <form action="result.php" method="post">
                            <tr>
                               <td>名前 </td>
                               <td ><input type="text" name="name" value=""></td>
                           </tr>
                           <tr>
                               <td>出身地 </td>
                               <td ><select name="pref">
                                        <option  selected="selected">都道府県</option>
                                        <option name="pref"value="1">北海道</option>
                                        <option name="pref"value="2">青森県</option>
                                        <option name="pref"value="3">岩手県</option>
                                        <option name="pref"value="4">宮城県</option>
                                        <option name="pref"value="5">秋田県</option>
                                        <option name="pref"value="6">山形県</option>
                                        <option name="pref"value="7">福島県</option>
                                        <option name="pref"value="8">茨城県</option>
                                        <option name="pref"value="9">栃木県</option>
                                        <option name="pref"value="10">群馬県"</option>
                                        <option name="pref"value="11">埼玉県</option>
                                        <option name="pref"value="12">千葉県</option>
                                        <option name="pref"value="13">東京都</option>
                                        <option name="pref"value="14">神奈川県</option>
                                        <option name="pref"value="19">山梨県</option>
                                        <option name="pref"value="15">新潟県</option>
                                        <option name="pref"value="16">富山県</option>
                                        <option name="pref"value="17">石川県</option>
                                        <option name="pref"value="18">福井県県</option>
                                        <option name="pref"value="20">長野県</option>
                                        <option name="pref"value="21">岐阜県</option>
                                        <option name="pref"value="22">静岡県</option>
                                        <option name="pref"value="23">愛知県</option>
                                        <option name="pref"value="24">三重県</option>
                                        <option name="pref"value="25">滋賀県</option>
                                        <option name="pref"value="26">京都府</option>
                                        <option name="pref"value="27">大阪府</option>
                                        <option name="pref"value="28">兵庫県</option>
                                        <option name="pref"value="29">奈良県</option>
                                        <option name="pref"value="30">和歌山県</option>
                                        <option name="pref"value="31">鳥取県</option>
                                        <option name="pref"value="32">島根県</option>
                                        <option name="pref"value="33">岡山県</option>
                                        <option name="pref"value="34">広島県</option>
                                        <option name="pref"value="35">山口県</option>
                                        <option name="pref"value="36">徳島県</option>
                                        <option name="pref"value="37">香川県</option>
                                        <option name="pref"value="38">愛媛県</option>
                                        <option name="pref"value="39">高知県</option>
                                        <option name="pref"value="40">福岡県</option>
                                        <option name="pref"value="41">佐賀県</option>
                                        <option name="pref"value="42">長崎県</option>
                                        <option name="pref"value="43">熊本県</option>
                                        <option name="pref"value="44">大分県</option>
                                        <option name="pref"value="45">宮崎県</option>
                                        <option name="pref"value="46">鹿児島県</option>
                                        <option name="pref"value="47">沖縄県</option>
                                       </select>
                               </td>
                           </tr>
                            <tr>
                                <td>年齢 </td>
                                <td ><input type="text" name="age" value="">歳</td>
                            </tr>
                           <tr>
                               <td>性別</td>
                               <td ><label><input type="radio" name="seibetu" value="1">男</label>
                                   <label><input type="radio" name="seibetu" value="2">女</label>
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
                       <p style="text-align:right"> <input type="submit"><input type="reset"></p>
                   </form>
    </body>
</html>
