<?php
header('Content-Type: text/html; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
include_once 'simplehtmldom_1_5/simple_html_dom.php';
function findAndCompare(){
	//storing user inputs into variables
	
	$url1 = $_POST['website_url1'];
	$url2 = $_POST['website_url2'];
	if(!empty($url1)&&!empty($url2)){
		
		$html1 = file_get_html($url1);
		$html2 = file_get_html($url2);
		
		if(!empty($html1&&!empty($html2))){
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