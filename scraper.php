<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once ('vendor/electrolinux/phpquery/phpQuery/phpQuery.php');

function scrape() {

	$res = array();

	$port_id = 2308;

	$page_title = 'Is there a boat in Fenit ?';

	$page_desc = 'Is There A Boat In Fenit Dot Com';

	//$port_id = 245; //dubland

	$scrapeUrl = "http://www.marinetraffic.com/en/ais/index/ships/range/port_id:" . $port_id . '/ship_type:7';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $scrapeUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$html = curl_exec($ch);

	curl_close($ch);

	// Create phpQuery document with returned HTML
	$doc = phpQuery::newDocumentHTML($html);

	// get the table, should be the only one in the dom
	$table = $doc["table"];

	// remove the table header
	$vessels = pq($table) -> find("tr:not(:eq(0))");

	// This dosen't account for pagination, revist when Fenit get 10 more berths !
	$res['vesselCount'] =           pq($vessels) -> length;

	foreach ($vessels as $v) {

		$details = array();

		$details['name'] = ucfirst(strtolower( pq($v) -> find("td:eq(3) a:eq(0)") -> text()));

		// check name string to get around the tr with 'No data for specified filters'
		if ($details['name'] == '') {
			$res['vesselCount']--;

		} else {

			$details['link'] = pq($v) -> find("td:eq(3) a:eq(0)") -> attr('href');

			$details['photo_link'] = pq($v) -> find("td:eq(4) a:eq(0)") -> attr('href');

			$details['thumb'] = pq($v) -> find("td:eq(4) img") -> attr('src');

			$img_parts = explode("&", pq($v) -> find("td:eq(4) img") -> attr('src'));

			$size_parts = explode("x", pq($v) -> find("td:eq(6)") -> text());

			$details['size'] = array('l' => $size_parts[0], 'b' => substr(trim($size_parts[1]), 0, -2));

			$details['img'] = $img_parts[0];

			$res['vessels'][] = $details;

		}

	}
	return $res;

}
?>