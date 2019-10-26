<?php

//register_redirect.php
//Store aadhaar card details of farmers scanned from mobile
$sql = "CREATE TABLE IF NOT EXISTS farmer_scanned_data (
	admin_username varchar(40) PRIMARY KEY,
    uid varchar(40),
	name varchar(40),
    gender varchar(40),  
    yob varchar(40),
    careOf varchar(40),
    village varchar(40),
    post_office varchar(40),
    district varchar(40),
    state varchar(40),
    postal_code varchar(40)
	)";
mysqli_query($conn,$sql);
//Admin registration details which also includes warehouse capacity
$sql = "CREATE TABLE IF NOT EXISTS admin (
	uid varchar(40) PRIMARY KEY,
    gid varchar(40),
	name varchar(40),
    contact varchar(40),  
    state varchar(40),
    district varchar(40),
    taluka varchar(40),
    pin varchar(40),
    username varchar(40),
    password varchar(40),
    capacity varchar(40)
	)";
mysqli_query($conn,$sql);

//index.php
//Table to sell data to other farmers
$sql="CREATE TABLE IF NOT EXISTS sell(
    name varchar(40),
    contact varchar(40),
    location varchar(40),
    crop varchar(40),
    quantity varchar(40),
    price varchar(40),
    available varchar(40),
    transportation varchar(40)
    );";
mysqli_query($conn,$sql);

//otp_redirect
//Stores farmer data recieved from scanner
$farmer_create= "CREATE TABLE IF NOT EXISTS farmer (
	uid varchar(40) PRIMARY KEY,
    name varchar(40),
    gender varchar(40),  
    yob varchar(40),
    careOf varchar(40),
    village varchar(40),
    post_office varchar(40),
    district varchar(40),
    state varchar(40),
    postal_code varchar(40),
    contact varchar(40)
	)";
mysqli_query($conn,$farmer_create);
//Stores data of transaction between farmer and admin
$farmer_transaction_create="CREATE TABLE IF NOT EXISTS farmer_transaction (
	uid varchar(40),
    admin_username varchar(40),  
    crop varchar(40),
    quantity varchar(40),  
    amount varchar(40),
    transaction_date varchar(40),
    transaction_time varchar(40)
	)";
mysqli_query($conn,$farmer_transaction_create);
//Stores data of admin warehouse
$admin_warehouse_create="CREATE TABLE IF NOT EXISTS admin_warehouse (
    admin_username varchar(40),  
    crop varchar(40),
    quantity varchar(40)  
	)";
mysqli_query($conn,$admin_warehouse_create);


?>