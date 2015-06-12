<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>    
    <link rel="stylesheet" href="tab.css" type="text/css">
    <meta charset="utf-8">
    <script src="lightsout.js"></script>
    <style type="text/css">
      <!--
	  #Div{
	  border: 1px ridge fuchsia;
	  width : 380px;
	  padding : 10px;
	  }
	  
	  #game{
	  width:300px;
	  height:300px;
	  border:3px #fff solid;
	  background-color: #c3ff9d; 
	  border-collapse: collapse;

	  }
	  table.box
	  {
	  width:80%;
	  height:80%;
	  }
	  #game th,td{
	  border: 3px solid #000;
	  cursor: hand;
	  }
	  #Div{
	  border: 3px ridge fuchsia;
	  width : 380px;
	  padding : 10px;
	  }
	  
	-->
    </style>
    <script language="javascript">
      <!--

	  function getCELL(){
	  var myTbl = document.getElementById('game');
	  for (var i=0; i<myTbl.rows.length; i++) { //行位置取得。
	  for (var j=0; j<myTbl.rows[i].cells.length; j++) { //行内セル位置取得。
	  var Cells=myTbl.rows[i].cells[j]; //i番行のj番列のセル "td"
	  Cells.onclick =function(){
	  put(this);
	  } // onclickで 'Mclk'を実行。
	  }
	  }
	  }
	  
	  function system(call){
	  var type;
	  for (var i = 0; i < document.test.type.length; i++){
	  if(document.test.type[i].checked == true)type = document.test.type[i].value;
	  }
    	  if(call==3){
	  if(type=='0')reset(20);//EASY
	  else if(type=='1')reset(5);
	  else reset(2);
	  }	// Reset
	  }
	  // try ～ catch 例外処理、エラー処理
	  // イベントリスナーaddEventListener,attachEventメソッド
	  try{
	  window.addEventListener("load",getCELL,false);
	  }catch(e){
	  window.attachEvent("onload",getCELL);
	  }
	  
	-->
    </script>
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
	  <a href="live.php">ライフゲーム</a><br />
   	  <a href="8queen.php" >エイトクイーン</a><br />
   	  <a href="#" >ライツアウト</a><br />
    	</div>
    	<div id="Game_play" >
    	  <table id="game">
    	    <script type="text/javascript">
    	      drow();
	    </script>
        
	  </table>
	  <br />
	  <form name="test">
	    <input type="radio" name="type" value="0" checked>EASY
	    <input type="radio" name="type" value="1">NORMAL
	    <input type="radio" name="type" value="2">HARD
            <input type="button" name="RESET" value="NewGame" onClick="system(3)"> 
    	  </form><br />ライツアウト<br />
<img src="crsq_pink256.png" width=16 height=16 /><-こいつを全て消すことが目的です。<br />
問題はランダムなので、一期一会でお願いします。<br /><br />
〜ルール〜<br />
・クリックすると画像が出たり消えたりします。<br />
・クリックしたマスを中心として上下左右に影響が出ます。<br />
・隣接していて画像が出てる場合->消えます。<br />
・隣接していて画像が消えてる場合->出現します。<br />
<br />
そんな感じでぴこぴこ出たり消えたりする画像をなんとかすべて消してください。<br /><br />
           ※最初から全部消えてることがありますが、仕様です。見なかったことにしてNewGameを連打してください。<br />
	  <br /><br />

	  「<img src="crsq_pink256.png" width=16 height=16 />」の画像は<a href="http://www.tyto-style.com/">こちら</a>よりお借りしました。<br />
	</div>
      </div>
    </div>
  </body>
</html>
