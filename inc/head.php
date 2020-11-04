<?php
 include_once 'lib/mySession.php';   // include Session file
 mySession::init();   // Start our session with init method
 include_once'lib/myDatabase.php'; // include Database file
 
  spl_autoload_register(function($class){
   include_once "classes/".$class.".php";
  });
 
  $db = new myDatabase();   // Create Database Class Object 
  $pd = new Product(); // Create Product Class Object 
  $ct = new Cart(); // Create Cart Class Object 
 
 ?>


<!DOCTYPE html>
<html>
<head>
<title>CRUD PHP for Beginners</title>
<style type="text/css">
body {
	background-color: #e6e6e6;
	font-family: arial;
	font-size: 18px;
	line-height: 22px;
	margin: 0 auto;
	width: 800px;
}

.headeroption {
	background: #3399ff url("img/php.png") no-repeat scroll 56px 18px;
	height: 80px;
	overflow: hidden;
	padding-left: 180px;
	padding-top: 10px;
}

.footeroption {
	background: #3399ff;
	height: 80px;
	overflow: hidden;
}

.content {
	background: #f2f2f2;
	border: 6px solid #3399ff;
	font-size: 16px;
	line-height: 22px;
	min-height: 450px;
	overflow: hidden;
	margin-bottom: 8px;
	margin-top: 8px;
}

.footeroption h2 {
	font-size: 25px;
	text-align: center;
}

.tmain {
	width: 100%;
	border: 1px solid;
	margin: 20px 0;
}

.tmain td {
	text-align:center;

	
	
}

.tmain th {
	text-align:center;
	border: 1px solid;
	
	
}

a{
text-decoration:none;	
	
	
}
</style>
</head>
<body>
	<header class="headeroption">
		<h2>CRUD PHP for Beginners</h2>
	</header>


</body>

</html>