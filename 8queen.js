var timerID;// = setTimeout('',1);
var N = 8;
var box = new Array(N);

var check_box=new Array(N);
var insert="";
drawblock = new Array();

var reset;
var end;

function drow(){
    var i,j;
    var left;
    var top=10;
    for(i=0;i<N;i++){
    	left=10;
	box[i] = new Array(N);
		check_box[i] = new Array(N); 
		document.write('<tr>');
		for(j=0;j<N;j++){
	    	insert="box["+i+"]["+j+"]";
		    if(i%2==0){
			if(j%2!=0)document.write('<td class="odd">');
 			else document.write('<td>');
document.write('<img id='+insert+' src="queen.gif" width=32 height=32 align="left"/></td>');
		    }else{
			if(j%2==0)document.write('<td class="odd">');
 			else document.write('<td>');
document.write('<img id='+insert+' src="queen.gif" width=32 height=32 align="left"/></td>');
		    }

			box[i][j] = -1;
		document.getElementById( insert ).style.visibility = "hidden";
    	    left+=40;
		}
		document.write('</tr>');
    	top+=40;
    }
}

function reset(){
    var i,j;
    for(i=0;i<N;i++){
	for(j=0;j<N;j++){
	    box[i][j]=-1;
	    insert="box["+i+"]["+j+"]";
	    document.getElementById( insert ).style.visibility = "hidden"; 
	}
    }
}

function put(Cell){
	var Y = Cell.parentNode.rowIndex;
	var X = Cell.cellIndex;
	box[Y][X] *= (-1);
	    insert="box["+Y+"]["+X+"]";
	if(box[Y][X] > 0){
		document.getElementById( insert ).style.visibility = "visible";
	}else {
		document.getElementById( insert ).style.visibility = "hidden"; 
	}
}

function check_one(I,J){
	var i,j;
	for(i=I;i;i++){
		for(j=J;;j++){
			if(j==J) chack_box=-1;
		}
	}
}

function system(call){
    if(call==3)reset();	// RESET
    else if(call==4){end=0;start();}	// START
    else end=1;
}

