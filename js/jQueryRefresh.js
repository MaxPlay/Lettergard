/** Code is poetry **/

$(document).ready(function() {
	$(function getInformation() {
	$.ajax({url: "getUserStuff.php?v=0", global: false, success: function(result){
        $(".FollowerCount").html(result);
    }});
	$.ajax({url: "getUserStuff.php?v=1", global: false, success: function(result){
        $(".FollowedCount").html(result);
    }});
	$.ajax({url: "getUserStuff.php?v=2", global: false, success: function(result){
        $(".PostCount").html(result);
    }});
    setTimeout(arguments.callee, 200);
	});
});