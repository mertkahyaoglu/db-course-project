<?php
//get all movies which their ids on id.txt from omdbapi.com and writes them into data.json
//already written dont use again otherwise data.json will be ruined.
$idfile = fopen("id.txt", "r");

while(!feof($idfile)){ 
	$id = trim(fgets($idfile));
	$url = "http://www.omdbapi.com/?i={$id}";
	
	$json = file_get_contents($url);

	$datafile = fopen("data.json", 'a') or die('Cannot open file:  '.$my_file);
	fwrite($datafile, $json. PHP_EOL);
}
fclose($idfile);
fclose($datafile);
?>