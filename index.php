<!DOCTYPE html>
<html>
    <?php require_once './include/header.php'; ?>
    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <body>
        <?php
            //共有フォルダを参照する
            require './include/def.php';
            require './include/DB.php';
            require './include/common_no0.php';

            if(!empty($_POST['delete'])){
                $stmt = $pdo->prepare('DELETE FROM member WHERE member.member_ID = :id');
                $stmt->execute(array(':id' => $_POST["delete"]));
            }
            else{
            }

            $section_str="SELECT * FROM section1_master WHERE 1 ";
            $sec_sql = $pdo->prepare($section_str);
            $sec_sql->execute();
            $section_result = $sec_sql->fetchAll();

            $grade_str="SELECT * FROM grade_master WHERE 1 ";
            $gra_sql = $pdo->prepare($grade_str);
            $gra_sql->execute();
            $grade_result = $gra_sql->fetchAll();
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
                    $name = $_GET['name'];
                }
                echo '名前：<input type="text" name="name" size="30" maxlength="30" value="' . $name . '">';


                $param_seibetu="";
                if(isset($_GET['seibetu']) && !empty($_GET['seibetu'])){
                    $param_seibetu = $_GET['seibetu'];
                }
            ?>
                性別：<select name="seibetu">
                    <option value='' <?php if($param_seibetu == ''){echo "selected";} ?> >すべて</option>
                    <option value='1' <?php if($param_seibetu == '1'){echo "selected";} ?> >男</option>
                    <option value='2' <?php if($param_seibetu == '2'){echo "selected";} ?> >女</option>
                </select>

            <?php
                $param_section = "";
                $name='name="section_ID"';
                if(isset($_GET['section_ID']) && !empty($_GET['section_ID'])){
                    $param_section = $_GET['section_ID'];
                }
            ?>
                部署：<select name="section_ID">
                    <option value='' <?php if($param_section == ''){echo "selected";} ?> >すべて</option>
                    <option value='1' <?php if($param_section == '1'){echo "selected";} ?> >第一事業部</option>
                    <option value='2' <?php if($param_section == '2'){echo "selected";} ?> >第二事業部</option>
                    <option value='3' <?php if($param_section == '3'){echo "selected";} ?> >営業</option>
                    <option value='4' <?php if($param_section == '4'){echo "selected";} ?> >総務</option>
                    <option value='5' <?php if($param_section == '5'){echo "selected";} ?> >人事</option>
                </select>

            <?php
                $param_grade = "";
                $name='name="grade_ID"';
                if(isset($_GET['grade_ID']) && !empty($_GET['grade_ID'])){
                    $param_section = $_GET['grade_ID'];
                }
            ?>
                部署：<select name="grade_ID">
                    <option value='' <?php if($param_section == ''){echo "selected";} ?> >すべて</option>
                    <option value='1' <?php if($param_section == '1'){echo "selected";} ?> >事業部長</option>
                    <option value='2' <?php if($param_section == '2'){echo "selected";} ?> >部長</option>
                    <option value='3' <?php if($param_section == '3'){echo "selected";} ?> >チームリーダー</option>
                    <option value='4' <?php if($param_section == '4'){echo "selected";} ?> >リーダー</option>
                    <option value='5' <?php if($param_section == '5'){echo "selected";} ?> >メンバー</option>
                </select><br>
                <div class="d-grid gap-2 col-6 mx-auto">
            <input type="submit" class="btn btn-info "  value="検索" >
                </div>
        </form>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" onclick="resetForm()" class="btn btn-secondary">リセット</button>
        </div>
        <hr>

        <!-- <table style="border-collapse:collapse;" border="1"> -->
        <table class="table table-striped table-hover">
            <tr>
                <th>社員ID</th><th>名前</th><th>性別</th><th>部署</th><th>役職</th>
            </tr>

            <?php
                $where_str = "";
                $query_str = "SELECT member.member_ID , member.name , member.seibetu , grade_master.grade_name , section1_master.section_name
                 FROM member
                 LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                 LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                 WHERE 1 ";

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
                        echo "<td>" . $member['section_name'] . "</td>";
                        echo "<td>" . $member['grade_name'] . "</td></tr>";
                    }
                    echo "検索結果：" . $cnt . "件";
                }
            ?>
        </table>
    </body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
