<?php
include 'connection.php';

$username=$_SESSION["username"];
$password=$_SESSION["password"];
//Session variables rquired in add.php
$_SESSION["phone"]="";
$_SESSION["crop"]="";
$_SESSION["quantity"]="";
$_SESSION["msp"]="";

$sql = "SELECT uid FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        $data = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $data);
        $result_value = mysqli_fetch_object($result);
        $_SESSION["uid"]=$result_value->uid;
        $_SESSION["gid"]=$result_value->gid;
        $_SESSION["name"]=$result_value->name;
        $_SESSION["contact"]=$result_value->contact;
        $_SESSION["state"]=$result_value->state;
        $_SESSION["district"]=$result_value->district;
        $_SESSION["taluka"]=$result_value->taluka;
        $_SESSION["pin"]=$result_value->pin;
        $_SESSION["username"]=$result_value->username;
        $_SESSION["password"]=$result_value->password;
        $_SESSION["capacity"]=$result_value->capacity;
    }

    header("Location:add.php");

} else {

    session_destroy();
    echo "<script>
            alert('Invalid username or password');
            window.location.href='login.php';
            </script>";
}




mysqli_close($conn);
?>
