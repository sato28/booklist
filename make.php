<?php
echo('<?xml version="1.0" encoding="UTF-8"?>');
 $con = pg_connect("host=localhost port=5432 dbname=t10307028");
     session_start();
?>
<html>
<head>
<title></title>
</head>
<body >
<div id="background">
<form action="make_regist.php" method="POST">
     
     名前 : <input type="text" style="width: 180px; height: 24px;" size="21" name="book" value="" /><br />

     作者 : <input type="text" style="width: 180px; height: 24px;" size="21" name="author" value="" /><br />

     タイプ(文庫、新書等) : <input type="text" style="width: 180px; height: 24px;" size="21"  name="type" value="" /><br />

     カテゴリ(本、CD等) : <input type="text" style="width: 180px; height: 24px;" size="21" name="category" value="" /><br />

     画像(URL) : <input type="text" style="width: 180px; height: 24px;" size="21" name="image" value="" /><br />

     memo : <input type="text" style="width: 180px; height: 24px;" size="21" name="memo" value="" ><br />
    <select name="file">
     <?php
    

$first = "select * from ".$_SESSION['user_id'];
$rtn = pg_query($first);
$count = 0.0;
while(($row = pg_fetch_assoc($rtn))>=$count){
    if($row['file']!='')echo '<option value="'.$row['file_id'].'">'.$row['file'].'</option>';
    $count +=1;
}
?>
     <input type="submit" value="追加" />

     </form>
    </div>
     </body>
     </html>
