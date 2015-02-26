/** Code is poetry **/

$(document).ready(function() {
	$(function getInformation() {
	$.ajax({url: "getUserStuff.php?v=0&User=2", success: function(result){
        $(".FollowedCount").html(result);
    }});
	$.ajax({url: "getUserStuff.php?v=1&User=2", success: function(result){
        $(".FollowerCount").html(result);
    }});
	$.ajax({url: "getUserStuff.php?v=2&User=2", success: function(result){
        $(".PostCount").html(result);
    }});
    setTimeout(arguments.callee, 200);
	});
});