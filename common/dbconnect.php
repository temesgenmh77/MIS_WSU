<?php
	$con = new mysqli("localhost","root","","mis");
	if(!$con){
		echo "Error".$con->error;
	}
?>