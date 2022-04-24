<?php

function write_log($msg)
{
    $path = "log/";
    $file =$path."log";
    if (!file_exists($path))
    {
        mkdir($path, "0777", true);
    }
    $log_msg = date("Y-m-d H:i:s") . "  " . $msg . "\n\n";
    file_put_contents($file, $log_msg, FILE_APPEND);
    chmod($file,0777);
}
