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

function ValidateInput(string) {
	var input = document.getElementById(string);
	if (input.value.length > 0) {
        input.style.borderColor = "#00aa00";
		document.getElementById("submit").disabled = true;
    }
	else
	{
        input.style.borderColor = "#aa0000";
		document.getElementById("submit").disabled = false;
	}
}

function ValidatePW() {
	var PW1 = document.getElementById("PW1");
    var PW2 = document.getElementById("PW2");
	if (PW1.value != PW2.value) {
        document.getElementById("PW2").style.borderColor = "#aa0000";
		document.getElementById("submit").disabled = true;
    }
	else {
        document.getElementById("PW2").style.borderColor = "#00aa00";
		document.getElementById("submit").disabled = false;
	}
}