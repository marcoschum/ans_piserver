<?php
    $bytes_root = disk_free_space("/");
    $bytes_disk = disk_free_space("/data");
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class_root = min((int)log($bytes_root , $base) , count($si_prefix) - 1);
    $class_disk = min((int)log($bytes_disk , $base) , count($si_prefix) - 1);
		$output_cpu = shell_exec("/bin/cat /sys/class/thermal/thermal_zone0/temp");
		$output_gpu = shell_exec("/opt/vc/bin/vcgencmd measure_temp");


		echo "<center>";
    echo "Free disk space on '/' : " . sprintf('%1.2f' , $bytes_root / pow($base,$class_root)) . ' ' . $si_prefix[$class_root] . '<br />';
    echo "Free disk space on '/data' : " . sprintf('%1.2f' , $bytes_disk / pow($base,$class_disk)) . ' ' . $si_prefix[$class_disk] . '<br />';


    echo "CPU Temp: " . ($output_cpu / 1000) . " °C<br>";
    echo "GPU Temp: $output_gpu";

    echo "<button onClick=\"window.location.reload();\">reload</button>";
		echo "</center>";
?>
