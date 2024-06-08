<?php
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System||payment Gateway</title>

    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .card {
        width: 400px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 20px;
    }
    .container {
        text-align: center;
    }
</style>

</head>
<body>
  
<div class="card">
    <div class="card-body">
        <div class="container">
            <h1>Make Your Payment</h1>
            <form action="paymentsuccess.php" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $publishableKey?>"
                    data-amount="500"
                    data-name="Pranav"
                    data-description="Project Event Management Description"
                    data-image=""
                    data-currency="inr"
                    data-email="guru@gmail.com">
                </script>
            </form>
        </div>
    </div>
</div>

</body>
</html>