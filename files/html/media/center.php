<?php

$source = '/data/transmission/complete/';
$endings = array('avi', 'mkv', 'mp4', 'flv');
$files = scandir($dir);


function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
		$results[] = $path;
        } else if ($value != "." && $value != "..") {
		getDirContents($path, $results);

            $results[] = $path;
        }
    }

   return $results;
}

foreach (getDirContents($source) as $item) {
	$ext = pathinfo($item)['extension'];
	if (in_array($ext, $endings)) {

		$name = str_replace($source, "", $item);

		echo "<form action=\"player.php\" method=\"get\">";
		echo "<input type=\"hidden\" name=\"path\" value=\"$item\" />";
		echo "<input type=\"submit\" value=\"$name\"/>";
		echo "</form>";

	}
}


?>
