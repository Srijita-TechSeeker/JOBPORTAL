<?php

$conn = mysqli_connect("localhost", "root", "", "job");

if($conn)
{
    echo 'connect to the database';
}

else{

    echo 'not connected';
}
?>