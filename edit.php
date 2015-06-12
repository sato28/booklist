<?php
echo('<?xml version="1.0" encoding="UTF-8"?>');
$con = pg_connect("host=localhost port=5432 dbname=t10307028");
session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>    
<link rel="stylesheet" href="tab.css" type="text/css">
<meta charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="https://raw.github.com/carhartl/jquery-cookie/master/jquery.cookie.js"></script>
<script type="text/javascript" src="ipop.js"></script>
<title>My Files</title><script>
$(function() {
  $('#new').click(function() {
    make();
    save();
  });

  $('#del').click(function() {
    $('.selected').remove();
    save();
  });

  $('#system').click(function(){system();});
  
function system(){
    var text="";   
    alert("text");
}
  function make() {
    var sticky = $('<div class="sticky">Drag & Double Click!</div>');
    sticky.appendTo('body')
      .css('background-color', $('#color').val())
      .draggable({stop: save})
      .dblclick(function() {
        $(this).html('<textarea>' + $(this).html() + '</textarea>')
          .children()
          .focus()
          .blur(function() {
            $(this).parent().html($(this).val());
            save();
          });
      }).mousedown(function() {
        $('.sticky').removeClass('selected');
        $(this).addClass('selected');
      });
    return sticky;
  }

  function save() {
    var items = [];
    $('.sticky').each(function() {
      items.push(
        $(this).css('left'),
        $(this).css('top'),
        $(this).css('background-color'),
        $(this).html()
      );
    });
    $.cookie('sticky', items.join('\t'), {expires: 100});
  }

  function load() {
    if (!$.cookie('sticky')) return;
    var items = $.cookie('sticky').split('\t');
    for (var i = 0; i < items.length; i += 4) {
      make().css({
        left: items[i],
        top: items[i + 1],
        backgroundColor: items[i + 2]
      }).html(items[i + 3]);
    }
  }
  load();
});

</script>
<style type="text/css">
 <!--

        .sample1     { border-top:groove 2px #cccccc;}
        .sample2     { border-top:solid 3px #808080;width:60%;}

 -->
 </style>
<style>
.sticky {
  width: 250px;
  height: 200px;
  position: absolute;
border:2px #ffffff solid;
  cursor:pointer;
}
textarea {
  width: 100%;
  height: 100%;
}
.sticky_title {
  background-color: #fdc;
  cursor: pointer;
}
.selected {border-color: #f98f8f;}

</style>
</head>

<body>
<div id="Body_container">
    <ul class="tab clear"> <!-- タブの形指定 -->
	<li><a href="main.php" class="blue">Book List</a></li>
	<li><a href="#" class="green">メモ帳</a></li>
	<li><a href="live.php" class="yellow">ゲーム</a></li>
    <li><a href="logout.php" class="red">ログアウト</a><li>
    <li><a class="name">「<?php echo $_SESSION['user_name'];?>」でログイン中</a><li>
    </ul>

    <div id="background" style="position:absolute;">
    <!--以下メモ帳-->
    <select id="color">
    <option value="#ffc">黄色</option>
    <option value="#fcc">赤色</option>
    <option value="#68aa26">緑色</option>
    <option value="#d1d1d1">黒</option>
    </select>
    <input id="new" type="button" value="new">
    <input id="del" type="button" value="del">
    <select>
    <option>このページって何？</option>
    <option>----------------</option>
    <option>その名の通りメモ帳です。</option>
    <option>ここでは付箋タイプのメモを利用できます。</option>
    <option>----------------</option>
    <option>メモはCookieで管理されているので、</option>
    <option>同じアカウントのパソコンを使えば</option>
    <option>メモを保存できます。</option>
    <option>----------------</option>
    <option>ただし、メモは新しく作られたものが</option>
    <option>手前になります。</option>
    <option>入れ替えられません。</option>
    <option>あきらめてください。</option>
    </select>
    </div>
    </div>
    </body>
    </html>
