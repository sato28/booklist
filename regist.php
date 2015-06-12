<?php
echo('<?xml version="1.0" encoding="UTF-8"?>');
 $con = pg_connect("host=localhost port=5432 dbname=t10307028");
     session_start();
?>
<html>
<head>
<link rel="stylesheet" href="tab.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>サンプル</title>
</head>
<body>
         <div id="background">
         <?php

         include('../simple_html_dom.php');
$url = $_POST['data'];
if($url == NULL){echo "URLが入力されていません";
    exit;
}else
    {
        
        /* ホームページで受け取った文字列をURLとしてfile_get_htmlに突っ込む。 */
        $html = file_get_html($url);
        mb_language('Japanese');
        /* そこから本のデータを取ってくる */
        /* <meta name="title" content="Amazon.co.jp： ツナグ (新潮文庫): 辻村 深月: 本" /> */
        /* 今回は間に合わせることを第一にするため、書名、種類、著者名、カテゴリのみ取得に制限する */

        //foreach($html->find("td.bucket") as $description); //詳細情報のための指示

        foreach($html->find("title") as $main);//メイン情報のための指示
        /* <td class="bucket">内のすべてを拾ってくる */
        /* 画像は余力があればやる */
        //foreach($html->find('div[id=main_image_0]') as $img_path);//画像を取る
        //echo $img_path[0]->innertext."<br />";
        //$img = $img_path->plaintext;
        /* echo $title->plaintext; */
        /* 文字コード取得 */
        $mojicode = mb_detect_encoding($main->plaintext);
        //echo "文字コードは $mojicode です";
        /*文字化けすることがあるので、その処理
          [変換したい文字列],[変換後の文字コード],[変換前の文字コード] */
        $trim = $main->plaintext;
        $trim2 = str_replace("(",":",$trim);
        $trim = str_replace(")","",$trim2);
        $trim2 = substr_replace($trim,"",0,14);
        $trim = str_replace(":"," ^",$trim2);
        $trim2 =mb_convert_encoding($trim,"UTF-8",$mojicode);
        $main_info = explode("^", $trim2);
        //echo $trim3;

        //echo "<br />メイン情報<br />";
        //var_dump($main_info);

        /* ・・・ということは、本のリスト作成だけでも
           ・本データを取ってくるPHP
           ・ポップアップPHP
           ・書き込み用PHP
           の3種類必要？*/

        $html->clear();
        unset($html);

        $style1 ="display: inline-block; _display: inline; color:#ff8440; font-size:18pt; font-weight:bold; text-decoration:underline;";
        $style2 ="display: inline-block; _display: inline; font-size:18pt;";
        $img="new_no_image.jpg";
        echo "<img src='$img' align='left' width='30%'/><br />";
        echo "<div style='$style1' >書名: </div><div style='$style2'>"." $main_info[0]</div><br />";//書名
        echo "<div style='$style1' >著者名: </div><div style='$style2'> $main_info[2]</div><br />";//著者名
        echo "<div style='$style1' >種類: </div><div style='$style2'> $main_info[1]</div><br />";//種類
        echo "<div style='$style1' >カテゴリ: </div><div style='$style2'> $main_info[3]</div><br />";//カテゴリ
    }


?>
<form action="add.php" method="POST">
    <input type="hidden" name="book" value="<?php echo $main_info[0] ?>" /> 
    <input type="hidden" name="author" value="<?php echo $main_info[2] ?>" /> 
    <input type="hidden" name="type" value="<?php echo $main_info[1] ?>" /> 
    <input type="hidden" name="category" value="<?php echo $main_info[3] ?>" /> 
    <input type="hidden" name="image" value="<?php echo $img ?>" />
    memo: <input type="text" name="memo" value="" ><br />
    <select name="file">
    <?php
    $file = $_SESSION['user_id']."_".$_POST['name'];
$first = "select * from ".$_SESSION['user_id'];
$rtn = pg_query($first);
$count = 0.0;
while(($row = pg_fetch_assoc($rtn))>=$count){
    if($row['file']!='')echo '<option value="'.$row['file_id'].'">'.$row['file'].'</option>';
    $count +=1;
}
?>
</select><br />
<input type="submit" value="追加" />
    </form>
    <input type="button" value="キャンセル" onClick="window.close()" />
</div></body>
</html>
