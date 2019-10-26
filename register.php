<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

		<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>

</head>
<body>

<?php
session_start();
include 'menu.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //form is submitted


    $_SESSION["uid"]=$_POST["uid"];
    $_SESSION["gid"]=$_POST["gid"];
    $_SESSION["name"]=$_POST["name"];
    $_SESSION["contact"]=$_POST["contact"];
    $_SESSION["state"]=$_POST["state"];
    $_SESSION["district"]=$_POST["district"];
    $_SESSION["taluka"]=$_POST["taluka"];
    $_SESSION["pin"]=$_POST["pin"];
    $_SESSION["username"]=$_POST["username"];
    $_SESSION["password"]=$_POST["password"];
    $_SESSION["cpassword"]=$_POST["cpassword"];
    $_SESSION["capacity"]=$_POST["capacity"];

    //uid
    if(empty($_POST["uid"]))
    {
        $_SESSION["e1"]="UID field should not be empty";
        $_SESSION["c1"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{12,12}$/",$_POST["uid"])){
            $_SESSION["e1"]="Enter valid 12 digit aadhaar ID";
            $_SESSION["c1"]=0;
        }
        else{
            $_SESSION["e1"]="";
            $_SESSION["c1"]=1;
        }
    }

    //gid
    if(empty($_POST["gid"]))
    {
        $_SESSION["e2"]="GID field should not be empty";
        $_SESSION["c2"]=0;
    }
    else
    {
        $_SESSION["e2"]="";
        $_SESSION["c2"]=1;
    }

    //name
    if(empty($_POST["name"]))
    {
        $_SESSION["e3"]="Name field should not be empty";
        $_SESSION["c3"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{1,30}$/",$_POST["name"])){
            $_SESSION["e3"]="Enter valid name";
            $_SESSION["c3"]=0;
        }
        else{
            $_SESSION["e3"]="";
            $_SESSION["c3"]=1;
        }
    }

    //contact
    if(empty($_POST["contact"]))
    {
        $_SESSION["e4"]="Contact field should not be empty";
        $_SESSION["c4"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{8,10}$/",$_POST["contact"])){
            $_SESSION["e4"]="Enter valid contact";
            $_SESSION["c4"]=0;
        }
        else{
            $_SESSION["e4"]="";
            $_SESSION["c4"]=1;
        }
    }

    //state
    if(empty($_POST["state"]))
    {
        $_SESSION["e5"]="State field should not be empty";
        $_SESSION["c5"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["state"])){
            $_SESSION["e5"]="Enter valid state";
            $_SESSION["c5"]=0;
        }
        else{
            $_SESSION["e5"]="";
            $_SESSION["c5"]=1;
        }
    }

    //district
    if(empty($_POST["district"]))
    {
        $_SESSION["e6"]="District field should not be empty";
        $_SESSION["c6"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["district"])){
            $_SESSION["e6"]="Enter valid district";
            $_SESSION["c6"]=0;
        }
        else{
            $_SESSION["e6"]="";
            $_SESSION["c6"]=1;
        }
    }

    //taluka
    if(empty($_POST["taluka"]))
    {
        $_SESSION["e7"]="Taluka field should not be empty";
        $_SESSION["c7"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["taluka"])){
            $_SESSION["e7"]="Enter valid Taluka";
            $_SESSION["c7"]=0;
        }
        else{
            $_SESSION["e7"]="";
            $_SESSION["c7"]=1;
        }
    }

    //pin
    if(empty($_POST["pin"]))
    {
        $_SESSION["e8"]="Pin Code field should not be empty";
        $_SESSION["c8"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{6,6}$/",$_POST["pin"])){
            $_SESSION["e8"]="Enter valid 6 digit pin code";
            $_SESSION["c8"]=0;
        }
        else{
            $_SESSION["e8"]="";
            $_SESSION["c8"]=1;
        }
    }

    //username
    if(empty($_POST["username"]))
    {
        $_SESSION["e9"]="Username field should not be empty";
        $_SESSION["c9"]=0;
    }
    else
    {
        $_SESSION["e9"]="";
        $_SESSION["c9"]=1;
    }

    //password
    if(empty($_POST["password"]))
    {
        $_SESSION["e10"]="Password field should not be empty";
        $_SESSION["c10"]=0;
    }
    else
    {
        $_SESSION["e10"]="";
        $_SESSION["c10"]=1;
    }


    //cpassword
    if(empty($_POST["cpassword"]))
    {
        $_SESSION["e11"]="This field should not be empty";
        $_SESSION["c11"]=0;
    }
    else
    {
        if($_SESSION["password"]!= $_SESSION["cpassword"]){
            $_SESSION["e11"]="Passwords are not matching";
            $_SESSION["c11"]=0;
        }
        else{
            $_SESSION["e11"]="";
            $_SESSION["c11"]=1;
        }
    }

    //capacity
    if(empty($_POST["capacity"]))
    {
        $_SESSION["e12"]="Warehouse field should not be empty";
        $_SESSION["c12"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{3,6}$/",$_POST["capacity"])){
            $_SESSION["e12"]="Enter valid warehouse capacity in tonnes";
            $_SESSION["c12"]=0;
        }
        else{
            $_SESSION["e12"]="";
            $_SESSION["c12"]=1;
        }
    }


}
else{
    $_SESSION["uid"]="";
    $_SESSION["gid"]="";
    $_SESSION["name"]="";
    $_SESSION["contact"]="";
    $_SESSION["state"]="";
    $_SESSION["district"]="";
    $_SESSION["taluka"]="";
    $_SESSION["pin"]="";
    $_SESSION["username"]="";
    $_SESSION["password"]="";
    $_SESSION["cpassword"]="";
    $_SESSION["capacity"]="";


    $_SESSION["e1"]="";
    $_SESSION["e2"]="";
    $_SESSION["e3"]="";
    $_SESSION["e4"]="";
    $_SESSION["e5"]="";
    $_SESSION["e6"]="";
    $_SESSION["e7"]="";
    $_SESSION["e8"]="";
    $_SESSION["e9"]="";
    $_SESSION["e10"]="";
    $_SESSION["e11"]="";
    $_SESSION["e12"]="";

    $_SESSION["c1"]=0;
    $_SESSION["c2"]=0;
    $_SESSION["c3"]=0;
    $_SESSION["c4"]=0;
    $_SESSION["c5"]=0;
    $_SESSION["c6"]=0;
    $_SESSION["c7"]=0;
    $_SESSION["c8"]=0;
    $_SESSION["c9"]=0;
    $_SESSION["c10"]=0;
    $_SESSION["c11"]=0;
    $_SESSION["c12"]=0;
}


