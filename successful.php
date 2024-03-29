<?php
//echo "you have succesfully logged in!";
session_start();
?>
<html lang="en">
<head>
	<title>Sucessful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
	 <style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
  </style>
</head>
<body style="background-image: url('images/background.jpg');">
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<a class="navbar-brand"  href="#">Our project</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php" >Log Out</a>
					</li>
				</ul>
			</div>
		</nav>

	<div class="container emp-profile">
				<form method="post">
					<div class="row">
						<div class="col-md-4">
							<div class="profile-img">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" />
								<div class="file btn btn-lg btn-primary">
									Change Photo
									<input type="file" name="file"/>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="profile-head">
										<h2>
										   Welcome, Jane! 👋
										</h2>
										<p class="proile-rating">MEMBER SINCE : <span>January 2019</span></p>
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="profile-work">
								<p>SETTINGS</p>
								<a href="">Upgrade to Premium</a><br/>
								<a href="">Account Settings</a><br/>
								<a href="">Reset Your Password</a><br/>
								<a href="">Terms of Contract</a><br/>
								<a href="">Contact us</a><br/>
								<a href="">Help</a><br/>
                     
							</div>
						</div>
						<div class="col-md-8">
							<div class="tab-content profile-tab" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
												</div>
												<div class="col-md-6">
													<p>abc</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Password</label>
												</div>
												<div class="col-md-6">
													<p>123</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>First Name</label>
												</div>
												<div class="col-md-6">
													<p>Jane</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Last Name</label>
												</div>
												<div class="col-md-6">
													<p>Doe</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Email</label>
												</div>
												<div class="col-md-6">
													<p>abc@njit.edu</p>
												</div>
											</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<footer class="container-fluid py-5" style="background-color: white;">
			  <div class="row">
				<div class="col-12 col-md">
				  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
				  <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
				</div>
				<div class="col-6 col-md">
				  <h5>Features</h5>
				  <ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Cool stuff</a></li>
					<li><a class="text-muted" href="#">Random feature</a></li>
					<li><a class="text-muted" href="#">Team feature</a></li>
					<li><a class="text-muted" href="#">Stuff for developers</a></li>
					<li><a class="text-muted" href="#">Another one</a></li>
					<li><a class="text-muted" href="#">Last time</a></li>
				  </ul>
				</div>
				<div class="col-6 col-md">
				  <h5>Resources</h5>
				  <ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Resource</a></li>
					<li><a class="text-muted" href="#">Resource name</a></li>
					<li><a class="text-muted" href="#">Another resource</a></li>
					<li><a class="text-muted" href="#">Final resource</a></li>
				  </ul>
				</div>
				<div class="col-6 col-md">
				  <h5>Resources</h5>
				  <ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Business</a></li>
					<li><a class="text-muted" href="#">Education</a></li>
					<li><a class="text-muted" href="#">Government</a></li>
					<li><a class="text-muted" href="#">Gaming</a></li>
				  </ul>
				</div>
				<div class="col-6 col-md">
				  <h5>About</h5>
				  <ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Team</a></li>
					<li><a class="text-muted" href="#">Locations</a></li>
					<li><a class="text-muted" href="#">Privacy</a></li>
					<li><a class="text-muted" href="#">Terms</a></li>
				  </ul>
				</div>
			  </div>
			</footer>
		  <!-- Bootstrap core JavaScript -->
	  <script src="jquery/jquery.min.js"></script>
	  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
