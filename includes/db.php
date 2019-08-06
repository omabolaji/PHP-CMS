<?php

$connection = mysqli_connect('localhost','root','','cms');

if(!$connection) {
    die("FAILED!" . mysqli_error($connection));
}


?>