<?php
    include('authentication.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
    include('locationguard.php');
    ?>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Arfun | Lessons</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />
	<link href="css/lesson.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="index.php">
			<img src="assets/img/logo.png" alt="logo" width="50" height="50" class="logo">ArFun E-Learning</a>
		<!-- Sidebar Toggle-->

		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
				class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<!-- <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
					aria-describedby="btnNavbarSearch" />
				<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
						class="fas fa-search"></i></button>
			</div> -->
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false"><i class="fas fa-user fa-fw"></i> <span id="dispName">User</span></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
					<li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
					<li>
						<hr class="dropdown-divider" />
					</li>
					<li><a class="dropdown-item" href="account.php">Edit Account</a>
						<a class="dropdown-item" href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<?php
        include('side-nav.php');
        ?>
		<div id="layoutSidenav_content">
			
			<div class="upload-area pt-5">
				<h4>Note: The files to be uploaded must be in PDF.</h4>
				<button class="upload "><i class="fas fa-upload fa-lg ml-5"></i>    Upload</button>
				<div class="progress-container">
					<div class="progress"></div>
				</div>
				<div class="percent">0%</div>
				<div class="controls">
					<svg class="pause" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />
					</svg>
					<svg class="resume" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
						<path
							d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" />
					</svg>
					<svg class="cancel" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path
							d="M18.3 5.71c-.39-.39-1.02-.39-1.41 0L12 10.59 7.11 5.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L10.59 12 5.7 16.89c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L12 13.41l4.89 4.89c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" />
					</svg>
				</div>
				<input type="file" class="hidden-upload-btn" style="display: none;">
				<br><br>
				<input type="text" placeholder="Add description before selecting the file" class="text-description">
			</div>
			<div class="all-files">
				<h2 class="white">Videos</h2>
				<ul id="video"></ul>
				<h2 class="black">Audios</h2>
				<ul id="audio"></ul>
				<h2 class="file"><!--Note: Files to be uploaded must be in PDF format--></h2>
				<ul id="image"></ul>
			</div>
			<div class="expand-container" data-value="0">
				<ul>
					<li onclick="openFile(this)">Open</li>
					<li id="file-desc">Description</li>
					<!-- <li onclick="downloadFile(this)">Download</li> -->
					<li onclick="deleteFile(this)">Delete</li>
				</ul>
				<!-- Preloader image -->
				<img class="loader" src="https://aux.iconspalace.com/uploads/11080764221104328263.png" alt="">
			</div>

			<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

			<script>
				// Get the button:
				let mybutton = document.getElementById("myBtn");

				// When the user scrolls down 20px from the top of the document, show the button
				window.onscroll = function() {scrollFunction()};

				function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					mybutton.style.display = "block";
				} else {
					mybutton.style.display = "none";
				}
				}

				// When the user clicks on the button, scroll to the top of the document
				function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0; 
			}
			</script>
			<!-- firebase sdk -->
			<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
			<script src="https://www.gstatic.com/firebasejs/9.14.0/firebase-firestore.js" type="module"></script>
			<script src="script.js"></script>

			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">ArFun E-Learning Copyright 2022</div>
						<div>
							<?php
                            if (isset($_SESSION['dispName'])) {
	                            echo ucwords($_SESSION['dispName']);
                            }
                            ?>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<div class="description">
		<div class="window">
			<p>Description: <span id="item-desc"></span><br></p>
			<button id="close-desc">Close</button>
		</div>
	</div>

	<script>
        var sessionData = <?php echo json_encode($_SESSION);?>;
    </script>
    <div id="sessionDataContainer" data-session="<?php echo htmlentities(json_encode($_SESSION)); ?>"></div>
    <div id="section-sdc" data-session-section=""></div>
    <script>
        var sessionData = document.getElementById("sessionDataContainer").dataset.session;
        sessionData = JSON.parse(sessionData);
    </script>

	<script src="./js/lesson.js"></script>
	<script src="js/getCurrentUserData.js" type="module"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>
	<script type="module" src="js/getDesc.js"></script>
	<!-- <script src="js/scripts.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/chart-area-demo.js"></script>
	<script src="assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</body>

</html>