<?php
include("settings.php");
session_start();
mysqli_query($conn,"DELETE FROM dummy");
header("location:admin.php");
?>