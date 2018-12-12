<?php
header('Content-Type: text/html; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
require_once('simplehtmldom_1_5/simple_html_dom.php');
function findAndCompare(){
	//storing user inputs into variables
	//$uri = urlencode('http://...')
	/*$context = stream_context_create(array(
    'http' => array(
        'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
    ),
	));*/

	$opts = array('http'=>array('header' => "User-Agent:Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.75 Safari/537.1\r\n"));
	$context = stream_context_create($opts);

	$url1 = $_POST['website_url1'];
	$url2 = $_POST['website_url2'];
	if(!empty($url1) && !empty($url2)){
		
		$html1 = file_get_html($url1, false, $context);
		$html2 = file_get_html($url2, false, $context);
		
		if(!empty($html1) && !empty($html2)){
			$url1_links = array();
			$url2_links = array();
				foreach($html1->find('a[href^="http://www.tuttosport.com"]') as $a)
				{
					if($a->href)
					{
						$url1_links[]=$a->href;
					}
				}	
			foreach($html2->find('a[href^="http://www.gazzetta.it"]') as $a)
				{
					if($a->href) 
					{
						$url2_links[]=$a->href;
					}
				}	
			
	
			
			$output = fopen('php://output', 'w');
			foreach($url1_links as $val1)
			{
				foreach($url2_links as $val2)
				{
					$sim = similar_text($val1,$val2,$perc);
					//echo $val1."  ".$val2."  ".$sim."<br><br>";
					fputcsv($output, array($val1, $val2, $perc));
				 }
			}	
		}
		
	}
}
if(isset($_POST['submit']))
{
	findAndCompare();
}
?>    