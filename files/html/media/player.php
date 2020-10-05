<html>

<head>
  <link rel="icon" type="image/png" href="assets/favicon.png">
</head>
</body>

<?php

include "stream.php";

$filePath = $_GET["path"];

$stream = new VideoStream($filePath);
$stream->start();

?>
</body>
</html>
