/** Code is poetry **/

function updateLength() {
var _length = 0;
	str = document.getElementById("postTextAreaSide").innerHTML;
	_length = 1000 - getVisibleText(str).length;
	
	if(_length<10) {
		document.getElementById("postLengthValueSide").style.color = "#ff0000";
	} else if(_length<50) {
		document.getElementById("postLengthValueSide").style.color = "#ff9900";
		}
		else if(_length<100)
		{
		document.getElementById("postLengthValueSide").style.color = "#eeee00";
		} else {
		document.getElementById("postLengthValueSide").style.color = "#aaaaaa";
		}
		
		if(_length<0) {
		document.getElementById("postButtonSide").disabled=true;
		document.getElementById("postButtonSide").style.background = "#aaaaaa";
		} else {
		document.getElementById("postButtonSide").disabled=false;
		document.getElementById("postButtonSide").style.background = "#33cc33";
		}
	
	document.getElementById("postLengthValueSide").innerHTML = _length;
}

function getVisibleText(string) {
	string = string.replace(/\<br\>/g,"");
	string = string.replace(/\<span id="overload"\>/g,"");
	string = string.replace(/\<\/span\>/g,"");
	
	console.log(string);
	return string;
}