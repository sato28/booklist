var timerID;// = setTimeout('',1);
var N = 8;
var box = new Array(N);

var insert="";
drawblock = new Array();

var reset;
var end;
var light=0;
function random(num){
    return Math.floor(Math.random() * num);
}

var type=20;
function drow(){
    var i,j;
    var left;
    var top=10;
    var ram;
    for(i=0;i<N;i++){
    	left=10;
		box[i] = new Array(N);
		document.write('<tr>');
		for(j=0;j<N;j++){
	    	insert="box["+i+"]["+j+"]";
    	    document.write('<td><img id='+insert+' src="crsq_pink256.png" width=32 height=32 align="left"/></td>');
			left+=40;
		}
		document.write('</tr>');
    	top+=40;
    }
    reset(type);
}

function set(){
    var i,j;
    for(i=0;i<N;i++){
	for(j=0;j<N;j++){
	    insert="box["+i+"]["+j+"]";
	    box[i][j]=-1;
	    document.getElementById( insert ).style.visibility = "hidden"; 
	}
    }
}

function reset(type){
    var i,j;
    light=0;
    set();
    for(i=0;i<N;i++){
	for(j=0;j<N;j++){
	    ram=random(100);
	    insert="box["+i+"]["+j+"]";
	    if(ram%type==1){
		if(i!=0){change(i-1,j);}
		if(j!=0){change(i,j-1);}
		if(i+1!=N){change(i+1,j);}
		if(j+1!=N){change(i,j+1);}
		change(i,j);
	    }
	}
    }
}

function change(i,j){
    box[i][j]*=(-1);
    insert="box["+i+"]["+j+"]";
	if(box[i][j] > 0){
		document.getElementById( insert ).style.visibility = "visible";
		light++;
	}else {
		document.getElementById( insert ).style.visibility = "hidden"; 
		light--;
	}
}

function put(Cell){
	var Y = Cell.parentNode.rowIndex;
	var X = Cell.cellIndex;
	if(Y!=0){change(Y-1,X);}
	if(X!=0){change(Y,X-1);}
	if(Y+1!=N){change(Y+1,X);}
	if(X+1!=N){change(Y,X+1);}
	change(Y,X);
	if(light==0)alert("finish!!");
}

function check(I,J){
	var i,j;
	for(i=I+1;i!=I;i++){
		if(i==N)i=0;
		for(j=J+1;j!=J;j++){
			if(j==J)j=0;
			
		}
	}
}