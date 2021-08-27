<!DOCTYPE html>
<html>
        <?php require_once 'include/header.php'; ?>
    <body>
        <?php require_once 'include/def.php';
        require_once 'include/DB.php';
            $query_str = "SELECT * FROM section1_master WHERE 1";
            $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result = $sql->fetchAll();

            $query_str = "SELECT * FROM grade_master WHERE 1";
            $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result01 = $sql->fetchAll();
        ?>
            <table border="1"style="border-collapse:collapse" align="center" >
                <form action="detail01.php" method="post"onsubmit="return check()">
                            <tr>
                                <th>名前 </th>
                                <td ><input type="text" name="name" id=name maxlength="30" value=""></td>
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
                               <td><?php
                                    foreach ($result as $key){
                                       if($key['ID'] == 1 ){
                                           echo "<label><input type='radio' name='section_ID' checked='checked' value=". $key['ID'] .">" . $key['section_name'] . "</label>";
                                       }else{
                                           echo "<label><input type='radio' name='section_ID' value=".$key['ID'] .">" . $key['section_name']. "</label>";
                                       }
                                   }
                               ?></td>
                            </tr>
                            <tr>
                               <th>役職</th>
                               <td ><?php
                                    foreach ($result01 as $key){
                                       if($key['ID'] == 1 ){
                                           echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $key['ID'] .">" . $key['grade_name'] . "</label>";
                                       }else{
                                           echo "<label><input type='radio' name='grade_ID' value=".$key['ID'] .">" . $key['grade_name']. "</label>";
                                       }
                                   }
                               ?></td>
                            </tr>
            </table>
                            <p style="text-align: right">
                            <a href="detail01.php" class="btn btn-flat"><span>登録</span></a>
                            <style>
                            *,
                            *:before,
                            *:after {
                              -webkit-box-sizing: inherit;
                              box-sizing: inherit;
                            }

                            html {
                              -webkit-box-sizing: border-box;
                              box-sizing: border-box;
                              font-size: 62.5%;
                            }

                            .btn,
                            a.btn,
                            button.btn {
                              font-size: 1.6rem;
                              font-weight: 700;
                              line-height: 1.5;
                              position: relative;
                              display: inline-block;
                              padding: 1rem 4rem;
                              cursor: pointer;
                              -webkit-user-select: none;
                              -moz-user-select: none;
                              -ms-user-select: none;
                              user-select: none;
                              -webkit-transition: all 0.3s;
                              transition: all 0.3s;
                              text-align: center;
                              vertical-align: middle;
                              text-decoration: none;
                              letter-spacing: 0.1em;
                              color: #212529;
                              border-radius: 0.5rem;
                            }

                            a.btn-flat {
                              overflow: hidden;

                              padding: 1.5rem 6rem;

                              color: #fff;
                              border-radius: 0;
                              background: #000;
                            }

                            a.btn-flat span {
                              position: relative;
                            }

                            a.btn-flat:before {
                              position: absolute;
                              top: 0;
                              left: 0;

                              width: 150%;
                              height: 500%;

                              content: "";
                              -webkit-transition: all 0.5s ease-in-out;
                              transition: all 0.5s ease-in-out;
                              -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
                              transform: translateX(-98%) translateY(-25%) rotate(45deg);

                              background: #00b7ee;
                            }

                            a.btn-flat:hover:before {
                              -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
                              transform: translateX(-9%) translateY(-25%) rotate(45deg);
                            }
                            </style>

                        <input type="submit" class="btn btn-flat"><span>リセット</span></a>
                            <style>
                            *,
                            *:before,
                            *:after {
                              -webkit-box-sizing: inherit;
                              box-sizing: inherit;
                            }

                            html {
                              -webkit-box-sizing: border-box;
                              box-sizing: border-box;
                              font-size: 62.5%;
                            }

                            .btn,
                            a.btn,
                            button.btn {
                              font-size: 1.6rem;
                              font-weight: 700;
                              line-height: 1.5;
                              position: relative;
                              display: inline-block;
                              padding: 1rem 4rem;
                              cursor: pointer;
                              -webkit-user-select: none;
                              -moz-user-select: none;
                              -ms-user-select: none;
                              user-select: none;
                              -webkit-transition: all 0.3s;
                              transition: all 0.3s;
                              text-align: center;
                              vertical-align: middle;
                              text-decoration: none;
                              letter-spacing: 0.1em;
                              color: #212529;
                              border-radius: 0.5rem;
                            }

                            a.btn-flat {
                              overflow: hidden;

                              padding: 1.5rem 6rem;

                              color: #fff;
                              border-radius: 0;
                              background: #000;
                            }

                            a.btn-flat span {
                              position: relative;
                            }

                            a.btn-flat:before {
                              position: absolute;
                              top: 0;
                              left: 0;

                              width: 150%;
                              height: 500%;

                              content: "";
                              -webkit-transition: all 0.5s ease-in-out;
                              transition: all 0.5s ease-in-out;
                              -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
                              transform: translateX(-98%) translateY(-25%) rotate(45deg);

                              background: #eb6877;
                            }

                            a.btn-flat:hover:before {
                              -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
                              transform: translateX(-9%) translateY(-25%) rotate(45deg);
                            }
                            </style>
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
                        }else if(age.value >= 100 || age.value < 1){
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
