<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="feedbacknou.css">
    <link rel="icon" href="images/pokemon1.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback received</title>
</head>
<body>
<?php include "background.php" ?> 



</body>
</html>




<?php



$conn = new mysqli("localhost","vlapre9_mybase","Sibiu123","vlapre9_mybase");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message =$_REQUEST['message'];

$sql = "INSERT INTO feedback VALUES ('$name','$email','$message')";

if(mysqli_query($conn, $sql)){
    echo '<div class="message">
    <h3>I received your message.Thank you!</h3></div>';
    echo '<div class="info">';
    echo nl2br("<h3>Info submitted:</h3>\nName: $name\nEmail: $email\n "
        . "Message: $message");
    echo '
    <div class="button">
    <a href="index.php" class="button">Go Home</a>
    </div>';
   
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>