<?php

require_once (dirname(__FILE__) . '/lib.php');
require_once (dirname(__FILE__) . '/couchsimple.php');

/*
// 176483
// Items
for ($ItemID = 1; $ItemID < 10000; $ItemID++)
{
	echo $ItemID . "\n";
	$url = 'http://www.biodiversitylibrary.org/api2/httpquery.ashx?op=GetItemMetadata&itemid=' . $ItemID . '&pages=f&apikey=' . '0d4f0303-712e-49e0-92c5-2113a5959159' . '&format=json';
	
	$json = get($url);
				
	$obj = json_decode($json);
	
	if (isset($obj->Result))
	{	
		$item = $obj->Result;
	
		$item->_id = 'item/' . $ItemID;
	
		echo "CouchDB...\n";
		$couch->add_update_or_delete_document($item, $item->_id);
	}
}
*/

// titles
// 98044

$start 	= 68753;
$end 	= 98044;
for ($TitleID = $start; $TitleID < $end; $TitleID++)
{
	echo $TitleID . "\n";

	$url = 'http://www.biodiversitylibrary.org/api2/httpquery.ashx?op=GetTitleMetadata&titleid=' . $TitleID . '&items=true&apikey=' . '0d4f0303-712e-49e0-92c5-2113a5959159' . '&format=json';
	
	$json = get($url);
				
	$obj = json_decode($json);
	
	if (isset($obj->Result))
	{
	
		$title = $obj->Result;
	
		$title->_id = 'title/' . $TitleID;
	
		echo "CouchDB...\n";
		$couch->add_update_or_delete_document($title, $title->_id);
	}
}



?>
