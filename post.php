<?php
require_once("dbtools.inc.php");
$link=create_connection();
$name=$_POST["name"];
$gmail=$_POST["gmail"];
switch ($_POST["sex"]) {
    case '1':
        $sex='1';
        break;
    
    case '0':
        $sex='0';
}
$subject=$_POST["subject"];
$content=$_POST["content"];

$sql="INSERT INTO `talk` (`name`,`gmail`,`sex`,`subject`,`content`) 
    VALUES('$name','$gmail','$sex','$subject','$content')";
$result=mysqli_query($link,$sql);


header("location:index.php");
mysqli_free_result($result);
mysqli_close($link);
?>