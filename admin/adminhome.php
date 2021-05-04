<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style>
	.header {
		background: #F29F2E;
		height:50px;
		padding: 10px;

	}
	button[name=register_btn] {
		background: #003366;
	}
			body
		{
		background-color:lightyellow;
		}
		.profile_info img{
	width: 50px; 
	height: 50px; 
	margin: -200px 0px 0px 1225px;	
}
.profile_info div {
	width: 50px; 
	height: 20px; 
	margin:-85px 0px 0px 1275px;
	font-size: 15px;
}
nav {
  background-color:#F29F2E;
  font-size: 15px;
  height: 60px;
  padding: 8px;
  border-radius: 3px;
}
.uploadcss
{
	margin-top: 40px;
	padding: 10px;
	background-color: white;
}
	</style>
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
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
		<?php endif ?>
</div>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="img/admin_profile.png" >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: black;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="../homepage.php?logout='1'" style="color: black;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>

			</div>
		</div>
<div class="uploadcss">
<a href="videos.php">videos</a>
<form   method="post" enctype="multipart/form-data">
<input type="file" name="file"/>
<input type="submit" name="submit" value="upload"/>
<!-- <input type="submit" value="Display Video" name="watch"/> -->
</form>
<?php
$conn = new mysqli('localhost', 'root', '', 'multi_login');
if(isset($_POST['submit']))
{
	$name=$_FILES['file']['name'];
	$temp=$_FILES['file']['tmp_name'];
	move_uploaded_file($temp,"upload/".$name);
	$q = "INSERT INTO videoup(id,name) VALUES('','$name')";
	if(mysqli_query($conn,$q))
{
	echo"submited to databases";
}
	echo "<br>".$name. "has is_uploaded_file";
}
$conn->close();
?>	
</div>
</body>
</html>