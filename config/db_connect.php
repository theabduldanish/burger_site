<?php 

$conn = mysqli_connect('localhost', 'eddy', 'easypass', 'burgers_db');
if(!$conn){
echo 'connection error...'. mysqli_connect_error();
}