<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>    
    <link rel="stylesheet" href="tab.css" type="text/css">
    <meta charset="utf-8">
    <script src="8queen.js"></script>
    <style type="text/css">
      <!--
	  #game{
	  width:300px;
	  height:300px;
	  border:2px #201701 solid;
	  background-color: #402f04; 
	  border-collapse: collapse;

	  }
	  #game th,td{
	  border: 3px solid #201600;
	  cursor: hand;
	  }
	  #game td.odd{
	  background-color:#ae9a69;
	  }
	  #game th.odd{
	  background-color:#ae9a69;
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
	  　　 Cells.onclick =function(){put(this);Mclk(this);} // onclickで 'Mclk'を実行。
          }
          }
	  }
	  
	  function Mclk(Cell) { 
	  var rowINX = '行位置：'+Cell.parentNode.rowIndex;//Cellの親ノード'tr'の行位置
	  var cellINX = 'セル位置：'+Cell.cellIndex;
	  var cellVal = 'セルの内容：'+Cell.innerHTML;
	  　　　　　　　　//取得した値の書き出し
	  res=rowINX + '<br/> '+ cellINX + '<br/>' + cellVal;
	  document.getElementById('Mbox0').innerHTML=res;
          var Ms1=document.getElementById('Mbox1')
          Ms1.innerText=Cell.innerHTML;
          Ms1.textContent=Cell.innerHTML;
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
   	  <a href="#" >エイトクイーン</a><br />
   	  <a href="lightsout.php" >ライツアウト</a><br />
    	</div>

    	<div id="Game_play" >
    	  <table id="game">
    	    <script type="text/javascript">
    	      drow();
	    </script>
	  </table>
<br />
	  <form name="test">
            
            <input type="button" name="RESET" value="RESET" onClick="system(3)"> 
    	  </form>
<br />
エイトクイーン<br />
          <br />
           チェス盤上にクイーンを８体設置することが目的です。<br />
〜ルール〜<br />
           ・クイーンは縦、横、斜めの全方位に動きます。<br />
           ・クイーンの進行方向にいると倒されてしまいます。よって、そこにクイーンを置いてはいけません。<br />
           <br />
<br />
           どのクイーンの進行方向もかぶらずに置く方法は12通りあるそうです。<br />やればできる。<br />頭の体操としてどうぞ。<br />
           <br />
           <br />
           ※チェック機能は搭載しておりません。
          
	  <br>
        </div>
      </div>
    </div>
  </body>
</html>
