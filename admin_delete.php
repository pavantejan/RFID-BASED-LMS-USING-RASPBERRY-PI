<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];

$r=$_GET['r'];
mysqli_query($conn,"DELETE FROM books WHERE rfid='$r'");
header("location:admin_manage_books.php");
?>