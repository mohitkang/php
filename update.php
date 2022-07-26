<?php
include('connect.php');
//$people=['shawn','shaun','sean'];
$error='';
$detect=-1;
if(isset($_POST['submit']))
{
    if(empty($_POST['roll_edit'])){
        $error='A roll is required '.'<br />';
    }

   else
  {
   // write query for all students
	$sql = 'SELECT roll FROM student';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$roll = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);


    //print_r($roll);
  foreach($roll as $r)
  {
    //echo $r['roll'];
   if($r['roll']==$_POST['roll_edit'])
   {$detect=$r['roll'];}

  }
  
  if($detect==-1)
   { $error='enter valid roll';}
 else
 { //priting existing data in form 
    
   /* $sql = "SELECT * FROM student WHERE roll = $detect";

    // get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$student = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);
     print_r($student);

*/

//until here the roll is entered and particular record is seen
    //process to delete a record

    $sql = "DELETE FROM student WHERE roll = $detect";

    if(mysqli_query($conn, $sql)){
        header('Location: add.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }



 }
 	// close connection
     mysqli_close($conn);


  }
}
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
    <form  action="update.php" method="POST" >
<h4>enter roll number to be edited</h4>
<input type="text" name="roll_edit">

<div><?php echo $error; ?>     </div>
    
<div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    

</form>

<p>you will be redirected to form page where you can fill the edited data </p>
</body>
<br><br>
<?php include('footer.php')?>
</html>