<?php

include 'con1.php';
$name=$_POST['name'];


$reg="SELECT * FROM `user` WHERE `username`='$name'";

$result=mysqli_query($con,$reg);

$row=mysqli_fetch_array($result);

	if($row['username'] == $_POST['name']){
		$username=$row['username'];
		
		echo "welcome the member";
	echo  "<a href='ph.php?username=$username'>go dashbord</a>" ;

	}else{
		echo"<br>";
		echo"please go to reg";
		
		
	}




?>