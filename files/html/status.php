<?php
    $bytes_root = disk_free_space("/");
    $bytes_disk = disk_free_space("/data");
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class_root = min((int)log($bytes_root , $base) , count($si_prefix) - 1);
    $class_disk = min((int)log($bytes_disk , $base) , count($si_prefix) - 1);
    echo "Free disk space on '/' : " . sprintf('%1.2f' , $bytes_root / pow($base,$class_root)) . ' ' . $si_prefix[$class_root] . '<br />';
    echo "Free disk space on '/data' : " . sprintf('%1.2f' , $bytes_disk / pow($base,$class_disk)) . ' ' . $si_prefix[$class_disk] . '<br />';

?>
