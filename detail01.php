<!DOCTYPE html>
<html>
    <?php require_once 'include/header.php'; ?>
    <body>
        <?php
            require_once 'include/def.php';
            if(empty($_GET['member_ID'])){
                if(empty($_POST['member_ID'])){
                    $count = $db->prepare('INSERT INTO member (name, pref, seibetu, age,section_ID,grade_ID) VALUES (:name,:pref,:seibetu,:age,:section_name,:grade_name)');
                    $params = array(':name' =>$_POST["name"],':pref'=>$_POST["pref"],':seibetu'=>$_POST["seibetu"],':age'=>$_POST["age"],':section_name'=>$_POST["section_name"],':grade_name'=>$_POST["grade_name"]);
                    $count->execute($params);
                    $res = $count->fetch();
                    $id = $res['member_ID'];
                    $query_str = "SELECT * FROM member WHERE member.member_ID = $id";   // 実行するSQL文を作成して変数に保持
                    $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                    $sql->execute();
                    
                }else{
                    $stmt = $pdo->prepare('UPDATE member SET name = :name, pref = :pref , seibetu = :seibetu , age = :age , section_ID = :section_ID , grade_ID = :grade_ID WHERE member.member_ID = :id');
                    $stmt->execute(array(':name' => $_POST['name'], ':pref' => $_POST['pref'], ':seibetu' => $_POST['seibetu'],
                    ':age' => $_POST['age'], ':section_ID' => $_POST['section_ID'], ':grade_ID' => $_POST['grade_ID'], ':id' => $_POST['member_ID']));
                    $query_str = "SELECT * FROM member WHERE member.member_ID = :id";
                    $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                    $sql->execute(array(':id' => $_POST["member_ID"]));

                }

            }else{

                $id = $_GET['member_ID'];
                $query_str = "SELECT * FROM member WHERE member.member_ID = $id";   // 実行するSQL文を作成して変数に保持
                $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                $sql->execute();

            }

            $result = $sql->fetch();  // 実行結果を取得して$resultに代入する

            $sec_id = $result['section_ID'];
            $gra_id = $result['grade_ID'];

            //所属部署
            $query_str_sec = "SELECT * FROM section1_master WHERE section1_master.ID = $sec_id";   // 実行するSQL文を作成して変数に保持
            $sql_sec = $pdo->prepare($query_str_sec);     // PDOオブジェクトにSQLを渡す
            $sql_sec->execute();                      // SQLを実行する
            $res_sec = $sql_sec->fetch();           // 実行結果を取得して$resultに代入する

            //役職
            $query_str_gra = "SELECT * FROM grade_master WHERE grade_master.ID = $gra_id";   // 実行するSQL文を作成して変数に保持
            $sql_gra = $pdo->prepare($query_str_gra);     // PDOオブジェクトにSQLを渡す
            $sql_gra->execute();                      // SQLを実行する
            $res_gra = $sql_gra->fetch();          // 実行結果を取得して$resultに代入する
        ?>

        <table  border="1" >
            <?php
                require 'include/common.php';
                echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                echo "<tr><th>名前</th><td>" . $result['name'] . "</td></tr>";
                echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                echo "<tr><th>年齢</th><td>" . $result['age'] . "</td></tr>";
                echo "<tr><th>所属部署</th><td>" . $res_sec['section_name'] . "</td></tr>";
                echo "<tr><th>役職</th><td>" . $res_gra['grade_name'] . "</td></tr>";
            ?>
        </table>

        <form method='post' action='entry_update01.php' style="text-align:right">
            <input type="submit" name="member_ID" value="編集" >
            <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
        </form>

        <form method='post' action='delete.php' onsubmit="return check()" style="text-align:right">
            <input type="submit" name="delete" value="削除">
            <input type="hidden" name="delete" value="<?php echo $result['member_ID']; ?>" />
        </form>

        <script type="text/javascript">
            const del = document.getElementById('del');
            function check(){
                if (window.confirm('削除を行います。よろしいですか？')) {
                    return true;
                }else{
                    return false;
                }
            };
        </script>
    </body>
</html>
