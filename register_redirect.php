<?php
include 'connection.php';

$uid=$_SESSION["uid"];
$gid=$_SESSION["gid"];
$name=$_SESSION["name"];
$contact=$_SESSION["contact"];
$state=$_SESSION["state"];
$district=$_SESSION["district"];
$taluka=$_SESSION["taluka"];
$pin=$_SESSION["pin"];
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$capacity=$_SESSION["capacity"];
//Session variables rquired in add.php
$_SESSION["phone"]="";
$_SESSION["crop"]="";
$_SESSION["quantity"]="";
$_SESSION["msp"]="";

//Insert values
$sql = "INSERT INTO admin (uid,gid,name,contact,state,district,taluka,pin,username,password,capacity)
VALUES('$uid','$gid','$name','$contact','$state','$district','$taluka','$pin','$username','$password','$capacity')";
$result=mysqli_query($conn,$sql);



if ($result== TRUE) {
    header("Location:add.php");
} else {

    echo "<script>
            alert('Admin for this aadhaar ID is already registered');
            window.location.href='register.php';
            </script>";
}

mysqli_close($conn);
?>
