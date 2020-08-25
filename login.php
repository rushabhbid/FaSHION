<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
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

    if ($_POST["admin-submit"] == "admin-submit") {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];

        //username
        if (empty($_POST["username"])) {
            $_SESSION["e1"] = "Username field should not be empty";
            $_SESSION["c1"] = 0;
        } else {
            $_SESSION["e1"] = "";
            $_SESSION["c1"] = 1;
        }

        //password
        if (empty($_POST["password"])) {
            $_SESSION["e2"] = "Password field should not be empty";
            $_SESSION["c2"] = 0;
        } else {
            $_SESSION["e2"] = "";
            $_SESSION["c2"] = 1;
        }
    } elseif ($_POST["login-submit"] == "login-submit") {
        $_SESSION["farmer_uid"] = $_POST["farmer_uid"];
        header("Location:sellform.php");
    }

}
    else{
        $_SESSION["username"]="";
        $_SESSION["password"]="";

        $_SESSION["e1"]="";
        $_SESSION["e2"]="";

        $_SESSION["c1"]=0;
        $_SESSION["c2"]=0;

    }


    if($_SESSION["c1"]==1 && $_SESSION["c2"]==1){

        header("Location:login_redirect.php");
    }




?>

<div class="container" style="padding-top: 5%;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Farmer's</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="admin-form-link">Admin</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <!--farmer login form-->
								<form id="login-form" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="farmer_uid" id=farmer_uid" tabindex="1" class="form-control" placeholder="Aadhaar Number." value="" autofocus="" autocomplete="" required>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="login-submit">
											</div>
										</div>
									</div>
                                <!--admin login form-->
								</form>
								<form id="admin-form" action="login.php" method="post" role="form" style="">
                                    <!--username-->
                                    <div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $_SESSION["username"];?>" >
                                        <span class="error"> <?php echo $_SESSION["e1"]; ?></span>
                                    </div>
                                    <!--password-->
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $_SESSION["password"];?>">
                                        <span class="error"> <?php echo $_SESSION["e2"]; ?></span>
                                    </div>
                                    <!--submit-->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-5 col-sm-offset-1">
												<input type="submit" name="admin-submit" id="admin-submit" tabindex="4" class="form-control btn btn-login" value="admin-submit">
											</div>
											<div class="col-sm-3 col-sm-offset-1">
												<a href="register.php">CREATE ACCOUNT?</a>
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

