<?php

$conn = new mysqli('localhost', 'root', '', 'multi_login');
?>
<html >
<head>
	<meta charset="utf-8"/>
	<title>untitled</title>
	</head>
	<body>
		<?php
		$q="SELECT * from videoup";
		$query=mysqli_query($conn,$q);
		while ($row=mysqli_fetch_assoc($query))
		{
			$id=$row['id'];
			$name=$row['name'];
			echo "<a href='watch.php?id=$id'>$name</a>";
		}
		?>
	</body>
	</html>