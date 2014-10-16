<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ICT Support</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" /> 
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="header-wrap" style="text-align:center">
	<div id="header-container">
		<div id="header"><center>
			<h1><a href='index.php'><img src="images/template/header-coffee.png"/></a></h1>
			<ul>
		    <li><a href="index.php">Home</a> | </li>
			<li><a href="show_jobs.php">Jobs </a> | </li>		
			<li><a href="show_stats.php">Stats</a> | </li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="show_assets.php">Assets</a></li>
			<li><a href="show_byod.php">Byod</a></li>
			<?php
				session_start();
				// Display the Username capitalized and remove the email part
				if ($_SESSION['user'] != "") {echo "<li><a href='#'>" . ucfirst(substr($_SESSION['user'], 0, strpos($_SESSION['user'], "@"))) . "</a></li><a href='user_logout_process.php'><img src='images/icons/user-logout.png' border=0/></a>";}
				else {echo "<li><a href='user_login.php'>Login</a></li>";}
			?>
			</ul>
</center>
		</div>
	</div>
</div>
	<div id="container">
		<div id="content">
		</div>           
</div>