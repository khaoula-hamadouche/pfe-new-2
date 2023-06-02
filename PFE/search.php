<!DOCTYPE html>
<html>
<head>
	<title>Rechercher un courrier</title>
</head>
<body>

<form method="post">

<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=courrier",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `courrierarrive` WHERE envoyerpar = '$str' OR ref='$str' OR distination='$str' OR sousdistination='$str' OR objet='$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo $row->envoyerpar; ?></td>
				<td><?php echo $row->ref;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>
