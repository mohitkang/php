<?php
include('connect.php');
//$people=['shawn','shaun','sean'];

// write query for all students
	$sql = 'SELECT * FROM student';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$student = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

    //print_r($student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Database</title>
</head>
<style>	<?php include('css.css')?></style>

<?php  include('header.php');
 ?>


<body>
<br><br><br>
<div class="area">
<button class="button"><a href="add.php">Add data </a></button><br><br><br><br><br>
<button class="button"><a href="table.php">View data </a>   </button><br><br><br><br><br>
<button class="button"><a href="delete.php">delete data </a></button><br><br><br><br><br>
<button class="button"><a href="update.php">update data </a></button><br><br><br><br><br>
</div>
</body>
<?php  include('footer.php');
 ?>
</html>