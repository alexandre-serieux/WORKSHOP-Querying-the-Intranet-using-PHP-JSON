#!/usr/bin/php
<?php
$file = 'autologin';
$current = file_get_contents($file);
$monday = date( "Y-m-d", strtotime("Monday this week"));
$sunday = date( "Y-m-d", strtotime("Sunday this week"));
$start_link = 'https://intra.epitech.eu/';
$middle_link = '/planning/load?format=json&start=';
$end_link = '&end=';
$autologin = $start_link . $current . $middle_link. $monday . $end_link . $sunday;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $autologin);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
$exec = curl_exec($ch);
curl_close($ch);

$test = json_decode($exec, true);
$file_config = 'config.json';
$open = file_get_contents($file_config);
$take_string = json_decode($open, true);

    for ($i = 0; $i != sizeof($test); $i++) {
        echo $test[$i][$take_string["SOMETHING"]];
    }

?>