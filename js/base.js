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

function updateBioLength() {
var _length = 0;
	str = document.getElementById("bioTextArea").innerHTML;
	_length = 1000 - getVisibleText(str).length;
	
	if(_length<10) {
		document.getElementById("bioLengthValue").style.color = "#ff0000";
	} else if(_length<50) {
		document.getElementById("bioLengthValue").style.color = "#ff9900";
		}
		else if(_length<100)
		{
		document.getElementById("bioLengthValue").style.color = "#eeee00";
		} else {
		document.getElementById("bioLengthValue").style.color = "#aaaaaa";
		}
		
		if(_length<0) {
		document.getElementById("bioButton").disabled=true;
		document.getElementById("bioButton").style.background = "#aaaaaa";
		} else {
		document.getElementById("bioButton").disabled=false;
		document.getElementById("bioButton").style.background = "#33cc33";
		}
	
	document.getElementById("bioLengthValue").innerHTML = _length;
}

function getVisibleText(string) {
	string = string.replace(/\<br\>/g,"");
	string = string.replace(/\<span id="overload"\>/g,"");
	string = string.replace(/\<\/span\>/g,"");
	
	//console.log(string);
	return string;
}

//http://www.html-world.de/586/kluge-e-mail-adressen-validation/
function EMail(s)
{
 var a = false;
 var res = false;
 if(typeof(RegExp) == 'function')
 {
  var b = new RegExp('abc');
  if(b.test('abc') == true){a = true;}
  }

 if(a == true)
 {
  reg = new RegExp('^([a-zA-Z0-9-._]+)'+
                   '(@)([a-zA-Z0-9-.]+)'+
                   '(.)([a-zA-Z]{2,4})$');
  res = (reg.test(s));
 }
 else
 {
  res = (s.search('@') >= 1 &&
         s.lastIndexOf('.') > s.search('@') &&
         s.lastIndexOf('.') >= s.length-5)
 }
 return(res);
}

function ValidateInput(string) {
	var input = document.getElementById(string);
	if(string == "PW1" && document.getElementById("PW2").value.length > 0) {
		ValidatePW();
		return;
	}
	if(string == "Mail") {
		if (input.value.length > 0) {
			if(EMail(input.value))
			{
				input.style.borderColor = "#00aa00";
				return;
			}
			else
			{
				input.style.borderColor = "#aa0000";
				return;
			}
		}
	}
	if(string == "UserName") {
		if (input.value.length > 3) {
			input.style.borderColor = "#00aa00";
			return;
		}
		else
		{
			input.style.borderColor = "#aa0000";
			return;
		}
	}
}

function ValidateForm() {
	var input1 = document.getElementById("UserName");
	var input2 = document.getElementById("Mail");
	if(input1.value.length > 3 && EMail(input2.value) && ValidatePW())
	{
		console.log("mudda");
		document.getElementById("submit").disabled = false;
	}
	else
	{
		document.getElementById("submit").disabled = true;
	}
}

function ValidatePW() {
	var PW1 = document.getElementById("PW1");
    var PW2 = document.getElementById("PW2");
	if (PW1.value != PW2.value) {
        document.getElementById("PW1").style.borderColor = "#aa0000";
        document.getElementById("PW2").style.borderColor = "#aa0000";
		return false;
    }
	else {
        document.getElementById("PW1").style.borderColor = "#00aa00";
        document.getElementById("PW2").style.borderColor = "#00aa00";
		return true;
	}
}

function CheckNewMail(id, button) {
	var input = document.getElementById(id).innerHTML;
	input = input.substring(3);
	
	if(EMail(input))
	{
		document.getElementById(button).disabled = false;
	}
	else
	{
		document.getElementById(button).disabled = true;
	}
}