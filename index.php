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

            require './include/common.php';
        ?>

        <h1>社員名簿システム</h1>
        |<a href="./index.php" >トップページ</a>|
        <a href="./entry01.php">新規社員情報登録ページ</a>|<br>

        <hr color="#00ff00" size="3">

        <form method='get' action='index.php'>
            名前：<input type="text" name="name" size="30" maxlength="30">

            性別：<select name="seibetu">
                <option value="0" selected="selected">すべて</option>
                <option value="1">男</option>
                <option value="2">女</option>
            </select>

            年齢：<input type="text" name="age"><br>

            都道府県：<select name="pref">
            <?php
                $name='name="pref"';
                foreach ($pref as $key => $value){
                    echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                }
            ?></select>

            部署：<select name="section_ID">
            <?php
                $name='name="section_ID"';
                foreach ($section_ID as $key => $value){
                    echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                }
            ?></select>

            役職：<select name="grade_ID">
            <?php
                $name='name="section_ID"';
                foreach ($grade_ID as $key => $value){
                    echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                }
            ?></select><br>

            <input type="submit" value="検索">
            <input type="reset" value="リセット">

        </form>

        <hr color="#00ff00" size="3">

            <?php
                $where_str = "";
                $query_str = "SELECT * FROM member WHERE 1 ";

                if(isset($_GET['name']) && !empty($_GET['name'])){
                    $where_str .= "AND name LIKE '%" . $_GET['name'] . "%' ";
                }

                if($_GET['seibetu'] == !0 ){
                    $where_str .= "AND seibetu = '". $_GET['seibetu'] . "' ";
                }

                if(isset($_GET['age']) && !empty($_GET['age'])){
                    $where_str .= "AND age = '". $_GET['age'] . "' ";
                }

                if($_GET['pref'] == !0 ){
                    $where_str .= "AND pref = '". $_GET['pref'] . "' ";
                }

                if($_GET['section_ID'] == !0 ){
                    $where_str .= "AND section_ID = '". $_GET['section_ID'] . "' ";
                }

                if($_GET['grade_ID'] == !0 ){
                    $where_str .= "AND grade_ID = '". $_GET['grade_ID'] . "' ";
                }

                $query_str .= $where_str;
                $sql = $pdo->prepare($query_str);
                $sql->execute();
                $result = $sql->fetchAll();
                $cnt = count($result);

                if($cnt == 0){
                    echo "検索結果：なし";
                }
                else{
            ?>
                    <table border="1" style="border-collapse:collapse" align="center">
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
                    foreach($result as $member){
                        echo "<tr><td>" . $member['member_ID'] . "</td>";
            ?>
                        <td><a href="./detail01.php?member_ID=<?php echo $member["member_ID"]?>"><?php echo $member["name"]; ?></a></td>
            <?php
                        echo "<td>" . $pref[$member['pref']] . "</td>";
                        echo "<td>" . $seibetu[$member['seibetu']] . "</td>";
                        echo "<td>" . $member['age'] . "</td>";
                        echo "<td>" . $section_ID[$member['section_ID']] . "</td>";
                        echo "<td>" . $grade_ID[$member['grade_ID']] . "</td></tr>";
                    }
                    echo "検索結果：" . $cnt . "件";
                }
            ?>
        </table>
    </body>
</html>
