<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>トップページ</title>
    </head>
    <body>
        <?php
            //DBのデータを参照する
            $DB_DSN = "mysql:host=localhost; dbname=tabe; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            //共有フォルダを参照する
            require './include/common_no0.php';
        ?>

        <h1>社員名簿システム</h1>
        <p style="text-align:right"> <a href="./index.php">トップ画面</a>
        <a style="text-align:right" href="./entry01.php">新規登録</a></p>

        <hr color="#00ff00" size="3">


        <form method='get' action='index.php'>
            <?php
                //検索した文字列や選択した内容を初期値として保存するためのif文
                if(isset($_GET['name']) && !empty($_GET['name'])){
                    echo '名前：<input type="text" name="name" size="30" maxlength="30" value="'.$_GET["name"] . '">';
                }
                else{
                    echo '名前：<input type="text" name="name" size="30" maxlength="30">';
                }

                if(isset($_GET['seibetu']) && !empty($_GET['seibetu'])){
                    if($_GET['seibetu'] == 1){
                        echo '性別：<select name="seibetu">';
                            echo '<option value="">すべて</option>';
                            echo '<option value="1" selected="selected">男</option>';
                            echo '<option value="2">女</option>';
                        echo '</select>';
                    }
                    else{
                        echo '性別：<select name="seibetu">';
                            echo '<option value="">すべて</option>';
                            echo '<option value="1">男</option>';
                            echo '<option value="2" selected="selected">女</option>';
                        echo '</select>';
                    }
                }
                else{
                    echo '性別：<select name="seibetu">';
                        echo '<option value="" selected="selected">すべて</option>';
                        echo '<option value="1">男</option>';
                        echo '<option value="2">女</option>';
                    echo '</select>';
                }
            ?>

            部署：<select name="section_ID">
            <?php
                $name='name="section_ID"';
                if(isset($_GET['section_ID']) && !empty($_GET['section_ID'])){
                    echo '<option value="">すべて</option>';
                    foreach ($section_ID_array as $key => $value){
                        if($value == 'section_ID'){
                            echo "<option ". $name ."value=". $key ."selected='selected'>" . $value . "</option>";
                        }
                        else{
                            echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                        }
                    }
                }
                else{
                    echo '<option value="" selected="selected">すべて</option>';
                    foreach ($section_ID_array as $key => $value){
                        echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                    }
                }
            ?></select>

            役職：<select name="grade_ID">
            <?php
                $name='name="section_ID"';
                echo '<option value="" selected="selected">すべて</option>';
                foreach ($grade_ID_array as $key => $value){
                    echo "<option ". $name ."value=". $key .">" . $value . "</option>";
                }
            ?></select><br>

            <input type="submit" value="検索">
            <input type="reset" value="リセット">

        </form>

        <hr color="#00ff00" size="3">

        <table border="1" style="border-collapse:collapse" align="center">
            <tr>
                <th>社員ID</th>
                <th>名前</th>
                <th>性別</th>
                <th>部署</th>
                <th>役職</th>
            </tr>

            <?php
                $where_str = "";
                $query_str = "SELECT * FROM member WHERE 1 ";

                if(isset($_GET['name']) && !empty($_GET['name'])){
                    $where_str .= "AND name LIKE '%" . $_GET['name'] . "%' ";
                }

                if(isset($_GET['seibetu']) && !empty($_GET['seibetu'])){
                    $where_str .= "AND seibetu = '" . $_GET['seibetu'] . "' ";
                }

                if(isset($_GET['section_ID']) && !empty($_GET['section_ID'])){
                    $where_str .= "AND section_ID = '". $_GET['section_ID'] . "' ";
                }

                if(isset($_GET['grade_ID']) && !empty($_GET['grade_ID'])){
                    $where_str .= "AND grade_ID = '". $_GET['grade_ID'] . "' ";
                }

                $query_str .= $where_str;
                $sql = $pdo->prepare($query_str);
                $sql->execute();
                $result = $sql->fetchAll();
                $cnt = count($result);


                if($cnt == 0){
                    echo "<tr><td colspan='5'>検索結果なし</td></tr>";
                }
                else{
                    foreach($result as $member){
                        echo "<tr><td>" . $member['member_ID'] . "</td>";
            ?>
                        <td><a href="./detail01.php?member_ID=<?php echo $member["member_ID"]?>"><?php echo $member["name"]; ?></a></td>
            <?php
                        echo "<td>" . $gender_array[$member['seibetu']] . "</td>";
                        echo "<td>" . $section_ID_array[$member['section_ID']] . "</td>";
                        echo "<td>" . $grade_ID_array[$member['grade_ID']] . "</td></tr>";
                    }
                    echo "検索結果：" . $cnt . "件";
                }
            ?>
        </table>
    </body>
</html>
