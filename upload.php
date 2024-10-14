<?php
if(isset($_POST['submit'])){
    require_once("dbtools.inc.php");
    $link=create_connection();
    $file_name=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder='upload_file/'.$file_name;
    $query=mysqli_query($link,"INSERT INTO `talk` (`images`) VALUES ('$file_name')");
    if(move_uploaded_file($tempname,$folder)){
        echo "<h2>file up upload successfully</h2>";

    }else{
        echo "<h2>don,t upload </h2>";
    }
}
?>