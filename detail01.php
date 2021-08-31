<!DOCTYPE html>
<html>
    <?php require_once 'include/header.php'; ?>
    <body>
        <?php
            require_once 'include/def.php';
            require_once 'include/DB.php';
            if(empty($_GET['member_ID']) && empty($_POST['name'])){
                echo "このページは社員情報詳細ページです。詳細を載せるためのIDがありません。トップ画面へ遷移してください。<br>";
                echo "<a href='./index.php' style='text-align:right' >トップ画面へ</a>";
                exit;
            }else{
                if(empty($_GET['member_ID'])){
                    if(empty($_POST['member_ID'])){
                        try {
                            $count = $pdo->prepare('INSERT INTO member (name, pref, seibetu, age,section_ID,grade_ID) VALUES (:name,:pref,:seibetu,:age,:section_name,:grade_name)');
                            $params = array(':name' =>$_POST["name"],':pref'=>$_POST["pref"],':seibetu'=>$_POST["seibetu"],':age'=>$_POST["age"],':section_name'=>$_POST["section_ID"],':grade_name'=>$_POST["grade_ID"]);
                            $count->execute($params);
                            $id = $pdo->lastInsertId();     // PDOオブジェクトにSQLを渡す
                        }catch (Exception $e) {
                                  echo 'エラーが発生しました。:' . $e->getMessage();
                        }
                    }else{
                        try{
                            $stmt = $pdo->prepare('UPDATE member SET name = :name, pref = :pref , seibetu = :seibetu , age = :age , section_ID = :section_ID , grade_ID = :grade_ID WHERE member.member_ID = :id');
                            $stmt->execute(array(':name' => $_POST['name'], ':pref' => $_POST['pref'], ':seibetu' => $_POST['seibetu'],
                            ':age' => $_POST['age'], ':section_ID' => $_POST['section_ID'], ':grade_ID' => $_POST['grade_ID'], ':id' => $_POST['member_ID']));
                            $id = $_POST['member_ID'];
                        }catch (Exception $e) {
                                  echo 'エラーが発生しました。:' . $e->getMessage();
                        }
                    }
                }else{
                    $id = $_GET['member_ID'];
                    $query_chk = "SELECT * FROM member WHERE member.member_ID = $id";
                    $sql_chk = $pdo->prepare($query_chk);     // PDOオブジェクトにSQLを渡す
                    $sql_chk->execute();                      // SQLを実行する
                    $result_chk = $sql_chk->fetch();
                    if(empty($result_chk)){
                        echo "このページは社員情報詳細ページです。ID:".$id."は登録されておりません。トップ画面へ遷移してください。<br>";
                        echo "<a href='./index.php' style='text-align:right' >トップ画面へ</a>";
                        exit;
                    }
                }
                $query_str="SELECT member.member_ID,member.name,member.pref,member.seibetu,member.age,grade_master.grade_name,section1_master.section_name
                            FROM member
                            LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                            LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                            WHERE member.member_ID = $id";
                $sql = $pdo->prepare($query_str);
                $sql->execute();
                $result = $sql->fetch();  // 実行結果を取得して$resultに代入する
            }

        ?>

            <table style="width: 40%" class='table table-striped table-striped　table table-sm'>
                <?php
                    require 'include/common.php';
                    echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                    echo "<tr><th>名前</th><td>" . $result['name'] . "</td></tr>";
                    echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                    echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                    echo "<tr><th>年齢</th><td>" . $result['age'] . "</td></tr>";
                    echo "<tr><th>所属部署</th><td>" . $result['section_name'] . "</td></tr>";
                    echo "<tr><th>役職</th><td>" . $result['grade_name'] . "</td></tr>";
                ?>
            </table>
            <div class="d-grid gap-2 col-4 mx-auto">
                <form method='post' action='entry_update01.php' class="d-grid gap-2">
                        <input type="submit" name="member_ID" value="編集" class="btn btn-outline-primary"/>
                        <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
                </form>
                <form method='post' action='index.php' onsubmit="return check()" class="d-grid gap-2">
                        <input type="submit" name="delete" value="削除" class="btn btn-outline-warning"/>
                        <input type="hidden" name="delete" value="<?php echo $result['member_ID']; ?>" />
                </form>
            </div>
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
