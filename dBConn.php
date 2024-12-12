
<?php



$connection = mysqli_connect("localhost", "root", "", "hospital_system");


if (!$connection) {
    die("Main Database Connection failed: " . mysqli_connect_error());
}
?>