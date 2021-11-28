<?php 
    if (isset($_GET['id'])) {
    	$id = $_GET['id'];

    	$fakeTok = "562random";
        include "php/read-single.php";

        if (mysqli_num_rows($result) > 0) {
        	$user = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD | Check-box and Radio</title>
</head>
<body>
	<form action="php/update.php" method="post">
		<fieldset>
			<legend>Edit:</legend>
			<br />
			<mark>
				<?php if (isset($_GET['ms'])) {
					echo $_GET['ms'];
				} ?>
			</mark>
			<div>
				<label>Name</label>
				<input type="text"
				       name="name"
				       value="<?=$user['name']?>">
			</div><br />

			<input type="text" 
			       name="id" 
			       value="<?=$user['id']?>"
			       hidden>

			<div>
				<label>Gender</label>
				<input type="radio"
				       name="gender"
				       value="Male"
				       <?php echo ($user['gender'] == "Male")?"checked":"" ?>>
				<label>Male</label>

				<input type="radio"
				       name="gender"
				       value="Female"
				       <?php echo ($user['gender'] == "Female")?"checked":"" ?>>
				<label>Female</label>
			</div><br />

			<div>
				<input type="checkbox"
				       name="programmer"
				       <?php echo ($user['programmer'] == "Yes")?"checked":"" ?>>
				<label>Are you a Programmer?</label>    
			</div><br />
			<input type="submit" value="Create">
			<a href="read.php">View</a>
		</fieldset>
	</form>
</body>
</html>

<?php 
	}else {
	    header("Location: read.php");
	    exit;
	} 

}else {
    header("Location: read.php");
    exit;
} 
?>