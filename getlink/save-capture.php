<?php

$image =$_POST["image"];
$image = explode(";", $image)[1];
$image =explode("," ,$image)[1];
$image = base64_decode($image);
file_put_contents("uploads/filename.jpeg", $image);
echo "done";


?>