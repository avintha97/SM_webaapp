<?php

$conn = mysqli_connect("localhost","root","","SM_project_db");

if(!$conn){
    echo "Database Connection Faild";
}