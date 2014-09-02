<?php
// example of how to use advanced selector features
//include('/js/SimpleHTML/simple_html_dom.php');

$sephora_url = "http://www.sephora.com/24-7-glide-on-eye-pencil-P133707";
$ulta_url = "http://www.ulta.com/ulta/browse/productDetail.jsp?productId=xlsImpprod2520065";

$macys_url = "http://www1.macys.com/shop/product/urban-decay-24-7-glide-on-eye-pencil?ID=296516";

function getSephora($url)
{
	//scraping Sephora by changing the user agent to believe it is a browser
	$options = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Accept-language: en\r\n" .
	              "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
	              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	  )
	);

	$context = stream_context_create($options);
	$file = file_get_contents($url, false, $context);
	$file = str_get_html($file);

	//image portion 
	$short_img_url = $file->find('div[id=modal-view-larger] img');
	$product_img_url = 'http://www.sephora.com' . $short_img_url[0]->src; 

	//description portion 
	//$recommendation_section = $file->find('span[class=recommendation-copy]');
	//echo $recommendation_section[0];
	//echo $file;
	return $product_img_url;
}

//	echo getSephora($sephora_url);
//echo '<img src="' . getSephoraImage($sephora_url) . '"</img><br>'; 


function getUltaData($url)
{
	$html = file_get_html($url); 	
	$description = $html->find('div[class=product-catalog-content]'); 
	$description =  $description[0]->innertext; 
	$description =  $string = strip_tags($description);
	$rating = $html->find('span[class=pr-rounded]');

	$return_array = array(6);
	$return_array[0] = strip_tags($html->find('div[class=product-detail-content] h3')[0]);
	$return_array[1] = $description;
	$return_array[2] = $rating[0]->innertext;

	
	$pros = $html->find('div[class=pr-attribute-pros] ul');
	$pros = $pros[0];
	$size = count($pros);
	$pros_array = array($size);
	$i = 0;
	foreach($pros->find('li') as $pro)
	{
		$pros_array[$i] = $pro->innertext;
		$i++;
	}

	$return_array[3] =  $pros_array;


	$cons = $html->find('div[class=pr-attribute-cons] ul');
	$cons = $cons[0];
	$size = count($cons);
	$cons_array = array($size);
	$i = 0;
	foreach($cons->find('li') as $con)
	{
		$cons_array[$i] = $con->innertext;
		$i++;
	}

	if(count($cons_array) == 0)
	{
		$return_array[4] = null;
	}
	else
	{
		$return_array[4] = $cons_array;
	}


	//echo $html->find('div[class=scene7Container_flyout] img');
	//$return_array[5] = $html->find('div[class=product-detail-info] img');
	return $return_array;
	//var_dump($return_array[5]);
}



function printUltaArray($my_array)
{
	for($i=0; $i<count($my_array) -2 ; $i++)
	{
		echo $my_array[$i] . '</br>';
	}

	for($i=0; $i<count($my_array[3]); $i++)
	{
		echo $my_array[3][$i] . '</br>';
	}

	for($i=0; $i<count($my_array[4]); $i++)
	{
		echo $my_array[4][$i] . '</br>';
	}

}


//echo printUltaArray(getUltaData($ulta_url)); 
//getUltaData($ulta_url);