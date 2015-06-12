<?php
$con = pg_connect("host=localhost port=5432 dbname=t10307028");
session_start();
// $checkboxの中身は配列
$checkbox = $_REQUEST["chk"];
$file = $_POST["file"];

for($i=0; $i<sizeof($checkbox); $i++){
    $sql = "delete from ".$file." where name='".$checkbox[$i]."'";
    $rtn = pg_query("$sql");
    //echo $sql.'<br />';
    
}
$login_url = "http://www.cs.gunma-u.ac.jp/~t10307028/list/main.php";
header("Location: {$login_url}");
exit;
?>