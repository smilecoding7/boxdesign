<?php

$con=mysqli_connect("localhost:3308","root","","box");


$name=$_POST['username'];
//$email=$_POST['email'];
$password=$_POST['password'];
//$repassword=$_POST['repassword'];
$reg="SELECT `username` FROM `user` WHERE `username`='$name'";

$result=mysqli_query($con,$reg);

$row=mysqli_fetch_array($result);
	if($row['username'] == $name){
		echo "you are  member";
	echo  "<a href='formlogn.php'>logn here</a>" ;
	}else {
echo  "he wi go to insert informatio to data base for example indata.php" ;
$sql="INSERT INTO `user` (`username`,`password`,`email`) VALUES('$name','$password','')";
$qry=mysqli_query($con,$sql);
	}
$reg="SELECT * FROM user ";

$result=mysqli_query($con,$reg);

while($row=mysqli_fetch_array($result)){

	if($row['username'] == $name){
		$id=$row['username'];
 
 echo"<a href='ph.php?username=$id'> go to dashbord</a>";
	}

};	
?>