<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="style2.css"> -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<style type="text/css">
			body
		{
		background-color:gray;
		}
		.profile_info img{
	display: inline-block; 
	width: 30px; 
	height: 30px; 
	margin: -80px 0px 0px 1250px;	
}
.profile_info div {
	/*width: 50px; */
	/*height: 20px; */
	margin:-85px 0px 0px 1300px;
	font-size: 15px;
}
nav {
  background-color:black;
  font-size: 15px;
  height: 70px;
  padding: 3x;
  border-radius: 3px;
}
	</style>
	</head>

<body >
<nav>
  <a href="homepage.php">Home Page</a>
  <a href="videos.php">Upload_Data</a>
  <a href="homepage.php">Home Page</a>
  <a href="videos.php">Upload_Data</a>
</nav>
	<div class="ufile">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="img/user_profile.png" >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<u><strong style="color: lightblue;"><?php echo $_SESSION['user']['username']; ?></strong></u>

					<small>
						<i  style="color: lightblue;" >(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<u><a href="index.php?logout='1'" style="color: blue;">logout</a></u>
					</small>
			</div>
			<?php endif ?>
		</div>
		<div class="container">
<div class="row">

 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "multi_login";
	
 $con=new mysqli($servername, $username, $password, $dbname);
 $query="SELECT * FROM `videoup`";
 $run=mysqli_query($con,$query);
 while($row=mysqli_fetch_assoc($run))
 {
 ?>
 <div class="col-sm-3 " bgcolor="black">	
 <video width="200" height="280" controls>
	<source src="upload/<?php echo $row['name'] ?>" type="video/mp4"></video>
</div>


<?php
 
   
 }  
?>
</div>
</div>
</body>
</html>