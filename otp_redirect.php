<?php
include 'connection.php';

$farmer_uid=$_SESSION["scanned_uid"];
$farmer_name=$_SESSION["scanned_name"];
$farmer_gender=$_SESSION["scanned_gender"];
$farmer_yob=$_SESSION["scanned_yob"];
$farmer_careOf=$_SESSION["scanned_careOf"];
$farmer_village=$_SESSION["scanned_village"];
$farmer_post_office=$_SESSION["scanned_post_office"];
$farmer_district=$_SESSION["scanned_district"];
$farmer_state=$_SESSION["scanned_state"];
$farmer_postal_code=$_SESSION["scanned_postal_code"];
$farmer_contact=$_SESSION["phone"];




$farmer_transaction_admin_username=$_SESSION["username"];
$farmer_transaction_crop=$_SESSION["crop"];
$farmer_transaction_quantity=$_SESSION["quantity"];
$farmer_transaction_amount_recieved=$_SESSION["amount"];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date("h:i:sa");






//check if data already present
$select="SELECT '$farmer_uid' FROM farmer WHERE uid='$farmer_uid'";
$result=mysqli_query($conn,$select);
if (mysqli_num_rows($result) !=1) {
    //insert
    $farmer_insert = "INSERT INTO farmer (uid,name,gender,yob,careOf,village,post_office,district,state,postal_code,contact)
    VALUES('$farmer_uid','$farmer_name','$farmer_gender','$farmer_yob','$farmer_careOf','$farmer_village','$farmer_post_office','$farmer_district','$farmer_state','$farmer_postal_code','$farmer_contact')";
    $result1=mysqli_query($conn,$farmer_insert);
}



//farmer admin transaction
$farmer_transaction_insert = "INSERT INTO farmer_transaction (uid,admin_username,crop,quantity,amount,transaction_date,transaction_time)
VALUES('$farmer_uid','$farmer_transaction_admin_username','$farmer_transaction_crop','$farmer_transaction_quantity','$farmer_transaction_amount_recieved','$date','$time')";
$result2=mysqli_query($conn,$farmer_transaction_insert);


//admin_warehouse
//insert
$admin_warehouse_insert = "INSERT INTO admin_warehouse  (admin_username,crop,quantity)
VALUES('$farmer_transaction_admin_username','$farmer_transaction_crop','$farmer_transaction_quantity')";
$result3=mysqli_query($conn,$admin_warehouse_insert);


//delete temporary scanned data and session variables used for the transaction and go back to add transaction
$delete="DELETE FROM farmer_scanned_data WHERE admin_username='$farmer_transaction_admin_username'";
$result=mysqli_query($conn,$delete);


$_SESSION["scanned_admin_username"] = "";
$_SESSION["scanned_uid"] = "";
$_SESSION["scanned_name"] = "";
$_SESSION["scanned_gender"] = "";
$_SESSION["scanned_yob"] = "";
$_SESSION["scanned_careOf"] = "";
$_SESSION["scanned_village"] = "";
$_SESSION["scanned_post_office"] = "";
$_SESSION["scanned_district"] = "";
$_SESSION["scanned_state"] = "";
$_SESSION["scanned_postal_code"] = "";
$_SESSION["phone"]="";
$_SESSION["crop"]="";
$_SESSION["quantity"]="";
$_SESSION["msp"]="";
$_SESSION["amount"]="";
        echo "<script>
            alert('Transaction complete');
            window.location.href='add.php';
            </script>";



mysqli_close($conn);
?>
