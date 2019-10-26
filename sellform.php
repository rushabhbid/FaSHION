<!DOCTYPE html>
<html>
<head>
	<title>SEll Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
</head>
<body>


<?php
include 'connection.php';
include 'fmenu.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //form is submitted


    $_SESSION["name"]=$_POST["name"];
    $_SESSION["contact"]=$_POST["contact"];
    $_SESSION["location"]=$_POST["location"];
    $_SESSION["crop"]=$_POST["crop"];
    $_SESSION["quantity"]=$_POST["quantity"];
    $_SESSION["price"]=$_POST["price"];
    $_SESSION["available"]=$_POST["available"];
    $_SESSION["transportation"]=$_POST["transportation"];


    //name
    if(empty($_POST["name"]))
    {
        $_SESSION["e1"]="Name field should not be empty";
        $_SESSION["c1"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["name"])){
            $_SESSION["e1"]="Enter valid name";
            $_SESSION["c1"]=0;
        }
        else{
            $_SESSION["e1"]="";
            $_SESSION["c1"]=1;
        }
    }

    //contact
    if(empty($_POST["contact"]))
    {
        $_SESSION["e2"]="Contact field should not be empty";
        $_SESSION["c2"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{8,10}$/",$_POST["contact"])){
            $_SESSION["e2"]="Enter valid contact number";
            $_SESSION["c2"]=0;
        }
        else{
            $_SESSION["e2"]="";
            $_SESSION["c2"]=1;
        }
    }

    //location
    if(empty($_POST["location"]))
    {
        $_SESSION["e3"]="Location field should not be empty";
        $_SESSION["c3"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["location"])){
            $_SESSION["e3"]="Enter valid location";
            $_SESSION["c3"]=0;
        }
        else{
            $_SESSION["e3"]="";
            $_SESSION["c3"]=1;
        }
    }

    //crop
    if(empty($_POST["crop"]))
    {
        $_SESSION["e4"]="Crop field should not be empty";
        $_SESSION["c4"]=0;
    }
    else
    {
        if(!preg_match("/^[ a-zA-Z]{3,30}$/",$_POST["crop"])){
            $_SESSION["e4"]="Enter valid crop";
            $_SESSION["c4"]=0;
        }
        else{
            $_SESSION["e4"]="";
            $_SESSION["c4"]=1;
        }
    }

    //quantity
    if(empty($_POST["quantity"]))
    {
        $_SESSION["e5"]="Quantity field should not be empty";
        $_SESSION["c5"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{1,20}$/",$_POST["quantity"])){
            $_SESSION["e5"]="Enter valid quantity";
            $_SESSION["c5"]=0;
        }
        else{
            $_SESSION["e5"]="";
            $_SESSION["c5"]=1;
        }
    }

    //price
    if(empty($_POST["price"]))
    {
        $_SESSION["e6"]="Price field should not be empty";
        $_SESSION["c6"]=0;
    }
    else
    {
        if(!preg_match("/^[0-9]{1,20}$/",$_POST["price"])){
            $_SESSION["e6"]="Enter valid price";
            $_SESSION["c6"]=0;
        }
        else{
            $_SESSION["e6"]="";
            $_SESSION["c6"]=1;
        }
    }

    //available
    if(empty($_POST["available"]))
    {
        $_SESSION["e7"]="Available before field should not be empty";
        $_SESSION["c7"]=0;
    }
    else
    {
        $_SESSION["e7"]="";
        $_SESSION["c7"]=1;

    }



}
else{
    $_SESSION["name"]="";
    $_SESSION["contact"]="";
    $_SESSION["location"]="";
    $_SESSION["crop"]="";
    $_SESSION["quantity"]="";
    $_SESSION["price"]="";
    $_SESSION["available"]="";



    $_SESSION["e1"]="";
    $_SESSION["e2"]="";
    $_SESSION["e3"]="";
    $_SESSION["e4"]="";
    $_SESSION["e5"]="";
    $_SESSION["e6"]="";
    $_SESSION["e7"]="";


    $_SESSION["c1"]=0;
    $_SESSION["c2"]=0;
    $_SESSION["c3"]=0;
    $_SESSION["c4"]=0;
    $_SESSION["c5"]=0;
    $_SESSION["c6"]=0;
    $_SESSION["c7"]=0;

}


