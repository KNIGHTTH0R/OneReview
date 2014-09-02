<?php 
// example of how to use advanced selector features 
//include('/js/SimpleHTML/simple_html_dom.php'); 
$toy_url = 'http://www.toysrus.com/product/index.jsp?productId=3544816&cp=2273442.2255958.34846386.4009599&parentPage=family';
$toy_url2 = 'http://www.toysrus.com/product/index.jsp?productId=3544813&cp=2255956.3209580.11324991&parentPage=family';

/*$result = toysMain($toy_url);
echo $result[0];
echo "<br>";
echo $result[1];
echo "<br>";
echo $result[2];
echo "<br>";
var_dump($result[3]);
echo "<br>";
var_dump($result[4]);
echo "<br>";
echo $result[5];*/

function toysMain($url){
	$html = file_get_html($url);
	$array = array(6);
	$array[0] = getToysTitle($html);
	$array[1] = getToysPicture($html);
	$array[2] = getToysRating($html);
	$array[3] = getToysPros($html);
	$array[4] = getToysCons($html);
	$array[5] = getToysDescription($html);
	return $array;
}

function getToysTitle($html){
	$html_title = $html->find('div[id=lTitle] h1');
	return $html_title[0]->innertext;
}

function getToysPicture($html){
	$html_img = $html->find('div[id=bubLyr1] img');
	return "http://toysrus.com" . $html_img[0]->src;
}

function getToysDescription($html){
	$html_desc = $html->find('div[id=Description] p');
	return $html_desc[0]->innertext;
}

function getToysRating($html){
	$html_stars = $html->find('div[id=prod_ratings] .pr-snapshot-rating span');
	return $html_stars[0]->innertext;
}

function getToysPros($html){
	$html_pros = $html->find('.pr-attribute-pros ul', 0);
	$html_li = $html_pros->find('li');
	$size = count($html_li);
	//foreach($html_li as $child)
	//	echo $child->innertext;
	$array = array($size);
	for($i=0; $i<$size; $i++){
		$array[$i] = $html_li[$i]->innertext;
	}
	return $array;
}

function getToysCons($html){
	$html_cons = $html->find('.pr-attribute-cons ul', 0);
	$html_li = $html_cons->find('li');
	$size = count($html_li);
	//foreach($html_li as $child)
	//	echo $child->innertext;
	for($i=0; $i<$size; $i++){
		$array[$i] = $html_li[$i]->innertext;
	}
	return $array;
}