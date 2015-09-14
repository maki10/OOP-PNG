<?php 

require "Classes/Png.php";

if(isset($_GET['picture']) && !isset($_GET['add'])){
	$img = $_GET['picture'];
	$png = new CreatePNG($img);
	$png->Open();
}else{
	$img = $_GET['picture'];
	$png = new CreatePNG($img);
	$png->Add($_GET['add'], 50, 50, 20, 13, 100, 100);
	$png->Open();
}
