<?php
 $con = pg_connect("host=localhost port=5432 dbname=t10307028");
     session_start();
$new_file = $_POST['name'];
$old_file;
$old_check=0;
$first = "select * from ".$_SESSION['user_id'];
$rtn = pg_query($first);
$count = 0.0;
while(($row = pg_fetch_assoc($rtn))>=$count){
    if($row["file"]===$_POST['name']){
$login_url = "http://www.cs.gunma-u.ac.jp/~t10307028/list/main.php";
        
            header("Location: {$login_url}");
        exit;
        echo "<script type='text/javascript'>alert('そのファイル名は既に使われています');</script>";
    }
        $count +=1;
        if($old_check==0 && $row["use"]==0){
            $old_file=$row["file_id"];
            $old_check=1;
        }
        
} 

$sql = "update ".$_SESSION['user_id']." set file='".$new_file."' where file_id='".$old_file."'";

pg_query($sql);
$sql = "update ".$_SESSION['user_id']." set use=1 where file_id='".$old_file."'";
pg_query($sql);
$login_url = "http://www.cs.gunma-u.ac.jp/~t10307028/list/main.php";
        
            header("Location: {$login_url}");
            exit;
/* alter table root_読みたい本 rename to "rootほしい本"; */
?>
