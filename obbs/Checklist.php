<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');





if(isset($_POST['submit']))
{

   
if(isset($_POST['submit']))
{


      

      // Fetch other form data
      $inputField = $_POST['inputField'];
   
  
      // Create a SQL query to insert data
      $sql = "INSERT INTO `checklist`(`inputField`) VALUES ('$inputField')";
  
      // Execute the query
      $result = mysqli_query($conn, $sql);
  
      // Check if the query was successful
      if($result){
          $_SESSION['status'] = "Data Register Successful";
          $_SESSION['status_code'] = "Success";
      } else {
          $_SESSION['status'] = "Data Not Registered/Inserted";
          $_SESSION['status_code'] = "Error";
      }
  
      // Redirect to enquiry.php
    //   header('Location: enquiry.php');
      exit();
  }

 

}


?>

<?php include('includes/header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckList</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){        
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });

        // Function to update text field with selected option on form submit
        $("form").submit(function(event) {
            event.preventDefault();
            var selectedOption = $("#checklist").children("option:selected").text();
            $("#selectedOption").val(selectedOption);
        });
    });
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<style> #outputContainer {
            border: 1px solid #ced4da; /* Border style */
            padding: 30px; /* Padding inside the container */
            margin-top: 20px; /* Margin from the top */
            max-height: 900px; /* Maximum height to enable scrolling */
            overflow-y: auto; /* Enable vertical scrolling if content exceeds container height */
            margin-bottom: 172px;
        }

        /* CSS for individual checklist items */
        #outputContainer div {
            margin-bottom: 10px; /* Margin between checklist items */
        }

        /* CSS for the strike-through effect */
        .strikeCheckbox:checked + label {
            text-decoration: line-through; /* Apply strike-through style when checkbox is checked */
        }
</style>

</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>Create Your Checklist</h2>
                <form id="myForm" method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputField" name="inputField" placeholder="Enter text">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Add</button>
                </form>
                <div id="outputContainer" class="mt-3">
                    <!-- Output items will be appended here -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
    <script>



// $(document).ready(function(){
//     // Retrieve checklist items from localStorage on page load
//     var storedItems = localStorage.getItem('checklistItems');
//     if (storedItems) {
//         $('#outputContainer').html(storedItems); // Display stored items
//     }

//     $('#myForm').submit(function(e){
//         e.preventDefault(); // Prevent form submission
        
//         var inputValue = $('#inputField').val().trim(); // Get the trimmed value from input field
        
//         // Check if input value is not empty
//         if (inputValue !== '') {
//             // Append the value to the output container div wrapped in a div element with a checkbox
//             $('#outputContainer').append('<div><input type="checkbox" class="strikeCheckbox">' + inputValue + '</div>');
            
//             // Save updated checklist items to localStorage
//             localStorage.setItem('checklistItems', $('#outputContainer').html());
            
//             // Clear the input field after adding the element
//             $('#inputField').val('');
//         } else {
//             // Show an alert or message indicating that the input cannot be empty
//             alert('Please enter some text.');
//         }
//     });
    

$(document).ready(function(){
    $('#myForm').submit(function(e){
        e.preventDefault(); // Prevent form submission
        
        var inputValue = $('#inputField').val().trim(); // Get the trimmed value from input field
        
        // Check if input value is not empty
        if (inputValue !== '') {
            // Send the data to the PHP script using AJAX
            $.ajax({
                type: 'POST',
                url: 'insert_item.php', // Replace 'insert_item.php' with the correct path to your PHP script
                data: { item: inputValue }, // Data to be sent to the server
                success: function(response) {
                    // Display success or error message returned by the server
                    alert(response);
                },
                error: function(xhr, status, error) {
                    // Display error message if AJAX request fails
                    console.error(xhr.responseText);
                }
            });
            
            // Append the value to the output container div wrapped in a div element with a checkbox
            $('#outputContainer').append('<div><input type="checkbox" class="strikeCheckbox">' + inputValue + '</div>');
            
            // Clear the input field after adding the element
            $('#inputField').val('');
        } else {
            // Show an alert or message indicating that the input cannot be empty
            alert('Please enter some text.');
        }
    });
    


    // Event listener for checkbox clicks
    $(document).on('change', '.strikeCheckbox', function() {
        var $parentDiv = $(this).parent();
        if($(this).is(':checked')) {
            // Apply strike-through style if the checkbox is checked
            $parentDiv.css('text-decoration', 'line-through');
        } else {
            // Remove strike-through style if the checkbox is unchecked
            $parentDiv.css('text-decoration', 'none');
        }
        
        // Update stored checklist items in localStorage
        localStorage.setItem('checklistItems', $('#outputContainer').html());
    });
});


</script>


<script src="js/modernizr.custom.js"></script>
</body>
</html>

<?php

include('includes/footer.php');
?>
