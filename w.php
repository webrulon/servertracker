<?php
function rFile() {
	$myFile = "ips.json";
	$fh = fopen($myFile, 'r') or die("can't open file");
	$contents = fread($fh, filesize($myFile));
	$arr = json_decode($contents,true);
	fclose($fh);
	return $arr;
}
function wFile($arr) {
	$myFile = "ips.json";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = json_encode($arr);
	fwrite($fh, $stringData);
	fclose($fh);
}
$arr = rFile();
$password="change";
if ($_GET["p"]==$password) {
	if (isset($_GET["name"])) {
		$arr[$_GET["name"]]=$_SERVER['REMOTE_ADDR'];
	} else { echo 'need to set name:'; exit;}
}

var_dump($arr);

wFile($arr);
