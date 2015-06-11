/** Code is poetry **/

$(document).ready(function() {
	$(".menu").mouseenter(function(){
		$(".menuVolume").fadeIn("fast");
	});
	$(".menu").mouseleave(function(){
		$(".menuVolume").fadeOut("fast");
	});
	
	$("#WrongLogin").fadeIn("fast").delay(2000).fadeOut();
	
	
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
	
	$(".deleteAccount").click(function() {
		if($(this).height() == '120')
		{
		$(this).animate({
			height:'20px'
		});
		$(".deleteInner").fadeOut();
		return;
		}
		
		if($(this).height() == '20')
		{
		$(".deleteInner").fadeIn();
		$(this).animate({
			height:'120px'
		});
		}
	});
	
	//This code is for posting stuff to the timeline
	$('#postForm').on('submit',function(e) {

		$.ajax({
		url:'createPost.php',
		data: { 'Post': document.getElementById("postTextAreaSide").innerHTML},
		type:'POST',
		success:function(data){
			console.log(data);
			document.getElementById("postTextAreaSide").innerHTML = "";
			document.getElementById("postLengthValueSide").innerHTML = "1000";
			location.reload(); 
			},
		error:function(data){
			$("#SentError").fadeIn("fast").delay(2000).fadeOut();
			}
		});
	e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
	});
	
	
	//This code is for updating the bio
	$('#bioForm').on('submit',function(e) {

		$.ajax({
		url:'updateBio.php',
		data: { 'Post': document.getElementById("bioTextArea").innerHTML},
		type:'POST',
		success:function(data){
			console.log(data);
			},
		error:function(data){
			}
		});
	e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
	});
	
	//This code is for updating the bio
	$('#MailPost').on('submit',function(e) {

		$.ajax({
		url:'updateMail.php',
		data: { 'Post': document.getElementById("mailTextArea").innerHTML},
		type:'POST',
		success:function(data){
			console.log(data);
			$("#MailUpdated").fadeIn("fast").delay(2000).fadeOut();
			},
		error:function(data){
			}
		});
	e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
	});
	
	$("#resentMail").click(function(){
		$("#resentMail").fadeOut(200);
		$("#mailSent").delay(200).fadeIn(200);
	})
	
	$('#UserName').keyup(function() {
    var username = document.getElementById("UserName").value;

    if(username != ''){
        $.ajax({url: "getUserStuff.php?Username="+username, success: function(result){
			if(result>0)
				$(".UserExists").html("Username ist bereits vergeben.");
			else
				$(".UserExists").html("");
		}});
    }
	});
	
	$('#resentMail').click(function() {

		$.ajax({
		url:'SendMail.php',
		data: { },
		type:'POST',
		success:function(data){
			console.log(data);
			},
		error:function(data){
			}
		});
	e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
	});
	
	$('#followButton').click(function() {

		$.ajax({
		url:'followUser.php',
		data: { },
		type:'POST',
		success:function(data){
			var inner = document.getElementById("followButton").innerHTML;
			if(inner.substring(inner.length-9)=="entfolgen")
				document.getElementById("followButton").innerHTML = inner.substring(0,inner.length-9) + "folgen";
			else
				document.getElementById("followButton").innerHTML = inner.substring(0,inner.length-6) + "entfolgen";
			console.log(inner);
			},
		error:function(data){
			}
		});
	});
	
	$("#SUCCESS").delay(5000).fadeOut();
		
	$("#SUCCESS").click(function(){
		$(this).fadeOut();
	});
	
	$("#ERROR").delay(5000).fadeOut();
		
	$("#ERROR").click(function(){
		$(this).fadeOut();
	});

	$(".appendable").on("click", ".end", function() {
		if($(".end").attr("id") != "NothingMore")
		{
			var date = $(".timelineend").prev().attr("id");
			loadMessages(date);
		}
	});
});

$( document ).ajaxComplete(function( event,request, settings ) {
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	if(filename == "search.php") { $("#searchOutput").append("<div class=\"timelineelement timelineend\"><div class=\"end\" id=\"NothingMore\">Du hast das Ende der Timeline erreicht.</div></div>"); }
});

function loadMessages(startTime) {
	$.ajax({url: "getPosts.php?start=" + startTime, success: function(result){
        $(".timelineend").remove();
        $(".appendable").append(result);
		
		if(String(result).length>5)
			$(".appendable").append("<div class=\"timelineelement timelineend\"><div class=\"end\">Klicken um &auml;ltere Posts zu laden.</div></div>");
		else
			$(".appendable").append("<div class=\"timelineelement timelineend\"><div class=\"end\" id=\"NothingMore\">Du hast das Ende der Timeline erreicht.</div></div>");
	}});
}

function searchResults(searchvalue) {
	$.ajax({url: "getSearchInfo.php?type=user&search=" + searchvalue, global: false, success: function(result){
		$("#searchOutput").append("<div class=\"timelineelement\">Personen</div>");
        $("#searchOutput").append(result);
		}});
	$.ajax({url: "getSearchInfo.php?type=post&search=" + searchvalue, success: function(result){
		$("#searchOutput").append("<div class=\"timelineelement\">Posts</div>");
        $("#searchOutput").append(result);
		}});
}