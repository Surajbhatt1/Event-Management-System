<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','obbs');
require('./stripe-php-master/init.php');

// obbs\stripe-php-master\init.php
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
$currency = "INR";  

// Pranav

// $publishableKey= "pk_test_51OuSV5SCwhlHFcjpm85UsMGtH5N4C5jLWVDYTLTMQfBqwdJWJ4ZlLiY73DhKm1srXiByw3EwSTqqQrrQtE3ZWiOf00MQZoT2kg";
// $secretKey="sk_test_51OuSV5SCwhlHFcjpOCxeuB7q1yIlyn9Ff4k7Shadazxn9t9FEyd35AMCdAHAdAsAqC8WgALZGqmh5mQZo0zrNIQG00SdbJ0K4w";



//Suraj 
$publishableKey = "pk_test_51PLdun14WI3rred3VpqwhBQGz8SL53reGt3d23AOYsBc5poeKNludMohSOCKH4xTvuEjP62cqliOuo1qGCu23aL400cBO3Pl2L";
$secretKey="sk_test_51PLdun14WI3rred3IeY2rM27MzOuEjOlUG6q47k7zudzMBfip70d3Ax4RzZ3jfAW0srOdB5qg930sOT96XxsaGyA003AKYFf3s";
 \Stripe\Stripe::setApiKey($secretKey);
// Establish database connection.



try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}




?>