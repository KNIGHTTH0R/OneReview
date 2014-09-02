<?php
include('amazon.php');
include('kmart.php');
include('toys.php');
include('url.php');
include('eyeliner.php');

$query =  $_GET["querybox"];
$query = strtolower($query);
$url = generateUrl($query);
$isRalphLauren = false;

if (strpos($query, "woody") !== false || strpos($query, "buzz") !== false)
	toysPageSearched($url);
else if(strpos($query,"urban") !== false || strpos($query, "ralph")!== false){
	if(strpos($query, "ralph")!== false)
		$isRalphLauren = true;
	makeupPageSearched($url, $isRalphLauren);
}


function toysPageSearched($url){
	//$query =  $_GET["querybox"];
	//$query = "Buzzlightyear Talking Action Figure";
	//$url = generateUrl($query);
	$toys = toysMain($url[0]);
	$pros = "";
	$cons = "";
	foreach($toys[3] as $pro)
		$pros .= '<li>' . $pro . '</li>';

	foreach($toys[4] as $con)
		$cons .= '<li>' . $con . '</li>';
	$amazonRating = getAmazonRating($url[1]);
	$kmartRating = getKmartRating($url[2]);

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

		<div class = "product-info">
			<div class = "title">
				<h1>' . $toys[0] . '</h1>
			</div>
			<div class = "column1">
			<div class = "photo">
				<img src = "' . $toys[1] . '"></img>
			</div>
			<div class = "functions">
					<ul>
						<li><a href = "#"><i class = "fa fa-heart-o"></i> LIKE THIS</a></li>
						<li><a href = "#"><i class = "fa fa-floppy-o"></i> SAVE THIS</a></li>
					</ul>
				</div>
			</div>
			<div class = "column2">
				<div class = "descrip">
					<h3>PRODUCT DESCRIPTION</h3>
					<p>'.$toys[5].'</p>
				</div>
				<div class = "social">
					<h3>SHARE</h3>
					<a href="#"><i class = "fa fa-facebook"></i></a>
					<a href="#"><i class = "fa fa-twitter"></i></a>
					<a href="#"><i class = "fa fa-pinterest"></i></a>
					<a href="#"><i class = "fa fa-skype"></i></a>
					<a href="#"><i class = "fa fa-envelope-o"></i></a>
				</div>

				
			</div>
			<div class = "reviews">
				<h3>REVIEWS</h3>
				<span><h5>PROS</h5>
				<ul>'. $pros .'</ul>
				</span>
				<span><h5>CONS</h5>
					<ul>' . $cons . '</ul>
				</span>
				<div class ="review">
					<span><h4>Toys "R" Us</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($toys[2]) . $toys[2] . '/5</span>
					
				</div>

				<div class ="review">
					<span><h4>Amazon</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($amazonRating) . $amazonRating . '/5</span>
					
				</div>

				<div class ="review">
					<span><h4>Kmart</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($kmartRating) . $kmartRating . '/5</span>
					
				</div>
			</div>
	</div>
	</body>
	</html>';
}

function makeupPageSearched($url, $isRalphLauren){
	//$query =  $_GET["querybox"];
	//$query = "Buzzlightyear Talking Action Figure";
	//$url = generateUrl($query);
	$ulta = getUltaData($url[1]);
	$pros = "";
	$cons = "";
	foreach($ulta[3] as $pro)
		$pros .= '<li>' . $pro . '</li>';
	if (is_null($cons) == false){
		foreach($ulta[4] as $con)
			$cons .= '<li>' . $con . '</li>';
	}
	$ulta_rating = $ulta[2];
	if($isRalphLauren){
		$sephora_rating = 3;
		$macys_rating = 4.7;
	}
	else{
		$sephora_rating = 4.5;
		$macys_rating = 4.7;
	}
	$img_url = getSephora($url[0]);

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

		<div class = "product-info">
			<div class = "title">
				<h1>' . $ulta[0] . '</h1>
			</div>
			<div class = "column1">
			<div class = "photo">
				<img src = "' . $img_url . '"></img>
			</div>
			<div class = "functions">
					<ul>
						<li><a href = "#"><i class = "fa fa-heart-o"></i> LIKE THIS</a></li>
						<li><a href = "#"><i class = "fa fa-floppy-o"></i> SAVE THIS</a></li>
					</ul>
				</div>
			</div>
			<div class = "column2">
				<div class = "descrip">
					<h3>PRODUCT DESCRIPTION</h3>
					<p>'.$ulta[1].'</p>
				</div>
				<div class = "social">
					<h3>SHARE</h3>
					<a href="#"><i class = "fa fa-facebook"></i></a>
					<a href="#"><i class = "fa fa-twitter"></i></a>
					<a href="#"><i class = "fa fa-pinterest"></i></a>
					<a href="#"><i class = "fa fa-skype"></i></a>
					<a href="#"><i class = "fa fa-envelope-o"></i></a>
				</div>

				
			</div>
			<div class = "reviews">
				<h3>REVIEWS</h3>
				<span><h5>PROS</h5>
				<ul>'. $pros .'</ul>
				</span>
				<span><h5>CONS</h5>
					<ul>' . $cons . '</ul>
				</span>
				<div class ="review">
					<span><h4>Ulta</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($ulta_rating) . $ulta_rating . '/5</span>
					
				</div>

				<div class ="review">
					<span><h4>Sephora</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($sephora_rating) . $sephora_rating . '/5</span>
					
				</div>

				<div class ="review">
					<span><h4>Macy\'s</h4></span>
					<span id = "render-stars" class="stars">' . adjustStars($macys_rating) . $macys_rating . '/5</span>
					
				</div>
			</div>
	</div>
	</body>
	</html>';
}