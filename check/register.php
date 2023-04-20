<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php 
include('config.php');
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password) VALUES ('$username', '".md5($password)."')";
    $result = mysqli_query($conn,$query);

    if($result){
        echo "Registration successful";
    }
    else{
        echo "Error: ".$query."<br>".mysqli_error($conn);
    }
}


?>