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
</head>
<body>
<?php include 'menu.php';include 'connection.php';include 'tables.php';

?>

<div id="carousel-example" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example" data-slide-to="1"></li>
        <li data-target="#carousel-example" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="item active">
            <a href="#"><img src="Img/rolling1.jpg"  /></a>
            <div class="carousel-caption">
                <h3>FARMING</h3>
            </div>
        </div>
        <div class="item">
            <a href="#"><img src="Img/rolling2.jpg"  /></a>
            <div class="carousel-caption">
                <h3>ANALYSIS</h3>
            </div>
        </div>
        <div class="item">
            <a href="#"><img src="Img/rolling3.jpg"  /></a>
            <div class="carousel-caption">
                <h3>DIGITAL INDIA</h3>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<?php include 'Footer.php'; ?>

</body>
</html>
