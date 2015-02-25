<?php
	/** Code is poetry **/
	session_start();
	include "userApi.php";
	
	if(!isset($_SESSION['id']))
		header('Location:front.php?login=0');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>lettergard - <?php echo $_SESSION['name'];?></title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/angular.min.js"></script>
		<script src="js/base.js"></script>
		<script src="js/jQueryStuff.js"></script>
	</head>
	<body>
		<header>
			<div class="content">
				<div style="float:left;width:50px;">&nbsp;</div>
				<span class="title">lettergard</span>
				<div style="float:left;width:100px;">&nbsp;</div>
				<form class="searcharea">
					<input type="textbox" class="searchbar">
					<button class="searchbutton"><img src="img/search.png"></button>
				</form>
				<div style="float:left;width:100px;">&nbsp;</div>
				<div class="menu"><img src="img/menu.png">
					<form class="menuVolume" style="display:none;">
						<div class="firstelement"></div>
						<a class="menuelement" href="">Profil</a>
						<a class="menuelement" href="settings.php">Einstellungen</a>
						<a class="menuelement" href="">Hilfe</a>
						<a class="menuelement" href="logout.php">Logout</a>
						<div class="finalelement"></div>
					</form>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<nav>
				<div class="user">
				
					<div class="user_info">
						<div class="username"><?php echo $_SESSION['name']?></div>
					</div>
				
					<form id="postForm" method="post">
						<div name="Post" id="postTextAreaSide" role="textbox" class="post_text" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyPress="updateLength()"></div>
						<button class="post_button" id="postButtonSide">Post</button>
						<div class="post_length" id="postLengthValueSide">1000</div>
					</form>
				</div>
				<div class="content">
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowerCount"></div>
						</div>
						<div class="elementheader">&nbsp;Follower</div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowedCount"></div>
						</div>
						<div class="elementheader">&nbsp;Leuten denen Du folgst</div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="PostCount"></div>
						</div>
						<div class="elementheader">&nbsp;Anzahl deiner Posts</div>
					</div>
				</div>
				<footer>
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
				</footer>
			</nav>
			<div class="timeline" ng-app="" ng-controller="postController">
				<div class="timelineelement" ng-repeat="x in posts">
					{{x.inner}}
				</div>
				<div class="timelineelement timelineend"><div class="end">Nothing more to load.</div></div>
			</div>
			<script>
				/*function customersController($scope,$http) {
					$http.get("getPosts.php?")
					.success(function(response) {$scope.posts = response;});
				}*/
			</script>
		</div>
		<div id="SentError" style="display:none;">Nachricht konnte nicht versendet werden.</div>
	</body>
</html>