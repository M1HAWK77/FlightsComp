<?php

include("../Model/personDao.php");
include("../Model/user.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$type= $_SERVER["REQUEST_METHOD"];

switch($type){
    case "GET":
        PersonDao::select(new Person(null, null, null, $_GET['user'], $_GET['pw']));
        break;
    case "POST":
        PersonDao::insert(new Person($_POST['dni'],$_POST['name'],$_POST['lastName'], $_POST['user'],$_POST['pw']));
        break;
}