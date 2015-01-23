/** Code is poetry **/

$(document).ready(function() {
	$(".menu").mouseenter(function(){
		$(".menuVolume").fadeIn("fast");
	});
	$(".menu").mouseleave(function(){
		$(".menuVolume").fadeOut("fast");
	});
	
	
	$(".login").mouseenter(function(){
		$(".loginVolume").fadeIn("fast");
	});
	$(".login").mouseleave(function(){
		$(".loginVolume").fadeOut("fast");
	});
});