if($_SESSION["c1"]==1 && $_SESSION["c2"]==1 && $_SESSION["c3"]==1 && $_SESSION["c4"]==1 && $_SESSION["c5"]==1 && $_SESSION["c6"]==1 && $_SESSION["c7"]==1 ){
    $name=$_SESSION["name"];
    $contact=$_SESSION["contact"];
    $location=$_SESSION["location"];
    $crop=$_SESSION["crop"];
    $quantity=$_SESSION["quantity"];
    $price=$_SESSION["price"];
    $available=$_SESSION["available"];
    $transportation=$_SESSION["transportation"];
    $connect = mysqli_connect("localhost", "root", "", "fashion");
    //Insert values
    $sql = "INSERT INTO sell (name,contact,location,crop,quantity,price,available,transportation)
    VALUES('$name','$contact','$location','$crop','$quantity','$price','$available','$transportation')";
    $result=mysqli_query($connect,$sql);


    header("Location:farmer_buy.php");
}


?>

<div class="col-md-12 text-center"><h1 id="heading">Login</h1></div>

<div class="container" style="padding-top:3% ;padding-bottom: 10%;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active">Fill All Details </a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="sell-form" action="sellform.php" method="post" role="form" style="display: block;">
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Name:
									</div>
									<div class="form-group col-md-8">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="<?php echo $_SESSION["name"];?>" autofocus="" autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e1"]; ?></span>
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Location:
									</div>
									<div class="form-group col-md-8">
										<input value="<?php echo $_SESSION["location"];?>" type="text" name="location" id="city" tabindex="2" class="form-control" placeholder="City"  autocomplete="" >
                                        <span class="error"> <?php echo $_SESSION["e3"]; ?></span>
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Mobile Number:
									</div>
									<div class="form-group col-md-8">
										<input value="<?php echo $_SESSION["contact"];?>" type="text" name="contact" id="mobile" tabindex="3" class="form-control" placeholder="Mobile"  >
                                        <span class="error"> <?php echo $_SESSION["e2"]; ?></span>
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Select Crop:
									</div>
									<div class="form-group col-md-8">
										<select value="<?php echo $_SESSION["crop"];?>" id="inputCrop" class="form-control" name="crop">
									        <option selected>Choose</option>
                                            <option>Wheat</option>
                                            <option>Rice</option>
                                            <option>Jowar</option>
                                            <option>Bajra</option>
                                            <option>Apple</option>
                                            <option>Banana</option>
									      </select>
                                        <span class="error"> <?php echo $_SESSION["e4"]; ?></span>
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Quantity (tons):
									</div>
									<div class="form-group col-md-8">
										<input value="<?php echo $_SESSION["quantity"];?>" type="text" name="quantity" id="quantity" tabindex="5" class="form-control" placeholder="Quantity">
                                        <span class="error"> <?php echo $_SESSION["e5"]; ?></span>
                                    </div>
								</div>	
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Price (Rs):
									</div>
									<div class="form-group col-md-8">
										<input value="<?php echo $_SESSION["price"];?>" type="text" name="price" id="price" tabindex="5" class="form-control" placeholder="Price" >
                                        <span class="error"> <?php echo $_SESSION["e6"]; ?></span>
                                    </div>
								</div>		
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Available Before:
									</div>
									<div class="form-group col-md-8">
										<input value="<?php echo $_SESSION["available"];?>" type="Date" name="available" id="available" tabindex="6" class="form-control" placeholder="Availabe before" >
                                        <span class="error"> <?php echo $_SESSION["e7"]; ?></span>
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4" style="color: darkgreen;font-weight: bold; " >
											Providing Transportation:
									</div>
									<div class="form-group col-md-8">
										<input  type="radio" name="transportation" value="Yes"> Yes<br>

                                        <input  type="radio" name="transportation" value="No" checked=""> No<br>

                                    </div>
								</div>

									<div class="form-group">
								
									</div>
									<div class="form-group">
										
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="Post-submit" id="Post-submit" tabindex="4" class="form-control btn btn-login" value="POST">
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

