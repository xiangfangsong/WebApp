<?php
$BOOKS_FILE = "books.txt";

function filter_chars($str) {
	return preg_replace("/[^A-Za-z0-9_]*/", "", $str);
}

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

$category = "";
$delay = 0;

if (isset($_REQUEST["category"])) {
	$category = filter_chars($_REQUEST["category"]);
}
if (isset($_REQUEST["delay"])) {
	$delay = max(0, min(60, (int) filter_chars($_REQUEST["delay"])));
}

if ($delay > 0) {
	sleep($delay);
}

if (!file_exists($BOOKS_FILE)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error - Unable to read input file: $BOOKS_FILE");
}

header("Content-type: application/json");

print "{\n  \"books\": [\n";

// write a code to : 
// 1. read the "books.txt"
// 2. search all the books that matches the given category 
// 3. generate the result in JSON data format 
$books = file_get_contents("books.txt");
$book = explode("\n",$books);
$count_item = false;
for($i=0;$i<count($book);$i=$i+1){
	$temp = explode("|",$book[$i]);
	if($temp[2] == $category){
		if($count_item)
			print ",{\"category\":\"$temp[2]\",\"title\":\"$temp[0]\",\"author\":\"$temp[1]\",\"year\":$temp[3],\"price\":$temp[4]}";
		else
			print "{\"category\":\"$temp[2]\",\"title\":\"$temp[0]\",\"author\":\"$temp[1]\",\"year\":$temp[3],\"price\":$temp[4]}";
		$count_item = true;
	}
}

print "  ]\n}\n";

?>
