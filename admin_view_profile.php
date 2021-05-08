<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);

?>

<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Library Management System</span><br />
<h1><marquee class="clg" direction="right" behavior="alternate" scrollamount="1">R.V.R & J.C COLLEGE OF ENGINEERING</marquee></h1>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Admin Data</span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="labels">Admin ID &nbsp&nbsp&nbsp: </td><td colspan="2" align="center" class="msg"><?php echo $b['aid'] ;?></td></tr>
<tr><td class="labels">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td><td colspan="2" align="center" class="msg"><?php echo $b['name'];?></td></tr>
<tr><td class="labels">Contact No &nbsp&nbsp: </td><td colspan="2" align="center" class="msg"><?php echo $b['ContactNumber'];?></td></tr>
<tr><td class="labels">Gmail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td><td colspan="2" align="center" class="msg"><?php echo $b['email'];?></td></tr>
</table>

<br />
<br />
<a href="admin_home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>