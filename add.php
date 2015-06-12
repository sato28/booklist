<?php
echo('<?xml version="1.0" encoding="UTF-8"?>');
$con = pg_connect("host=localhost port=5432 dbname=t10307028");
session_start();
$book=$_POST['book'];
$author=$_POST['author'];
$type=$_POST['type'];
$category=$_POST['category'];
$image=$_POST['image'];
$memo=$_POST['memo'];
$file=$_POST['file'];
$sql = "insert into ".$_SESSION['user_id']."_".$file." values('".$book."','".$author."','".$type."','".$category."','".$image."','".$memo."')";
pg_query("$sql");
?>
<html>
<head>
<title></title>
</head>
<body>
<div id="background">
追加しました。<br />
<input type="button" value="終了" onClick="window.close()" />
</div></body>
</html>
