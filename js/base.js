/** Code is poetry **/

function updateLength() {
	str = document.getElementById("postTextAreaSide").innerHTML;
	document.getElementById("postLengthValueSide").innerHTML = 1000 - getVisibleText(str).length;
}

function getVisibleText(string) {
	string = string.replace(/\<br\>/g,"");
	
	console.log(string);
	return string;
}