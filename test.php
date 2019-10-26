<?php
include 'connection.php';
$quantity_to_be_stored=$_SESSION["quantity"];
$admin=$_SESSION["username"];
$district=$_SESSION["district"];
$taluka=$_SESSION["taluka"];

/*
//total quantity stored in warehouse
$sql="SELECT sum(quantity) as total FROM admin_warehouse WHERE admin_username='$admin'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result))
{
    $warehouse_quantity=$row['total'];
}

//capacity of warehouse
$sql="SELECT capacity FROM admin_warehouse_capacity WHERE admin_username='$admin'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result))
{
    $warehouse_capacity=$row['capacity'];
}



//if warehouse cannot take the data
if(($quantity_to_be_stored+$warehouse_quantity)>$warehouse_capacity){

}
else{
    $_SESSION["valid_warehouse"]=1;

    echo "<script>

            window.location.href='http://localhost/fashion/add.php';
            </script>";
}*/



//Get all taluka names for the district
$sql="SELECT taluka,capacity FROM admin WHERE username!='$admin' and district='$district'";
$result = mysqli_query($conn,$sql);
$capacity_array=array();
$taluka_array=array();
while ($row = mysqli_fetch_assoc($result))
{
    $capacity_array[]=$row['capacity'];
    $taluka_array[]=$row['taluka'];
}


//Valid warehouses
for($i=0;$i<count($capacity_array);$i++){
    if($capacity_array[$i]<$quantity_to_be_stored){
        $taluka_array[$i]="null";
        $capacity_array[$i]="null";
    }
}

/*foreach($capacity_array as $row){
    echo $row."<br>";
}
foreach($taluka_array as $row){
    echo $row."<br>";
}*/

//Valid warehouses with distance and time from current taluka
$distance=array();
for($i=0;$i<count($capacity_array);$i++){
    if($taluka_array[$i]!="null"  and $capacity_array[$i]!="null" ){
        $distance[$i]=calculate_distance($taluka,$taluka_array[$i]);

    }
    else{
        $distance[$i]=99999999999;
    }
}




//calculate min distance and taluka name
if($distance!="null"){
    $min_distance=min($distance);
}
$count=0;
for($i=0;$i<count($capacity_array);$i++){
    if($taluka_array[$i]!="null" and $distance[$i]==$min_distance){
        $min_taluka=$taluka_array[$i];
        $count=1;
    }
}
if($count==0){
    $min_taluka="";
}

//echo $min_distance;


$_SESSION["valid_warehouse"]=0;
$_SESSION["min_taluka"]=$min_taluka;
$_SESSION["min_distance"]=$min_distance;

if($min_distance==99999999999){
    echo "<script>
            alert('All warehouses are full in this district');
            window.location.href='add.php';
            </script>";
}
else{
    echo "<script>
            alert('This warehouse is full. Please take your crops to the warehouse in ".$min_taluka." at a distance of ".$min_distance."kms from the current warehouse');
            window.location.href='add.php';
            </script>";
}



function calculate_distance($origin,$destination){
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );$arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );
    $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyAfJA2iibIYzn6wQvQckp7gxXT_l9TWKg8",false,stream_context_create($arrContextOptions));
    $data = json_decode($api);
    return ((int)$data->rows[0]->elements[0]->distance->value / 1000);
}

mysqli_close($conn);
?>




