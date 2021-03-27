<?php

$next_day='2013-12-06';
$two_days_later='2013-12-07';

$getWeather = new Getweather ();
$getData = $getWeather->getData("source_flux/weather_data.csv");
$insertData = $getWeather->insertData($getData);

$displayData= $getWeather->displayData($next_day);//creation du tableau du lendemain
$displayData2=$getWeather->displayData($two_days_later);//creation du tableau du sur-lendemain

?>
