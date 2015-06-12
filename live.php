<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>    
<link rel="stylesheet" href="tab.css" type="text/css">
<meta charset="utf-8">
    <script src="live.js"></script>
    <style type="text/css">
    table.game{
width:300px;
height:300px;
border:2px #2b2b2b solid;
background-color: #65A977;

}
table.box
{
border:2px #2b2b2b solid;
}
table.box td,th,tr
{
border:2px #2b2b2b solid;
}


</style>
<title>My Files</title>
</head>

<body>
<div id="Body_container">
    <ul class="tab clear"> <!-- タブの形指定 -->
	<li><a href="main.php" class="blue">Book List</a></li>
	<li><a href="edit.php" class="green">メモ帳</a></li>
	<li><a href="#" class="yellow">ゲーム</a></li>
    <li><a href="logout.php" class="red">ログアウト</a><li>
    <li><a class="name">「<?php echo $_SESSION['user_name'];?>」でログイン中</a><li>
    </ul>
    
    <div id="background" style="position:absolute">
	    <div id="Game_menu" >
   	 	<a href="#">ライフゲーム</a><br />
   	 	<a href="8queen.php" >エイトクイーン</a><br />
   	 	<a href="lightsout.php" >ライツアウト</a><br />
    	    </div>
    	<div id="Game_play" >
    			<table class="game"><tr>
    				<script type="text/javascript">
    					drow();newGame();
					</script></tr>
				</table>

				<form name="test">
               		<input type="button" name="STOP" value="STOP" onClick="system(1)"> 
               		<input type="button" name="NEW_GAME" value="NEW_GAME" onClick="system(3)"> 
               		<input type="button" name="START" value="START" onClick="system(4)"> 
    	    	</form><br />ライフゲーム
                                  <br /><br />
                                   <table class="box"><tr><th> 〜ライフゲームってなぁに〜</th></tr><tr><td>
               ライフゲームとは、1970年にイギリスの数学者ジョン・ホートン・コンウェイが考案した生命の誕生、進化、淘汰などのプロセスを簡易的なモデルで再現したシミュレーションゲームである。(Wikipediaより引用)<br />
            	   </td></tr></table><br />
                                   つまり、ゲームにしてゲームにあらず。<br />さらにこのページのゲームでは任意で点を置くこともできないので、ひたすらランダム生成->動かすのみのゲームとなります。<br />簡略化して8*8マスの小規模ゲームになっているので、比較的短時間で終わります。<br /><br />
                                   〜説明〜<br />
        		<img src="live.gif" width=32 height=32 /> : 生存<br />
        		<img src="grass.gif" width=32 height=32 /> : さら地<br /><br />
         		<img src="live.gif" width=16 height=16 />達がうぞうぞ動きまわります。<br />
                                   何も考えたくないときに動く家電をぼんやり眺めちゃうような、そんな気分でどうぞ。<br />
                                   <br />
               
         </div>
    </div>
</div>
</body>
</html>
