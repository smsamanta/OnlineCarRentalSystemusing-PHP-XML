<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="bootstrap.min.css">

    <title>Purchase</title>
</head>
<body>
<header>
<nav class="navbar fixed-top navbar-dark bg-dark">
    <a href="index.html" class="navbar-brand mb-0 h1"><img src="images/logo.png" class="img logo" > </a>
	<a href="index.html" class="navbar-brand mb-0 h1">Car Rental Center</a>
    <a href="reservation.php" target="mainFrame" class="btn btn-primary my-2 my-sm-0">Car Reservation</a>
</nav>
</header>
<?php
session_start();
 
// Send email
$to = $_REQUEST['emailAddr'];
$subject = 'Your Car booking order details';
$message = '<h1>Thanks for renting cars from Hertz-UTS, the total cost is $' . $_SESSION["total"] .
            '</h1><h2>Details are as follows:</h2><><br>';

foreach ($_SESSION["cart"] as $id => $item) {
    $message .= 'Model: '.$item["Brand"].'-'.$item['Model'].'-'.$item['Year'];
    $message .= '<br>mileage: ' . $item["Mileage"] . ' kms';
    $message .= '<br>fuel_type: ' . $item['FuelType'];
    $message .= '<br>seats: ' . $item['Seats'];
    $message .= '<br>price_per_day: ' . $item['PricePerDay'];
    $message .= '<br>rent_days: ' . $item['RentalDays'];
    $message .= '<br>description: ' . $item['Description'];
    $message .= '<br><br>';
}


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//// More headers
$headers .= 'From: <student@emailid.com>' . "\r\n";

mail($to, $subject, $message, $headers);
?>
    <div class="container text-center">
        <h1>Sent email successfully.</h1>
        <a href="../product/car_rental_center.html" target="mainFrame" class="btn btn-primary">Back to Home</a>
    </div>

</body>
<?php
session_destroy();
?>