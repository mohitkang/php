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

//    print_r($student);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style><?php include('css.css')?></style>

</head>
<?php include('header.php')?>


<body>
   <table class="content-table">
    <thead>
 <tr>
 <th>roll</th>
 <th>email</th>
 <th>first name</th>
 <th>last name</th>
 <th>gender</th>
 <th>hostel</th>
 <th>program</th>
 <th>dept</th>
 <th>year</th>
 <th>phone</th>
 

 </tr>
    </thead>
<tbody>

<?php foreach($student as $stud){ ?>
<tr>
<td><?php echo htmlspecialchars($stud['roll']);  ?></td>
<td><?php echo htmlspecialchars($stud['email']);  ?></td>
<td><?php echo htmlspecialchars($stud['fname']);  ?></td>
<td><?php echo htmlspecialchars($stud['lname']);  ?></td>
<td><?php echo htmlspecialchars($stud['gender']);  ?></td>
<td><?php echo htmlspecialchars($stud['hostel']);  ?></td>
<td><?php echo htmlspecialchars($stud['program']);  ?></td>
<td><?php echo htmlspecialchars($stud['dept']);  ?></td>
<td><?php echo htmlspecialchars($stud['year']);  ?></td>
<td><?php echo htmlspecialchars($stud['phone']);  ?></td>


</tr>
    <?php } ?>
</tbody>

   </table>

<br><br>
<button class="button"><a href="index.php">Home </a></button>
</body>
<br><br>
<?php include('footer.php')?>
</html>