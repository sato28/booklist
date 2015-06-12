<?php
$con = pg_connect("host=localhost port=5432 dbname=t10307028");
/* localhost のポート5432にて、usernameという名前のデータベースに接続 */
session_start();
if($con == false){
    print ("データベースに接続できません");
    exit;
}

// エラーメッセージを格納する変数を初期化
$error_message = "";

// ログインボタンが押されたかを判定
// 初めてのアクセスでは認証は行わずエラーメッセージは表示しないように
if (isset($_POST["login"])) {
    
   
    /*->ここをSQLにアクセスして判断するように変更する*/
    /* 今回は簡略化のため、パスワードの暗号化云々かんぬんはしない。 */

    /* 1.ユーザーが存在するかどうかの確認
       2.パスワードが一致しているかの確認*/
    $name=$_POST["user_name"];
    $sql = "select * from login";
    $rtn = pg_query("$sql");
    while($row = pg_fetch_assoc($rtn)){
        //echo "$row['user_name'] , $row['password']";
        if($row == 0)exit;
        else if($row['user_name']===$name && $row['pass']==$_POST["password"]){
            // ログインが成功した証をセッションに保存
            $_SESSION["user_id"] =$row['user_id'];
            $_SESSION["user_name"] =$row['user_name'];
            // 管理者専用画面へリダイレクト
            /* $login_url = "http://{$_SERVER["SERVER_NAME"]}/php_10days/anq_result.php"; */
            $login_url = "http://www.cs.gunma-u.ac.jp/~t10307028/list/main.php";
        
            header("Location: {$login_url}");
            exit;

        }
        
    }
    
    $error_message = "ユーザ名もしくはパスワードが違っています。";
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ログイン画面</title>
<style type="text/css">  
<!-- <?php/* ここにcssを書く */?>
    span { color:red; font-weight:bold; }
table.formtable {mergin: 5px;
padding:5px;
    
width:400px; height: 150px;color:#5c4a28; 
border: 5px #a46c00 solid;
display:block;
    
    background-color:#EBD3A5;}
formtable td,tr
{
width:200px;
    
}

-->  
</style>  
   
</head>
<body>
<table class="formtable"><th>
ユーザー認証<br />
</th><tr><td>
<?php
if ($error_message) {
    print '<font color="red">'.$error_message.'</font>';
}
?>
<form action="login.php" method="POST">
    ユーザ名：<input type="text" name="user_name" value="" /><br />
    パスワード：<input type="password" name="password" value="" /><br /><input type="hidden" name="file" value="file0000" /></td><td>　　
    <input type="submit" name="login" value="ログイン"  />
    </form>
    <br />
    <form action="make_login.php" method="POST">
    　　<input type="submit" name="new" value="新規登録"  />
    </form></td></tr>
    </table>
    </body>
    </html>