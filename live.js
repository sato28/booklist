var timerID;// = setTimeout('',1);
var N = 8;
var box = new Array(N);
var insert="";
drawblock = new Array();

function image_set(){
    var i,j;
     for(i=0;i<N;i++){
    	for(j=0;j<N;j++){
	    insert="box["+i+"]["+j+"]";
	    if(box[i][j] == 1){document.getElementById( insert ).style.visibility = "visible";}
    	    else {
		document.getElementById( insert ).style.visibility = "hidden"; }
    	}
     }
}

function random(num){
    return Math.floor(Math.random() * num);
}
var reset;
var end;
function newGame(){
    var i,j;
    var ram;
    var left;
    var top=10;
    reset=0;end=0;
    for(i=0;i<N;i++){
    	left=10;
	box[i] = new Array(N);
	for(j=0;j<N;j++){
	    ram = random(100);
	    if(ram % 2 == 1){box[i][j]=1;}
	    else {box[i][j]=0;}
    	    left+=40;
	}
    	top+=40;
    }
    image_set();
    return 1;
}
function drow(){
    var i,j;
    var left;
    var top=10;
    for(i=0;i<N;i++){
    	left=10;
	document.write('<tr>');
	for(j=0;j<N;j++){
	    insert="box["+i+"]["+j+"]";
    	    document.write('<th><div id='+insert+' style="position:relative;top:'+top+';left:'+left+' ;"><img src="live.gif" width=32 height=32 align="left"/></div></th>');
    	    left+=40;
	}
	document.write('</tr>');
    	top+=40;
    }
    return 1;
}
function start(){
    var i,j;
    var L,U,R,D;
    var flag;
    for(i=0;i<N;i++){
	for(j=0;j<N;j++){
	    if(j+1 == N)R=0;else R=j+1;
	    if(j-1 < 0)L=N-1;else L=j-1;
	    if(i+1 == N)D=0;else D=i+1;
	    if(i-1 < 0)U=N-1;else U=i-1;
	    
	    flag=box[U][L]+box[U][j]+box[U][R]+box[i][L]+box[i][R]+box[D][L]+box[D][j]+box[D][R];
	    if(box[i][j]){
		if(flag==2 ||flag == 3)box[i][j] = 1;
		else box[i][j]=0;
	    }else{
		if(flag == 3)box[i][j]=1;
	    }

	}
    }
    image_set();
    if(reset)newGame();
    if(!end)setTimeout( "start()" , 100 );
}
function end(){end=1;}
function system(call){
    if(call==3)newGame();	// NEW_GAME
    else if(call==4){end=0;start();}	// START
    else end=1;
}

