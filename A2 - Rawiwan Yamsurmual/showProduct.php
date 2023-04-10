<!DOCTYPE html>
<html>
<head>
<title>Post message</title>
</head>
<body>
<h1>Products On Sale</h1>
<?php
if ((!file_exists("GearDirectory.txt")) || (filesize("GearDirectory.txt")== 0))
	echo "<p>There are no product posted.</p>\n";
else {
$MessageArray = file("GearDirectory.txt");
	echo "<table style=\"background-color:lightgreen\" border=\"1\" width=\"100%\">\n";
	$count = count($MessageArray);
	for ($i = 0; $i < $count; ++$i) {
		$CurrMsg = explode("~", $MessageArray[$i]);
		$KeyArray[] = $CurrMsg[0];
		$ValueArray[] = $CurrMsg[0] . "~" . $CurrMsg[0];
	}
	$KeyMessageArray = array_combine($KeyArray, $ValueArray);
	$Index = 1;
	foreach($KeyMessageArray as $Message) {
		$CurrMsg = explode("~", $Message);
		echo "<tr>\n";
		echo "<td width=\"5%\" style=\"text-align:center\"><span style=\"font-weight:bold\">" . $Index . "</span></td>\n";
		echo "<td width=\"85%\"><span style=\"font-weight:bold\"> Item:</span> " . htmlentities(key($KeyMessageArray)) ."<br /><br />";
		echo "</tr>\n"; 
		++$Index;
		next($KeyMessageArray);
}}
?>
<p>
<a href="postBid.php"><input type="submit" name="Submit" value="Start The Bid" /></a><br />


</p>
</body>
</html>