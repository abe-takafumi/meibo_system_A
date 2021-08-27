<!DOCTYPE html>
<html>
    <?php require_once './include/header.php'; ?>
    <body>
        <?php
            require_once './include/def.php';
            //共有フォルダを参照する
            require './include/common_no0.php';

            if(!empty($_POST['delete'])){
                $stmt = $pdo->prepare('DELETE FROM member WHERE member.member_ID = :id');
                $stmt->execute(array(':id' => $_POST["delete"]));
            }
            else{
            }

            $section_str="SELECT * FROM section1_master WHERE 1 ";
            $sql = $pdo->prepare($section_str);
            $sql->execute();
            $section_result = $sql->fetchAll();
            var_dump($section_result);

            $grade_str="SELECT * FROM grade_master WHERE 1 ";
            $sql = $pdo->prepare($grade_str);
            $sql->execute();
            $grade_result = $sql->fetchAll();
        ?>

        <script type="text/javascript">
            function resetForm(){
                document.fm1.name.value="";
                document.fm1.seibetu.value="";
                document.fm1.section_ID.value="";
                document.fm1.grade_ID.value="";
            }
        </script>

        <form method='get' action='index.php' name='fm1'>
            <?php
                //検索した文字列や選択した内容を初期値として保存するためのif文
                $name = "";
                if(isset($_GET['name']) && !empty($_GET['name'])){
                    echo '名前：<input type="text" name="name" size="30" maxlength="30" value="'.$_GET["name"] . '">';
                }
                else{
                    echo '名前：<input type="text" name="name" size="30" maxlength="30">';
                }


                echo '性別：<select name="seibetu">';
                if(isset($_GET['seibetu']) && !empty($_GET['seibetu'])){
                    echo '<option value="">すべて</option>';
                    if($_GET['seibetu'] == 1){
                            echo '<option value="1" selected="selected">男</option>';
                            echo '<option value="2">女</option>';
                    }
                    else{
                            echo '<option value="1">男</option>';
                            echo '<option value="2" selected="selected">女</option>';
                    }
                }
                else{
                        echo '<option value="" selected="selected">すべて</option>';
                        echo '<option value="1">男</option>';
                        echo '<option value="2">女</option>';
                }
                echo "</select>";

                echo '部署：<select name="section_ID">';
                $name='name="section_ID"';
                if(isset($_GET['section_ID']) && !empty($_GET['section_ID'])){
                    echo '<option value="">すべて</option>';
                    foreach ($section_result as $sec){
                        if($_GET['section_ID'] == $sec['ID']){
                            echo "<option ". $name ."value=". $sec['ID'] ." selected='selected'>" . $sec['section_name'] . "</option>";
                        }
                        else{
                            echo "<option ". $name ."value=". $sec['ID'] .">" . $sec['section_name'] . "</option>";
                        }
                    }
                }
                else{
                    echo '<option value="" selected="selected">すべて</option>';
                    foreach ($section_result as $sec){
                        echo "<option ". $name ."value=". $sec['ID'] .">" . $sec['section_name'] . "</option>";
                    }
                }
            ?></select>

            役職：<select name="grade_ID">
            <?php
                $name='name="grade_ID"';
                if(isset($_GET['grade_ID']) && !empty($_GET['grade_ID'])){
                    echo '<option value="">すべて</option>';
                    foreach ($grade_result as $gra){
                        if($_GET['grade_ID'] == $gra['ID']){
                            echo "<option ". $name ."value=". $gra['ID'] ." selected='selected'>" . $gra['grade_name'] . "</option>";
                        }
                        else{
                            echo "<option ". $name ."value=". $gra['ID'] .">" . $gra['grade_name'] . "</option>";
                        }
                    }
                }
                else{
                    echo '<option value="" selected="selected">すべて</option>';
                    foreach ($grade_result as $gra){
                        echo "<option ". $name ."value=". $gra['ID'] .">" . $gra['grade_name'] . "</option>";
                    }
                }
            ?></select><br>

            <input type="submit" value="検索">
        </form>
        <button type="button" onclick="resetForm()">リセット</button>

        <hr>

        <table style="border-collapse:collapse;" border="1">
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
                        echo "<td>" . $section_result[$member['section_ID']] . "</td>";
                        echo "<td>" . $grade_result[$member['grade_ID']] . "</td></tr>";
                    }
                    echo "検索結果：" . $cnt . "件";
                }
            ?>
        </table>
    </body>
</html>
