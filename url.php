<?php 
// example of how to use advanced selector features 
include('/js/SimpleHTML/simple_html_dom.php'); 

//var_dump(generateUrl("Ralph Lauren Big Pony #3 Spray"));

function generateUrl($search){
	$woody_amazon = 'http://www.amazon.com/Story-Collection-Talking-Sheriff-Woody/dp/B00261HR84';
	$woody_toys = 'http://www.toysrus.com/product/index.jsp?productId=3544816&cp=2273442.2255958.34846386.4009599&parentPage=family';
	$woody_kmart = 'http://www.kmart.com/disney-toy-story-woody-talking-action-figure/p-004W002022527002P?sid=KDx01192011x000001&kpid=004W002022527002&kispla=004W002022527002P';

	$buzz_amazon = 'http://www.amazon.com/Disney-Ultimate-Lightyear-Talking-Action/dp/B000BYE0A6/ref=sr_1_2?ie=UTF8&qid=1403336905&sr=8-2&keywords=buzz+lightyear+talking+figure';
	$buzz_toys = 'http://www.toysrus.com/product/index.jsp?productId=3544813&cp=2255956.3209580.11324991&parentPage=family';
	$buzz_kmart = 'http://www.kmart.com/disney-toy-story-buzz-lightyear-talking-action-figure/p-004W001944276002P?prdNo=4&blockNo=4&blockType=G4#desc';

	$eyeliner_sephora = 'http://www.sephora.com/24-7-glide-on-eye-pencil-P133707';
	$eyeliner_ulta = 'http://www.ulta.com/ulta/browse/productDetail.jsp?productId=VP11242';
	$eyeliner_macys = 'http://www1.macys.com/shop/product/urban-decay-24-7-glide-on-eye-pencil?ID=296516';

	$spray_sephora = 'http://www.sephora.com/big-pony-3-deodorizing-body-spray-P306809?skuId=1263854';
	$spray_ulta = 'http://www.ulta.com/ulta/browse/productDetail.jsp?productId=xlsImpprod2520065';
	$spray_macys = 'http://www1.macys.com/shop/product/ralph-lauren-polo-big-pony-number-3-all-over-body-spray-67-oz?ID=505262&CategoryID=30076#fn=sp%3D1%26spc%3D22%26kws%3Dralph%20lauren%20big%20pony%20%233%26slotId%3D1';

	$array = array(3);

	$search = strtolower($search);

	if(strpos($search, "woody") !== false){
		$array[0] = $woody_toys;
		$array[1] = $woody_amazon;
		$array[2] = $woody_kmart;
		return $array;
	}
	else if(strpos($search, "buzz") !== false){
		$array[0] = $buzz_toys;
		$array[1] = $buzz_amazon;
		$array[2] = $buzz_kmart;
		return $array;
	}
	else if(strpos($search, "urban") !== false){
		$array[0] = $eyeliner_sephora;
		$array[1] = $eyeliner_ulta;
		$array[2] = $eyeliner_macys;
		return $array;
	}
	else if(strpos($search, "ralph") !== false){
		$array[0] = $spray_sephora;
		$array[1] = $spray_ulta;
		$array[2] = $spray_macys;
		return $array;
	}
	else
		return null;
}

function adjustStars($rating) {
	$stars = round($rating * 2) / 2;
	if ($stars < 0.5) {
		return "";
	}
	else if ($stars < 1) {
		return "<i class = 'fa fa-star-half'></i>";
	}
	else if ($stars < 1.5) {
		return "<i class = 'fa fa-star'></i>";
	}
	else if ($stars < 2) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star-half'></i>";
	}
	else if ($stars < 2.5) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>";
	}
	else if ($stars < 3) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star-half'></i>";
	}
	else if ($stars < 3.5) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>";
	}
	else if ($stars < 4) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star-half'></i>";
	}
	else if ($stars < 4.5) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>";
	}
	else if ($stars < 5) {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star-half'></i>";
	} else {
		return "<i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>";
	}
}