<?php

require 'vendor/autoload.php';

use Speedtest\Speedtest;

// Initialize Speedtest object
$speedtest = new Speedtest();

// Download speed test
$speedtest->setServerByName('Google Los Angeles'); // You can choose a different server
$download_speed = $speedtest->download();

// Upload speed test
$upload_speed = $speedtest->upload();

// Get results
$results = $speedtest->results();

// Print results
echo "Download speed: " . round($download_speed / 1024 / 1024, 2) . " Mbps<br>";
echo "Upload speed: " . round($upload_speed / 1024 / 1024, 2) . " Mbps<br>";
echo "Ping: " . $results->ping . " ms";