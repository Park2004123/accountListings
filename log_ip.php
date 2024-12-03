<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$file = 'ips.txt';

// Check if the file is writable or can be created
if (is_writable(dirname($file))) {
    $current = file_get_contents($file);
    $current .= $ip . "\n";
    file_put_contents($file, $current);
    echo "IP address logged successfully.";
} else {
    echo "The directory is not writable.";
}
?>
