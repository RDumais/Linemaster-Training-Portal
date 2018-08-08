<?php
//Start the session for the visitor
session_name("EmployeeOnboardingPortal");
session_start();

if (!isset($_SESSION['isSignedIn']) OR $_SESSION['isSignedIn'] === FALSE) {
    header("Location: signIn.php"); /* Redirect browser */

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}


//If any errors arise display them
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Accessing an external file for database connection
require('../../php/connect.php');

//If unable to connect to database
if ($conn === false) {
    echo "Could not connect.\n";
    die(print_r(sqlsrv_errors(), true));
}


?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Linemaster Video Training</title>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
		  integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/master.css">
	<script src="js/jquery3.3.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>


</head>

<body data-gr-c-s-loaded="true">

<div class="wrapper">
	<nav id="topbar" class="navbar navbar-expand">
		<button type="button" id="sidebarCollapse" class="btn btn-info" onclick="this.blur();">
			<i class="fas fa-align-left"></i>
		</button>
        <?php
        if (isset($_SESSION['isSignedIn']) AND $_SESSION['isSignedIn'] === TRUE) {
            echo '<div class="navbar-collapse collapse">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
					aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
						   aria-haspopup="true" aria-expanded="false"><div id="initialHolder"></div><span id="empNameHolder">' . $_SESSION['empName'] . '</span>
                    
                </a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="php/signOut.php">Sign out</a>

						</div>
					</li>
				</ul>
			</div>
		</div>';
        } elseif (!isset($_SESSION['isSignedIn']) OR $_SESSION['isSignedIn'] === FALSE) {
            echo '<div class="navbar-collapse">
			<div class="" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link" href="signIn.php" id="navbarDropdownMenuLink">Sign in</a>

					</li>
				</ul>
			</div>
		</div>';
        }
        ?>
	</nav>
	<nav id="sidebar" class="">
		<div class="sidebar-header text-center">
			<a href="index.php"><img id="mainLogo" src="img/linemasterwhite.png" alt=""></a>
		</div>

        <?php
        if (isset($_SESSION['isSignedIn']) AND $_SESSION['isSignedIn'] === TRUE) {
            echo '<ul class="list-unstyled components">
			<li>
				<a href="#safetySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Training
					Required <span class="badge badge-danger">3</span></a>
				<ul class="list-unstyled collapse" id="safetySubmenu" style="">
					<li>
						<a href="backSafety.php">Back Safety</a>
					</li>
					<li>
						<a href="prevSexHarassForEmps.php">Preventing Sexual Harassment</a>
					</li>
					<li>
						<a href="hazComChemicalLabels.php">Hazard Chemical Labels</a>
					</li>					
				</ul>
			</li>
			<li>
				<a href="#workplaceSubmenu" data-toggle="collapse" aria-expanded="false"
				   class="dropdown-toggle collapsed">Training Completed</a>
				<ul class="list-unstyled collapse" id="workplaceSubmenu" style="">
					<li>
						<a href="#">Completed Training #1</a>
					</li>
					<li>
						<a href="#">Completed Training #2</a>
					</li>
					<li>
						<a href="#">Completed Training #3</a>
					</li>
				</ul>
			</li>
		</ul>';
        } elseif (!isset($_SESSION['isSignedIn']) OR $_SESSION['isSignedIn'] === FALSE) {
            echo '';
        }
        ?>
	</nav>

	<!-- Page Content Holder -->
	<div id="content">
        <?php
        if (isset($_SESSION['isSignedIn']) AND $_SESSION['isSignedIn'] === TRUE) {
            echo '<h1 class="text-center">Hi <span class="variableHolder">'.$_SESSION['empFirstName'].'</span>, you have
		training to complete.</h1>
		<div id="contentContainer" class="text-center row">
			<div class="col-lg-6">
				<div class="card border-danger">
					<div class="card-header">
						Training Required
					</div>
					<div class="card-body">
						<div class="card">
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><a href="backSafety.php">Back Safety - 12:31</a></li>
								<li class="list-group-item"><a href="prevSexHarassForEmps.php">Preventing Sexual Harassment for Employees - 15:36</a></li>
								<li class="list-group-item"><a href="hazComChemicalLabels.php">Hazard Communication Chemical Labels - 13:47</a></li>
							</ul>
						</div>
						<a href="backSafety.php" class="btn btn-danger">Go to training</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card border-success">
					<div class="card-header">
						Training Completed
					</div>
					<div class="card-body">
						<div class="card">
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><a href="#">Completed Training #1 - 11:22</a></li>
								<li class="list-group-item"><a href="#">Completed Training #2 - 17:39</a></li>
								<li class="list-group-item"><a href="#">Completed Training #3 - 29:11</a></li>
							</ul>
						</div>
						<a href="#" class="btn btn-success">Go to completed</a>
					</div>
				</div>
			</div>';
		} elseif (!isset($_SESSION['isSignedIn']) OR $_SESSION['isSignedIn'] === FALSE) {
            echo '';
        }
        ?>
	</div>
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
		integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
		crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
		integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>
<script src="js/sidebarToggle.js"></script>
<script src="js/initials.js"></script>
</body>
</html>