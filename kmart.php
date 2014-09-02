<?php 
// example of how to use advanced selector features 
//include('/js/SimpleHTML/simple_html_dom.php'); 

$kmart_url = 'http://www.kmart.com/disney-toy-story-woody-talking-action-figure/p-004W002022527002P?sid=KDx01192011x000001&kpid=004W002022527002&kispla=004W002022527002P';
$kmart_url2 = 'http://www.kmart.com/disney-toy-story-buzz-lightyear-talking-action-figure/p-004W001944276002P?prdNo=4&blockNo=4&blockType=G4#desc';

//echo getKmartRating($kmart_url2);

function getKmartRating($url){
	$html = file_get_html($url);
	$html_rating = $html->find('span span span');
	return $html_rating[0]->innertext;
}

