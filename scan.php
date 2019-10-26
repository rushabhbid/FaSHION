<?php
include 'connection.php';


$username = $_SESSION["username"];

$quantity_to_be_stored=$_SESSION["quantity"];
$admin=$_SESSION["username"];
$district=$_SESSION["district"];

$sql = "SELECT * FROM farmer_scanned_data WHERE admin_username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) ==1) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        $data = "SELECT * FROM farmer_scanned_data WHERE admin_username='$username'";
        $result = mysqli_query($conn, $data);
        $result_value = mysqli_fetch_object($result);

        $_SESSION["scanned_admin_username"] = $result_value->admin_username;
        $_SESSION["scanned_uid"] = $result_value->uid;
        $_SESSION["scanned_name"] = $result_value->name;
        $_SESSION["scanned_gender"] = $result_value->gender;
        $_SESSION["scanned_yob"] = $result_value->yob;
        $_SESSION["scanned_careOf"] = $result_value->careOf;
        $_SESSION["scanned_village"] = $result_value->village;
        $_SESSION["scanned_post_office"] = $result_value->post_office;
        $_SESSION["scanned_district"] = $result_value->district;
        $_SESSION["scanned_state"] = $result_value->state;
        $_SESSION["scanned_postal_code"] = $result_value->postal_code;
    }
    mysqli_close($conn);
    header("Location:add.php");
}
?>