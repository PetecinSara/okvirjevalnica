<?php

$db = mysqli_connect("localhost","root","","okviriv");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>