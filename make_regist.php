<?php
echo('<?xml version="1.0" encoding="UTF-8"?>');
 $con = pg_connect("host=localhost port=5432 dbname=t10307028");
     session_start();
?>
<html>
<head>
<title></title>
</head>
<body>
<div id="background">
<?php
include('../simple_html_dom.php');
$book = $_POST['book'];
$author =$_POST['author'];
$type = $_POST['type'];
$category = $_POST['category'];
$image = $_POST['image'];
$memo = $_POST['memo'];
$file = $_POST['file'];

if($image === '') $image="new_no_image.jpg";
echo "<img src='$image' align='left' /><br />";

$style1 ="display: inline-block; _display: inline; color:#ff8440; font-size:20pt; font-weight:bold; text-decoration:underline;";
$style2 ="display: inline-block; _display: inline; font-size:20pt; font-weight:bold;";
echo "<div style='$style1' >書名: </div><div style='$style2'>"." $book</div><br />";//書名
echo "<div style='$style1' >著者名: </div><div style='$style2'> $author</div><br />";//著者名
echo "<div style='$style1' >種類: </div><div style='$style2'> $type</div><br />";//種類
echo "<div style='$style1' >カテゴリ: </div><div style='$style2'> $category</div><br />";//カテゴリ
echo "<div style='$style1' >メモ: </div><div style='$style2'> $memo</div><br />";//カテゴリ
?>


<form action="add.php" method="POST">
    <input type="hidden" name="book" value="<?php echo $book ?>" /> 
    <input type="hidden" name="author" value="<?php echo $author ?>" /> 
    <input type="hidden" name="type" value="<?php echo $type ?>" /> 
    <input type="hidden" name="category" value="<?php echo $category ?>" /> 
    <input type="hidden" name="image" value="<?php echo $image ?>" />
    <input type="hidden" name="memo" value="<?php echo $memo ?>" /><br />  <input type="hidden" name="file" value="<?php echo $file ?>" /> 
    <input type="submit" value="追加" />
    </form>
<input type="button" value="キャンセル" onClick="window.close()" />
    </div>
</body>
</html>

