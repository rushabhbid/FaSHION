<!DOCTYPE html>
<html>
<head>
	<title>TRANSACTIONS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
 //alert("asfhausi")
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "dd-mm-yyyy",
  autoclose: true
 });
});
    </script>
</head>
<body>
<?php include 'fmenu.php'; ?>
<br><br><br><br><br>
<?php
    include 'connection.php';
    $farmer_uid=$_SESSION["farmer_uid"];

	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tid-$tim-$tiy";
		}
		//$queryCondition .= "WHERE city ='Mumbai'";
		$queryCondition .= "WHERE transaction_date BETWEEN '$fid-$fim-$fiy' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from farmer_transaction " . $queryCondition . " ORDER BY crop desc";
    //$sql = "SELECT * from farmer_transaction WHERE uid='$farmer_uid'";
    $result = mysqli_query($conn,$sql);
?>
<div class="container" style="display: inline-block;margin-left: 8%;">
<form name="frmSearch" method="post" action="">
	 
	 <div class="input-daterange " style="display: inline;">
		<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
	    </div>
		<input type="submit" name="go" value="Search" >

</form>
</div>
<div class="container">  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr style="background-color: orange;">  
                                    <td>Admin Username</td>
                                    <td>Crop</td>
                                    <td>Quantity</td>
                                    <td>Amount</td>
                                    <td>Transaction Date</td>
                                    <td>Transaction Time</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["admin_username"].'</td>  
                                    <td>'.$row["crop"].'</td>  
                                    <td>'.$row["quantity"].'</td>  
                                    <td>'.$row["amount"].'</td>  
                                    <td>'.$row["transaction_date"].'</td>  
                                    <td>'.$row["transaction_time"].'</td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  


<?php include 'Footer.php'; ?>

</body>
</html>

