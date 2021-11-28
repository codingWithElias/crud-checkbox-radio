<?php 
$fakeTok = "562random";
include "php/read.php";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD | Check-box and Radio</title>
	<style>
		table, tr, th, td {
			border: 1px solid #aaa;
			border-collapse: collapse;
			padding: 5px;
		}
		th {background: #eee}
	</style>
</head>
<body>
	<?php if(mysqli_num_rows($result)){ ?>
		<br />
		<mark>
			<?php if (isset($_GET['ms'])) {
				echo $_GET['ms'];
			} ?>
		</mark>
	<table>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Programmer</th>
			<th>Action</th>
		</tr>
		<?php 
            $i = 0;
            while ($users = mysqli_fetch_assoc($result)) {
            $i++;
		 ?>
		<tr>
           <td><?=$i?></td>
           <td><?=$users['name']?></td>
           <td><?=$users['gender']?></td>
           <td><?=$users['programmer']?></td>
           <td>
           	   <a href="update.php?id=<?=$users['id']?>">Edit</a>
           	   <a href="php/delete.php?id=<?=$users['id']?>">Delete</a>
           </td>	
		</tr>
	<?php } ?>
	</table><br />
	<a href="index.php">Create</a>
<?php }else{ ?>
	<h1>Empty!</h1>
	<a href="index.php">Create</a>
<?php } ?>
</body>
</html>