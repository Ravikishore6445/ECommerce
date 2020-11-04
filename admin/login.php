<?php
include_once ('../lib/mySession.php');
include_once ('../lib/myDatabase.php');
include_once ('../classes/adminLogin.php');
?> 


<?php

$obj = new adminLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = $_POST['adminuser'];
    $adminpwd = $_POST['adminpass'];
    $loginChk = $obj->login_check($adminUser, $adminpwd);
}

?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css"
	media="screen" />
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="" method="post">
				<h1>Admin Login</h1>
				<span style="color:red; font-size:18px"></span>
				<?php 
				if(isset($loginChk))
				    echo $loginChk;
				?>
				
				<div>
					<input type="text" placeholder="Username" required=""
						name="adminuser" />
				</div>
				<div>
					<input type="password" placeholder="Password" required=""
						name="adminpass" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form>
			<!-- form -->
			<div class="button">
				<a href="#">Training with live project</a>
			</div>
			<!-- button -->
		</section>
		<!-- content -->
	</div>
	<!-- container -->
</body>
</html>