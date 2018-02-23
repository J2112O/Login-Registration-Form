<?php
$conn = mysqli_connect("localhost", "root","", "registration");

if (mysqli_connect_errno()) {
	echo "Error while connecting with database ".mysqli_connect_errno();
}


?>