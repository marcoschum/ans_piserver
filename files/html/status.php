<html>
  <head>
    <title>Status</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" href="assets/favicon.png">
  </head>
  <body style="background-color: #b7b7b7;">
    <section class="section">
      <center>
        <h1 class="title">Status</h1>

      <?php
          $bytes_root = disk_free_space("/");
          $bytes_disk = disk_free_space("/data");
          $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
          $base = 1024;
          $class_root = min((int)log($bytes_root , $base) , count($si_prefix) - 1);
          $class_disk = min((int)log($bytes_disk , $base) , count($si_prefix) - 1);
      		$output_cpu = shell_exec("/bin/cat /sys/class/thermal/thermal_zone0/temp");
      		$output_gpu = shell_exec("/opt/vc/bin/vcgencmd measure_temp");

          echo "<table>";
          echo "<tr><th>Free disk space on '/'</th><td>" . sprintf('%1.2f' , $bytes_root / pow($base,$class_root)) . ' ' . $si_prefix[$class_root] . '</td></tr>';
          echo "<tr><th>Free disk space on '/data'</th><td>" . sprintf('%1.2f' , $bytes_disk / pow($base,$class_disk)) . ' ' . $si_prefix[$class_disk] . '</td></tr>';


          echo "<tr><th>CPU Temp</th><td>" . ($output_cpu / 1000) . " °C </td></tr>";
          echo "<tr><th>GPU Temp</th><td>$output_gpu</td></tr>";
          echo "</table><br />";

          echo "<button class=\"button\" onClick=\"window.location.reload();\">reload</button>";
          echo "<button class=\"button\" onClick=\"window.history.back();\">back</button>";
      ?>
      </center>
    </section>
  </body>
</html>
