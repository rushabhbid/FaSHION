<!DOCTYPE html>
<html>
<head>
    <title>PURCHASE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script>
        $(document).ready(function(){
            $('#employee_data').DataTable({
                "bLengthChange": false,
            });
        });
    </script>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "", "fashion");
$query ="SELECT * FROM sell";
$result = mysqli_query($connect, $query);
?>
<?php include 'menu.php'; ?>
<br>

<a href="login.php"><h1 style="text-align: center;color: orange;font:bolder;">Sell Your Crop</h1></a>

<div class="container">

    <br />
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr style="background-color: orange;">
                <td>Name</td>
                <td>Contact</td>
                <td>Location</td>
                <td>Crop</td>
                <td>Quantity (tons)</td>
                <td>Price (Rs)</td>
                <td>Available Before</td>
                <td>Transportation Available</td>
            </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo '  
                               <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["contact"].'</td>  
                                    <td>'.$row["location"].'</td>  
                                    <td>'.$row["crop"].'</td>  
                                    <td>'.$row["quantity"].'</td>  
                                    <td>'.$row["price"].'</td>
                                    <td>'.$row["available"].'</td>
                                    <td>'.$row["transportation"].'</td> 
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

