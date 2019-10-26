<?php
include 'connection.php';

$username = $_SESSION["username"];
$capacity=$_SESSION["capacity"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRANSACTION</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
</head>
<body>
<?php
 include 'amenu.php';

if($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $_SESSION["phone"]=$_POST["phone"];
    $_SESSION["crop"]=$_POST["crop"];
    $_SESSION["quantity"]=$_POST["quantity"];
    $_SESSION["msp"]=$_POST["msp"];
    $_SESSION["amount"]=$_POST["quantity"]*$_POST["msp"];

    if ($_POST["scan"] == "scan") {
    $_SESSION["phone"]=$_POST["phone"];
    $_SESSION["msp"]=$_POST["msp"];
    $_SESSION["quantity"]=$_POST["quantity"];

        $quantity_to_be_stored=$_SESSION["quantity"];
        $admin=$_SESSION["username"];
        $district=$_SESSION["district"];

        //total quantity stored in warehouse
        $sql="SELECT sum(quantity) as total FROM admin_warehouse WHERE admin_username='$admin'";
        $result = mysqli_query($conn,$sql);
        if($result){
            while ($row = mysqli_fetch_assoc($result))
            {
                $warehouse_quantity=$row['total'];
            }
        }
        else{
            $warehouse_quantity=0;
        }

        if(($quantity_to_be_stored+$warehouse_quantity)>$capacity){

            header("Location:test.php");
        }
        else{
            $_SESSION["valid_warehouse"]=1;
            $sql = "SELECT * FROM farmer_scanned_data WHERE admin_username='$username'";
            $result = mysqli_query($conn, $sql);
            if($result){
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
                }
                else{
                    echo "<script>
                    alert('Scan the aadhaar card first');
                    window.location.href='add.php';
                    </script>";
                }
            }
            else{
                echo "<script>
                alert('Scan the aadhaar card first');
                window.location.href='add.php';
                </script>";
            }

        }

    }
        elseif($_POST["submit"]=="submit"){


            if($_SESSION["valid_warehouse"]==1){
                header("Location:process.php");
            }
            else{
                echo "<script>
                alert('Scan the aadhaar card first');
                window.location.href='add.php';
                </script>";
            }

        }

        elseif($_POST["cancel"]=="cancel"){
                $delete="DELETE FROM farmer_scanned_data WHERE admin_username='$username'";
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
                $_SESSION["valid_warehouse"]=0;
                header("Location:add.php");
            }




}

  ?>

<div class="container" style="padding-top: 8%;padding-bottom: 5%;">
	<form action="add.php" method="post">
	<div class="form-row">
		<div class="form-group col-md-6">
      <label for="inputCrop">Select Crop</label>
      <select id="inputCrop" class="form-control" name="crop" required="">
        <option selected>Choose...</option>
        <option>Wheat</option>
        <option>Rice</option>
          <option>Jowar</option>
          <option>Bajra</option>
          <option>Apple</option>
          <option>Banana</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputMsp">MSP</label>
      <input type="text" class="form-control" id="inputMsp" readonly="">
    </div>
	</div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputUid">Aadhar No.</label>
      <input type="text" class="form-control" id="inputUid"  readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_uid"];}else{echo "";} ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName"  readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_name"];}else{echo "";} ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPhone">Phone No.</label>
      <input type="text" class="form-control" id="inputPhone" name="phone"  value="<?php echo $_SESSION["phone"];?>"required>
    </div>
  </div>



        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputCity">State</label>
                <input type="text" class="form-control" id="inputState" readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_state"];}else{echo "";} ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">District</label>
                <input type="text" class="form-control" id="inputDistrict" readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_district"];}else{echo "";} ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Village</label>
                <input type="text" class="form-control" id="inputVillage" readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_village"];}else{echo "";} ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Postal Code</label>
                <input type="text" class="form-control" id="inputPostalCode" readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["scan"]=="scan"){echo $_SESSION["scanned_postal_code"];}else{echo "";} ?>">
            </div>
        </div>




  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPrice">Total Price (Rs)</label>
      <input type="text" name="amount" class="form-control" id="inputPrice" readonly="" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_SESSION["amount"];}else{echo "";} ?>">
    </div>
    <div class="col-md-1">
    	<h1>=</h1>
    </div>
    <div class="form-group col-md-3">
      <label for="inputWeight">Weight (tons)</label>
      <input type="text" name="quantity" class="form-control" id="inputWeight" required value="<?php echo $_SESSION["quantity"];?>">
    </div>
    <div class="col-md-1">
    	<h1>*</h1>
    </div>
    <div class="form-group col-md-3">
      <label for="inputMsp">MSP (Rs per ton)</label>
      <input type="text" class="form-control" name="msp" id="inputMsp" required value="<?php echo $_SESSION["msp"]; ?>">
    </div>
  </div>
  <div class="form-row">
  	<div class="form-group col-md-3">
  <button type="submit" class="btn btn-primary" name="scan" value="scan" style="width:100%;" >Upload Aadhaar details</button>
</div>
  <div class="form-group col-md-3">
  	<button type="submit" class="btn btn-primary" name="submit" value="submit" style="width:100%;">Submit</button>
  </div>
  <div class="form-group col-md-3">
  	<button type="button" class="btn btn-primary" style="width:100%;">Print</button>
  </div>
      <div class="form-group col-md-3">
          <button type="submit" name="cancel" value="cancel" class="btn btn-primary" style="width:100%;">Cancel transaction</button>
      </div>
</form>

</div>




<?php include 'Footer.php'; ?>

</body>
</html>

