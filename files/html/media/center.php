<?php

$source= '/data/transmission/complete/';
$endings = array('avi', 'mkv', 'mp4', 'flv');


echo "
<html>
<head>
<style>
@media only screen and (max-width: 1000px) {
  .button {
    font-size: 45pt;
  }
}
 .button {
  margin-left: 25px;
  background-color: #dcfdff;
}
</style>
</head>
<body>";

function getDirContents($dir, &$results = array()) {
    $oldbasedir = "";
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
	$basedir = pathinfo($path)['dirname'];
	if (!is_dir($path)) {
	    if ($basedir != $oldbasedir){
	      printButton($path, true);
	    } else {
	      printButton($path, false);
	    }
	    $oldbasedir = $basedir;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
        }
    }

}

function printButton($item, $mode){
  global $endings, $source;
	$ext = (isset(pathinfo($item)['extension']) ? pathinfo($item)['extension'] : false );
	if (in_array($ext, $endings)) {
		$name = str_replace($source, "", $item);
		if ($mode){
			echo "<h1>" . str_replace($source, "", pathinfo($item)['dirname']) . "</h1>";
		}
		echo "<form action=\"player.php\" method=\"get\">";
		echo "<input type=\"hidden\" name=\"path\" value=\"$item\" />";
		echo "<input class=\"button\" type=\"submit\" value=\"$name\"/>";
		echo "</form>";

	}
}


getDirContents($source);


	     echo "</body>
</html>";

?>
