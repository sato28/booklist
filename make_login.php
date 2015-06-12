<?php
 $con = pg_connect("host=localhost port=5432 dbname=t10307028");
     session_start();
if($con == false){
    print ("データベースに接続できません");
    exit;
}

$error_message = "";
$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
if (isset($_POST["作成"])) {
    $new_name = $_POST["user_name"];
    $new_pass = $_POST["password"];
    $first = "select * from login";
    $rtn = pg_query($first);
    $count = 0.0;

    $old_count = 0;
    while(($row = pg_fetch_assoc($rtn))>=$count){
        if($row["use"]==0 && $old_count==0){
            $ID = $row["user_id"];
            $old_count =1;
        }
        if($row["user_name"]===$new_name){
            $error1 = "その名前は既に使われています。<br />";
        }
    
        $count +=1;
        
    }
    if($error1 ==''){
            
        if($new_name == NULL)$error2='ユーザー名を入力してください。<br />';
        else if($new_pass == NULL)$error3='パスワードを入力してください。<br />';
        else if($ID == NULL)$error4="もう空きがありません。<br />";
        else {   
            $set_name = "update login set user_name='".$new_name."' where user_id='".$ID."'";
            pg_query($set_name);

            $set_pass = "update login set pass=".$new_pass." where user_id='".$ID."'";
            pg_query($set_pass);
            $set_use = "update login set use=1 where user_id='".$ID."'";
            pg_query($set_use);
    
            // $sql = "alter table ".$old_name." rename to ".$new_name;
            if($error_message=='')$error_message =  "$set_name<br />$set_pass<br /><br />here$count";
            //pg_query($sql);
        }
    }
    if($error4 == '')$error_message=$error1.$error2.$error3;
    else $error_message = $error4;
    if($error_message==''){
        $login_url = "http://www.cs.gunma-u.ac.jp/~t10307028/list/login.php";
        header("Location: {$login_url}");
        exit;
    }
        
    
    //ここまででユーザーID登録完了
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>アカウント作成</title>
    </head>
    <body>
    <?php echo $error_message;?>
    <form action="make_login.php" method="POST">
    ユーザー名 : <input type="text" name="user_name" value="" /><br />
    パスワード : <input type="password" name="password" value="" /><br />
    <input type="submit" name="作成" value="作成" />
    </form>
    <form action="login.php">
    <input type="submit" name="" value="戻る"  />
    </form>
    </body>
    </html>
