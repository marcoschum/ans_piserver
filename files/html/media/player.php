<?php

include "stream.php";

$filePath = $_GET["path"];

echo "<h1>$filePath</h1>";

$stream = new VideoStream($filePath);
$stream->start();

?>
