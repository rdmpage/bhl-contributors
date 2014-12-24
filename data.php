<?php

require_once (dirname(__FILE__) . '/couchsimple.php');


$contributors = array();


$i = 174;

for ($i = 0; $i < 177; $i++)
{
	
	$startkey = array($i);
	$endkey = array($i, "zzz");
	
	$url = '_design/count/_view/items_contributor_1000?startkey=' . json_encode($startkey) . '&endkey=' . json_encode($endkey) . '&group_level=4';
		
	
	$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);
	
	$response_obj = json_decode($resp);
	
	//print_r($response_obj);
	
	foreach ($response_obj->rows as $row)
	{
		$contributor = $row->key[1];
		
		if (!isset($contributors[$contributor]))
		{
			$contributors[$contributor] = array();
		}
		$contributors[$contributor][$i] = $row->value;
	}
}		
		
//print_r($contributors);

foreach ($contributors as $k => $v)
{
	echo $k;
	
	for ($i = 0; $i < 177; $i++)
	{
		echo "\t";
		if (isset($v[$i]))
		{
			echo $v[$i];
		}
		else
		{
			echo '';
		}
	}
	echo "\n";
}

?>
	
