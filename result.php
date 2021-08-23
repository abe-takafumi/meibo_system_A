<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        
    <title>新規社員情報登録</title>
    </head>
    <body>
        <header>
        <h1>PHP</h1>
        </header>
            <h2>登録結果！</h2>
                <?php
                try{
                    $db = new PDO('mysql:dbname=tabe;host=localhost;charset=utf8','webaccess','toMeu4rH');
                    $count = $db->prepare('INSERT INTO member (name, pref, seibetu, age,section_ID,grade_ID) VALUES (:name,:pref,:seibetu,:age,:section_name,:grade_name)');
                    $params = array(':name' =>$_POST["name"],':pref'=>$_POST["pref"],':seibetu'=>$_POST["seibetu"],':age'=>$_POST["age"],':section_name'=>$_POST["section_name"],':grade_name'=>$_POST["grade_name"]);
                    $count->execute($params);
                    echo"データを登録しました！";
                } catch(PDOException $e){
                    echo 'DB接続エラー' . $e->getMessage();
                    }
            ?>
    </body>
</html>
