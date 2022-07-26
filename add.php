<?php


include('connect.php');
//echo 'helloo';
$error=array('email'=>'','program'=>'','gender'=>'','roll'=>'','fname'=>'','lname'=>'','hostel'=>'','dept'=>'','phone'=>'','year'=>'');
$email=$phone=$roll=$fname=$lname='';
if(isset($_POST['submit']))

{

// check email
if(empty($_POST['email'])){
    $error['email']='An email is required '.'<br />';
} 

else{
    
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email']= 'Email must be a valid email address';
        }
    else{
   // echo htmlspecialchars($_POST['email']) . '<br />';
    }
}

 
//check program
if($_POST['program']!='none')
{
//echo ($_POST['program']).'<br/>';
}
else{
    $error['program']='enter your program'.'<br/>';
}

//check gender
if(empty($_POST['gender']))
{$error['gender']='enter the gender';}
else{
//echo ($_POST['gender']);
}

//check roll
if(empty($_POST['roll']))
{$error['roll']='enter the roll number';}
else{
//echo ($_POST['roll']);
$roll = $_POST['roll'];
        
}

//check fname
if(empty($_POST['fname']))
{$error['fname']='enter the First name';}
else{
//echo ($_POST['fname']);
$fname = $_POST['fname'];
        
}


//check lname
if(empty($_POST['lname']))
{$error['lname']='enter the Last name';}
else{
//echo ($_POST['lname']);
$lname = $_POST['lname'];
        
}

//check hostel
if($_POST['hostel']!='none')
{
//echo ($_POST['hostel']).'<br/>';
}
else{
    $error['hostel']='enter your hostel'.'<br/>';
}

//check dept
if($_POST['dept']!='none')
{
//echo ($_POST['dept']).'<br/>';
}
else{
    $error['dept']='enter your depatment'.'<br/>';
}

//check phone
if(empty($_POST['phone']))
{$error['phone']='enter the phone number';}
else{
//echo ($_POST['phone']);
$phone = $_POST['phone'];
        
}

//check year
if(empty($_POST['year']))
{$error['year']='enter your year';}
else{
//echo ($_POST['year']);
}



//redirecting
if(array_filter($error)){
    //echo 'errors in form';
} else {
    //echo 'form is valid';
//    header('Location: index.php');
  

// escape sql chars
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $roll = mysqli_real_escape_string($conn, $_POST['roll']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $hostel = mysqli_real_escape_string($conn, $_POST['hostel']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $program = mysqli_real_escape_string($conn, $_POST['program']);
  $year = mysqli_real_escape_string($conn, $_POST['year']);
  $dept = mysqli_real_escape_string($conn, $_POST['dept']);
  
  // create sql
  $sql = "INSERT INTO student(email,roll,fname,lname,gender,hostel,phone,program,year,dept) VALUES('$email','$roll','$fname','$lname','$gender','$hostel','$phone','$program','$year','$dept')";

  // save to db and check
  if(mysqli_query($conn, $sql)){
      // success
      header('Location: index.php');
  } else {
      echo 'query error: '. mysqli_error($conn);
  }

  
}


}



?>


<!DOCTYPE html>
<html>
    
<?php include('header.php')?>
<style><?php include('css.css')?>
</style>

<body>

<section class="container grey-text">
    <h4 class="center">Enter student details</h4>
    <form class="white" action="add.php" method="POST">
        
     <label>Roll number</label>
    <input type="text" name="roll" value="<?php echo $roll; ?>">
    <div class="red"><?php echo $error['roll']; ?>     </div>
</br>

    
    
    
    
       <label>Your Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
      <div class="red"><?php echo $error['email']; ?>     </div>
      </br>

        <label>First name</label>
        <input type="text" name="fname" value="<?php echo $fname; ?>">
        <div class="red"><?php echo $error['fname']; ?>     </div>
        
    </br>
        
        <label>Last name</label>
        <input type="text" name="lname" value="<?php echo $lname; ?>">
        <div class="red"><?php echo $error['lname']; ?>     </div>
      
        </br>

        <label>Gender  </label><br>
        Male <input value="male"  type="radio" name="gender" id="gender">
        Female <input value="female" type="radio" name="gender" id="gender">
        Others <input value="others" type="radio" name="gender" id="gender">
        <div class="red"><?php echo $error['gender']; ?>     </div>

</br>

        <label>program</label>
        <select name="program" id="program">
    <option value="none" hidden>Select program</option>
    <option value="B.Tech">B.Tech</option>
    <option value="B.Tech+M.Tech">B.Tech+M.Tech(DD)</option>
    <option value="B.Sc">B.Sc</option>
    <option value="M.Tech">M.Tech</option>
    <option value="M.Sc">M.Sc</option>
    <option value="PhD">PhD</option>
    <option value="MBA">MBA</option>


       </select>
       <div class="red"><?php echo $error['program']; ?>     </div>

       </br>

       <label>Hostel</label>
       <select name="hostel" id="hostel"  value="hostel">
    <option value="none" hidden>Select Hostel</option>        
    <option value="H1">H1</option>
    <option value="H2">H2</option>
    <option value="H3">H3</option>
    <option value="H4">H4</option>
    <option value="H5">H5</option>
    <option value="H6">H6</option>
    <option value="H7">H7</option>
    <option value="H8">H8</option>
    <option value="H9">H9</option>
    <option value="H10">H10</option>
    <option value="H11">H11</option>
    <option value="H12">H12</option>
    <option value="H13">H13</option>
    <option value="H14">H14</option>
    <option value="H15">H15</option>
    <option value="H16">H16</option>
    <option value="H17">H17</option>
    <option value="H18">H18</option>
    <option value="TANSA">TANSA</option>

</select>

<div class="red"><?php echo $error['hostel']; ?>     </div>

</br>

<label>Department</label>

<select name="dept" id="dept">
<option value="none" hidden>Select Department</option>            
<option value="aero">Aerospace engg.</option>
<option value="bio">Biosciences and Bio engg.</option>
<option value="chemistry">Chemistry</option>
<option value="chem">Chemical engg.</option>
<option value="civil">Civil engg.</option>
<option value="comp">Computer science and engg.</option>
<option value="earth">Earth science</option>
<option value="elec">Electrical engg.</option>
<option value="energy">Energy science and engg.</option>
<option value="esed">Environmental science and engg.</option>
<option value="hss">Humanities and Social science</option>
<option value="maths">Mathematics</option>
<option value="mech">Mechanical engg.</option>
<option value="mems">Mettalurgical engg and Material science</option>
<option value="phy">Physics</option>

</select>

<div class="red"><?php echo $error['dept']; ?>     </div>

</br>

<label>Phone number</label>
<input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" >
    <div class="red"><?php echo $error['phone']; ?>     </div>
</br>

<label>Year</label><br>
Freshie <input type="radio" name="year" id="year" value="first" >
Sophie <input type="radio" name="year" id="year" value="second" >
Thirdie <input type="radio" name="year" id="year" value="third">
Fourthie <input type="radio" name="year" id="year" value="fourth">
Fifth <input type="radio" name="year" id="year" value="fifth">
<div class="red"><?php echo $error['year']; ?>     </div>


</br>


        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


</body>
<br><br><br>
<?php include('footer.php')?>

</html>