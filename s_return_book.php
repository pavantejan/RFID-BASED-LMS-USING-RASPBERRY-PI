<?php
include("settings.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];

$r=$_GET['r'];
mysqli_query($conn,"DELETE FROM issue WHERE id='$r'");
header("location:s_return.php");
?>