<?php
include('amazon.php');
include('kmart.php');
include('toys.php');
include('url.php');

pageUnsearched();

function pageUnsearched(){
	echo '<!DOCTYPE html> 
		<html xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
		<head>
			<link id="size-stylesheet" href = "main.css" rel="stylesheet"/>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
			<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
			<script type="text/javascript" src="resolution.js"></script>

		<!--[if gte mso 9]><xml>
		<mso:CustomDocumentProperties>
		<mso:IsMyDocuments msdt:dt="string">1</mso:IsMyDocuments>
		</mso:CustomDocumentProperties>
		</xml><![endif]-->
		</head>
		<body>
			<div class = "nav">
				<div class = "logo">
					<i class = "fa fa-star"></i>&nbsp;OneReview
				</div>

				<ul class = "login">
					<li class = "elm" style="width: 45px; line-height:2em"><a href = "#"><i class = "fa fa-gear"></i></a>
						<ul class = "sub">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Favorites</a></li>
							<li><a href="#">My Lists</a></li>
							<li><a href="#">Sign Out</a></li>
						</ul>
					</li>
					<li class = "elm" ><img src="images/claire-icon.jpeg" width="40px" height="40px"></img></li>
					<span><li class = "elm">Welcome, Claire.</li></span>
				</ul>
			</div>
			
			<div class = "search">
					<form action="query.php" method="get">
			            <input class="bar"type="text" name="querybox" placeholder="What would you like to find reviews for?" required>
			            <button class="button"type="submit" style="border: 0; background: transparent">
			    			<i class="fa fa-search" style="font-size:20px" alt="submit"></i>
						</button>
					</form>
			</div>

			<div class = "homepage">
				<h1>Welcome, Claire.</h1>
				<h3>What reviews can I find for you today?</h3>
				<img src="images/cortana.gif"/>
			</div>';
}

