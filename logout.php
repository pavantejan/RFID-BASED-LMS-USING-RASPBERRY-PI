<?php
include("settings.php");
session_start();
$rfid=$_SESSION['sid'];
$sql= mysqli_query($conn,"DELETE FROM dummy");
unset($_SESSION['sid']);
unset($_SESSION['sname']);
session_destroy();
header("location:index.php");
?>