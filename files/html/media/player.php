<?php

include "stream.php";

$filePath = $_GET["path"];

$stream = new VideoStream($filePath);
$stream->start();

?>
