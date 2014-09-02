<?php 
// example of how to use advanced selector features 
//include('/js/SimpleHTML/simple_html_dom.php'); 

$amazon_url = 'http://www.amazon.com/Story-Collection-Talking-Sheriff-Woody/dp/B00261HR84';
$amazon_url2 = 'http://www.amazon.com/Disney-Ultimate-Lightyear-Talking-Action/dp/B000BYE0A6/ref=sr_1_2?ie=UTF8&qid=1403336905&sr=8-2&keywords=buzz+lightyear+talking+figure';

//echo getAmazonRating($amazon_url);

function getAmazonRating($url){
	$html = file_get_html($url);
	$html_rating = $html->find('div[id=revSum] span span');
	$string = $html_rating[0]->innertext;
	return substr($string, 0, 3);
}
