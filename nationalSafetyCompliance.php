<?php
session_start();
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
	<link rel="stylesheet" href="https://vjs.zencdn.net/7.1.0/video-js.css">
	<link rel="stylesheet" href="css/master.css">


</head>

<body data-gr-c-s-loaded="true">

<div class="wrapper">
	<nav id="topbar" class="navbar navbar-expand">
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
			<a href="index.php"><img id="mainLogo" src="img/linemaster.svg" alt=""></a>
		</div>

        <?php
        if (isset($_SESSION['isSignedIn']) AND $_SESSION['isSignedIn'] === TRUE) {
            echo '<ul class="list-unstyled components">
			<li>
				<a href="#safetySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Training
					Required <span class="badge badge-danger">1</span></a>
				<ul class="list-unstyled collapse" id="safetySubmenu" style="">
					<li>
						<a href="nationalSafetyCompliance.php">Back Safety</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#workplaceSubmenu" data-toggle="collapse" aria-expanded="false"
				   class="dropdown-toggle collapsed">Training Completed <span class="badge badge-success">3</span></a>
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
		<button type="button" id="sidebarCollapse" class="btn btn-info">
			<i class="fas fa-align-left"></i>
		</button>
		<div id="videoContainer">
			<h2>National Safety Compliance - <span id="videoLength"></span></h2>
			<h4>Back Safety</h4>
			<video id="my-video" class="video-js vjs-fluid" controls preload="auto"
				   poster="img/poster.jpg" data-setup="{}">
				<source src="videos/NationalSafetyCompliance.mp4" type='video/mp4'>
				<source src="videos/NationalSafetyCompliance.mp4" type='video/webm'>
				<p class="vjs-no-js">
					To view this video please enable JavaScript, and consider upgrading to a web browser that
					<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				</p>
			</video>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex
				ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
				fugiat
				nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
				mollit
				anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex
				ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
				fugiat
				nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
				mollit
				anim id est laborum.</p>
			<div class="row">
				<div class="col-md-12 text-right"><a href="index.php">
						<button type="button" class="btn btn-primary btn-lg">Mark Completed</button>
					</a></div>
			</div>
			<div class="line"></div>

		</div>


	</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
		integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
		crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
		integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>
<script src="https://vjs.zencdn.net/7.1.0/video.js"></script>
<script src="js/videoHotkeys.js"></script>
<script src="js/sidebarToggle.js"></script>
<script>

    $(document).ready(function () {
        var player = videojs('my-video');


        if (player.readyState() < 1) {
            // do not have metadata yet so loadedmetadata event not fired yet (I presume)
            // wait for loadedmetdata event
            player.one("loadedmetadata", onLoadedMetadata);
        }
        else {
            // metadata already loaded
            onLoadedMetadata();
        }

        function onLoadedMetadata() {
            var sec = player.duration();
            var hours = Math.floor(sec / 3600);
            var min = Math.floor((sec - (hours * 3600)) / 60);
            var seconds = Math.floor(sec % 60);

            $("#videoLength").html(hours + ':' + min + ':' + seconds);
        }
    });

</script>
<script src="js/initials.js"></script>
</body>
</html>