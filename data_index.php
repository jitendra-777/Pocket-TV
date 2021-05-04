<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<a href="videos.php">videos</a><br/>
<form   method="post" enctype="multipart/form-data">
<table border="1" style="padding:10px">
<tr>
<Td>Upload_Video</td></tr>

<Tr><td><input type="file" name="file"/></td></tr>
<tr><td>
<input type="submit" name="submit" value="upload"/>
<!-- <input type="submit" value="Display Video" name="watch"/> -->
</td></tr>
</table>
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
</body>
</html>