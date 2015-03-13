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
});