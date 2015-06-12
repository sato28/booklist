<?php 
$con = pg_connect("host=localhost port=5432 dbname=t10307028");
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="tab.css" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>My Files</title>
         
    <script language="javascript">
    function pop(obj) {
    wobj = window.open("", "pop","scrollbars=yes,width=480,height=360");
    obj.target = "pop";
    wobj.focus();
    return true;
}
</script>
<script language="JavaScript">
    <!--
    function msl(idmn){
    if(document.getElementById)
        document.getElementById(idmn).style.display='block'
        else if(document.all)document.all(idmn).style.display='block'
                                 }
function kks(idmn){
    if(document.getElementById)
        document.getElementById(idmn).style.display='none'
        else if(document.all)document.all(idmn).style.display='none'
                                 }
//-->
</script>
<script language="JavaScript">
    <!--
    function open(){
}
//-->
</script>
<!---->
</head>
<body> 
<div id="Body_container">
    <!-- ここから内容 -->
    <ul class="tab clear"> <!-- タブの形指定 -->
    <li><a href="#" class="blue" >Book List</a></li>
    <li><a href="edit.php" class="green">メモ帳</a></li>
	<li><a href="live.php" class="yellow">ゲーム</a></li>
    <li><a href="logout.php" class="red">ログアウト</a><li>
    <li><a class="name">「<?php echo $_SESSION['user_name'];?>」でログイン中</a><li>
    </ul>
	<div id="background" style="position:absolute;">
    <!-- ファイリング操作用 -->
    <div id="BookList"> リスト <br />
    <ul class="folder">
    <?php 
    $name = $_SESSION['user_id'];

/* 表示用のhtmlを作っておく */
$firstA="<div class=";
$firstB="onclick='javascript:msl(";
$second=")' ondblclick='javascript:kks(";
$third=")'></div>";
/* echo $first.$row["file"].$second.$row["file"].$third; */
$fA="<form action='main.php' method='POST'><input type='hidden' name='file' value='";
$fB="' /><input type='submit' value='";
$fC="' /></form>";

$sql = "select * from ".$name; 
$rtn = pg_query("$sql"); /* これでフォルダ検索 */

$count = 0;
if($rtn !=FALSE){
    while(($row = pg_fetch_assoc($rtn))>=$count){
        /* echo $firstA."'box_menu'".$firstB.$row["file"].$second.$row["file"].$third.$row["file"]."<br />"; */
        if($row['use']){
            echo $fA.$row["file_id"].$fB.$row["file"].$fC;
            if($count==0)$files=$row["file_id"];
        }
            
        $count +=1;            
    }
}
echo '<form action="make_file.php" method="POST">
    				<input type="text" name="name" size="25" value="" />
    				<input type="submit" value="ファイル追加" />
    				</form>';

?>
    </ul>
    <ul class="search" >
    検索フォーム<br />
    <form action="regist.php" method="post" target="pop" onsubmit="return pop(this)">
    URL : 
    <input type="text" name="data" size="25" value="" /><br />
    <input type="submit" value="サーチ" />
    </form>

    
    <br />
    見付からなかった場合はこちらをどうぞ<br />
    <form action="make.php" method="post" target="pop" onsubmit="return pop(this)">
    <input type="submit" value="新規作成" />
    </form></ul>
    </div>

    <!-- 中身一覧 -->
    <div id="BookCategory">
    カテゴリ 
    <form action="delete.php" method="post">
<?php
    /* 表示用のhtmlその２ */
                    

    if(!isset($_POST["file"]) || $_POST["file"]==NULL)$open='file0000';
    else $open=$_POST["file"];
$file = $name."_".$open;
$sql = "select * from ".$file;

$rtn = pg_query("$sql"); /* これでフォルダ検索 */

$count = 0;
if($rtn != FALSE){
    while(($book = pg_fetch_assoc($rtn))>$count){
        if($book["image"]==="none"){
            $img="new_no_image.jpg";
            
        }else{
            $img=$book["image"];
        }

        echo '<ul class="book_file">';
        echo "<img src='$img' align='left' width='15%'/>";
        echo "書名:".$book["name"]."<br />";
        echo "著者名：".$book["author"]."<br />";
        echo "タイプ：".$book["type"]."<br />";
        echo "カテゴリ：".$book["category"]."<br />";
        $sent = '削除<input type="checkbox" name="chk[]" value="'.$book["name"].'">';
                                
        echo $sent;
        /* echo $firstA."'pen_menu'".$firstB.$book["memo"].$second.$book["memo"].$third.$book["memo"]; */
        echo '</ul>';
            
        $count +=1;
    }
}
echo '<input type="hidden" name="file" value="'.$file.'" />';
echo '<input type="submit" name="delete" value="削除" />
				</form>';

?>
    </div>
    </div>
    </div>
    </div>
    </body>
    </html>
