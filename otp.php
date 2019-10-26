<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $otp_value=$_POST['otpvalue'];
    if($otp_value==$_SESSION['otp'])
    {
       /* echo "<script>
            alert('OTP is valid');
            window.location.href='http://localhost/fashion/otp_redirect.php';
            </script>";*/
        header("Location:otp_redirect.php");
    }
    else
    {
        echo "<script>
            alert('OTP is invalid');
            window.location.href='otp.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>OTP</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script type="text/javascript" src="Js/Script.js"></script>
</head>
<?php include 'amenu.php'; ?>
<body>
<div class="container text-center" style="padding-top: 15%;padding-bottom: 5%;">
<form action="otp.php" method="post">
<input type="text" name="otpvalue"/>
<input type="submit" value="submit" />
</form>
</div>
</body>

<?php include 'Footer.php'; ?>

</html>