/** Code is poetry **/

$(document).ready(function() {
	$(".menu").mouseenter(function(){
		$(".menuVolume").fadeIn("fast");
	});
	$(".menu").mouseleave(function(){
		$(".menuVolume").fadeOut("fast");
	});
	
	
	$(".login").click(function(){
		$(".loginVolume").fadeIn("fast");
	});
	$(document).mouseup(function(e){
		/** Thanks to Mark Amery from StackOverflow **/
		var container = $(".login");
		if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			$(".loginVolume").fadeOut("fast");
		}
	});
});