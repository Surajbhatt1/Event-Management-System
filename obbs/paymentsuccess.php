<?php

include('includes/dbconnection.php');
try {
    // Your Stripe API request to create a charge
    $charge = \Stripe\Charge::create([
        'amount' => 1000, // Amount in cents
        'currency' => 'usd',
        'source' => 'tok_visa', // Stripe token representing the card
        'description' => 'Example charge',
    ]);
    
    // Handle successful charge
    echo "Payment successful!";
} catch (\Stripe\Exception\InvalidRequestException $e) {
    // Handle specific Stripe exception
    echo "Error: " . $e->getMessage();
    echo "Please refer to Stripe documentation for accepting payments in India.";
} catch (\Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage();
}



// if (strlen($_SESSION['obbsuid']==0)) {
//     header('location:book-services.php');
//     } else{
//       if(isset($_POST['submit']))
//     {
//         $bid=$_GET['bookid'];
//         $uid=$_SESSION['obbsuid'];
//    $bookingfrom=$_POST['bookingfrom'];
//     $bookingto=$_POST['bookingto'];
//    $eventtype=$_POST['eventtype'];
//    $nop=$_POST['nop'];
//    $message=$_POST['message'];
//    $bookingid=mt_rand(100000000, 999999999);
//   $sql="insert into tblbooking(BookingID,ServiceID,UserID,BookingFrom,BookingTo,EventType,Numberofguest,Message)values(:bookingid,:bid,:uid,:bookingfrom,:bookingto,:eventtype,:nop,:message)";
//   $query=$dbh->prepare($sql);
//   $query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
//   $query->bindParam(':bid',$bid,PDO::PARAM_STR);
//   $query->bindParam(':uid',$uid,PDO::PARAM_STR);
//   $query->bindParam(':bookingfrom',$bookingfrom,PDO::PARAM_STR);
//   $query->bindParam(':bookingto',$bookingto,PDO::PARAM_STR);
//   $query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
//   $query->bindParam(':nop',$nop,PDO::PARAM_STR);
//   $query->bindParam(':message',$message,PDO::PARAM_STR);
  
//    $query->execute();
//      $LastInsertId=$dbh->lastInsertId();
//      if ($LastInsertId>0) {
//       echo '<script>alert("Your Booking Request Has Been Send. We Will Contact You Soon")</script>';
//   echo "<script>window.location.href ='services.php'</script>";
//     }
//     else
//       {
//            echo '<script>alert("Something Went Wrong. Please try again")</script>';
//       }
  
//   }
// }
?>

