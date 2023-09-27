<?php

include("../Model/flights.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$type= $_SERVER["REQUEST_METHOD"];

switch($type){
    case "GET":
            Flights::select();
        break;
    case "POST":
            Flights::selectFilter($_POST['departureCity'],$_POST['arrivalCity'],$_POST['departureTime'], $_POST['arrivalTime'], $_POST['typeTrip']);
        break;
}