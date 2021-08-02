<?php
ob_start();
require("connect.php");

$make = $_POST['make'];
$model = $_POST['model'];

$android = $_POST['android'];
$apple = $_POST['apple'];
$sensors = $_POST['sensors'];
$bluetooth = $_POST['bluetooth'];
$camera = $_POST['camera'];

$id = time();



if (!empty($model)) {

	header("location:cars.php?make=$make&model=$model&android=$android&apple=$apple&sensors=$sensors&bluetooth=$bluetooth&camera=$camera");
} else {

	header("location:cars.php?make=$make");
}