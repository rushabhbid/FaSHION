<!DOCTYPE html>
<html>
<head>
	<title>FaSHION</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/bar.js"></script>
    <script type="text/javascript" src="js/pie.js"></script>
    <script type="text/javascript" src="js/line.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
<br>
<form action="" method="POST">
    State:    
    <select name="state">
      <option value="Maharashtra">Maharashtra</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Rajastan">Rajastan</option>
    </select><br>
  District:   
    <select name="District">
      <option value="AHMEDNAGAR">AHMEDNAGAR</option>
      <option value="AKOLA">AKOLA</option>
      <option value="BEED">BEED</option>
      <option value="AHMADABAD">AHMADABAD</option>
      <option value="AMRELI">AMRELI</option>
      <option value="ANAND">ANAND</option>
      <option value="AJMER">AJMER</option>
      <option value="ALWAR">ALWAR</option>
      <option value="BANSWARA">BANSWARA</option>      
    </select><br>
  Crop:   
    <select name="Crop">
      <option value="Rice">Rice</option>
      <option value="Urad">Urad</option>
      <option value="Bajra">Bajra</option>
      <option value="Wheat">Wheat</option>
      <option value="Banana">Banana</option>
      <option value="Onion">Onion</option>
      <option value="Potato">Potato</option>
      <option value="Jowar">Jowar</option>      
    </select><br>

    <input type="submit" value="Submit">
</form>

<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
  <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
        <div id="chart-container" >
      <canvas id="mycanvas"></canvas>
    </div>
  </div>
    <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
        <div id="chart-container" >
      <canvas id="mycanvas1"></canvas>
    </div>
  </div>
</div>

<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
  <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
        <div id="chart-container" >
      <canvas id="mycanvas2"></canvas>
    </div>
    <br><br><br><br><br><br>.
  </div>
</div>




<?php include 'Footer.php'; ?>

</body>
</html>

