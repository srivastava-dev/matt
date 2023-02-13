<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="<?php echo base_url().'/style/style.css';?>">

	<title>Admin</title>
    <style>
        body {
    margin: 0;
   
    color: #a08651 !important;
	background: #f0eade;
	overflow-x: hidden;
    background-color: var(--bs-body-bg);
 
}
.btn{
  background-color: #a08651 !important;
  color: #ffffff  !important;
  border: none  !important;
  border-radius: 4px  !important;
  padding: 10px 20px  !important;
  font-size: 16px  !important;
  cursor: pointer  !important;
}
.head{
color:#2c6a6c !important;
}
table{
    color:#2c6a6c !important;
}
        </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<!-- <i class='bx bxs-smile'></i> -->
			<img src="<?php echo base_url().'/img/logo.png';?>" class="logo" />
			<!-- <span class="text">Admin</span> -->
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="<?php echo base_url().'/dashboard';?>">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li class="active">
				<a href="<?php echo base_url().'/add';?>">
					<i class='bx bxs-cog' ></i>
					<span class="text">Group name</span>
				</a>
			</li>
		
			<li>
				<a href="<?php echo base_url().'/logout';?>" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

<?php // var_dump($result);?>

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> -->
				</div>
			</form>
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a> -->
			<a href="#" class="profile">
				<img src="<?php echo base_url().'/img/people.png';?>">
			</a>
		</nav>