if($_SESSION["c1"]==1 && $_SESSION["c2"]==1 && $_SESSION["c3"]==1 && $_SESSION["c4"]==1 && $_SESSION["c5"]==1 && $_SESSION["c6"]==1 && $_SESSION["c7"]==1 && $_SESSION["c8"]==1 && $_SESSION["c9"]==1 && $_SESSION["c10"]==1 && $_SESSION["c11"]==1){
    header("Location:register_redirect.php");
}


?>



<div class="container" style="padding-top:3% ;padding-bottom: 10%;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active">REGISTER</a> 
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <!--admin register-->
								<form id="login-form" action="register.php" method="post" role="form" style="display: block;">
                                    <!--uid-->
									<div class="form-group">
										<input type="text" name="uid" id="uid" tabindex="1" class="form-control" placeholder="Aadhar Number." value="<?php echo $_SESSION["uid"];?>" autofocus="" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e1"]; ?></span>
                                    </div>
                                    <!--gid-->
									<div class="form-group">
										<input type="text" name="gid" id="gid" tabindex="2" class="form-control" placeholder="Goverment Id." value="<?php echo $_SESSION["gid"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e2"]; ?></span>
                                    </div>
                                    <!--name-->
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" tabindex="3" class="form-control" placeholder="Name" value="<?php echo $_SESSION["name"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e3"]; ?></span>
                                    </div>
                                    <!--contact-->
                                    <div class="form-group">
                                        <input type="text" name="contact" id="contact" tabindex="4" class="form-control" placeholder="Contact" value="<?php echo $_SESSION["contact"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e4"]; ?></span>
                                    </div>
                                    <!--state-->
                                    <div class="form-group">
                                        <input type="text" name="state" id="state" tabindex="5" class="form-control" placeholder="State" value="<?php echo $_SESSION["state"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e5"]; ?></span>
                                    </div>
                                    <!--district-->
                                    <div class="form-group">
                                        <input type="text" name="district" id="district" tabindex="6" class="form-control" placeholder="District" value="<?php echo $_SESSION["district"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e6"]; ?></span>
                                    </div>
                                    <!--taluka-->
                                    <div class="form-group">
                                        <input type="text" name="taluka" id="taluka" tabindex="7" class="form-control" placeholder="Taluka" value="<?php echo $_SESSION["taluka"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e7"]; ?></span>
                                    </div>
                                    <!--pin-->
                                    <div class="form-group">
                                        <input type="text" name="pin" id="pin" tabindex="8" class="form-control" placeholder="Pin Code" value="<?php echo $_SESSION["pin"];?>" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e8"]; ?></span>
                                    </div>
                                    <!--username-->
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="9" class="form-control" placeholder="Username" value="<?php echo $_SESSION["username"];?>">
                                        <span class="error"> <?php echo $_SESSION["e9"]; ?></span>
                                    </div>
                                    <!--password-->
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="10" class="form-control" placeholder="Password" value="<?php echo $_SESSION["password"];?>">
                                        <span class="error"> <?php echo $_SESSION["e10"]; ?></span>
                                    </div>
                                    <!--cpassword-->
									<div class="form-group">
										<input type="password" name="cpassword" id="cpassword" tabindex="11" class="form-control" placeholder="Confirm Password" value="<?php echo $_SESSION["cpassword"];?>">
                                        <span class="error"> <?php echo $_SESSION["e11"]; ?></span>
                                    </div>
                                    <!--capacity-->
                                    <div class="form-group">
                                        <input type="text" name="capacity" id="capacity" tabindex="12" class="form-control" placeholder="Warehouse capacity" value="<?php echo $_SESSION["capacity"];?>">
                                        <span class="error"> <?php echo $_SESSION["e12"]; ?></span>
                                    </div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="Register-submit" id="Register-submit" tabindex="12" class="form-control btn btn-login" value="REGISTER">
											</div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php include 'Footer.php'; ?>
</body>
</html>
