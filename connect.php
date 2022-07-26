<?php
// connect to the database
$conn = mysqli_connect('localhost', 'shaun', 'pass1234', 'information');

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

?>