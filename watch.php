<?php
 	$conn  = new mysqli('localhost', 'root', '', 'multi_login');
 	?>
 	<html>
 	<head>
 		<meta charset="utf-8"/>
 		<title>video playback</title>
 	</head>
 	<?php
 	if(isset($_GET['id']))
 	{
 		$id=$_GET['id'];
 		$q="SELECT name from videoup where id=$id";
 		$query=mysqli_query($conn,$q);
 		while($row=mysqli_fetch_assoc($query))
 		{
 			$name=$row['name'];
 		};
 		echo "you arw watching".$name."<br/>";
 		echo "<video width='500' height='500' controls><source src='upload/".$name."' type='video/webm'></video>";
 	}
 	else
 	{
 		echo "error/";
 	}
 	?>
 	</body>
 	</html>