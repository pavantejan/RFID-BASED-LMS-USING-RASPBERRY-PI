<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
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
    <a href="admin_view_profile.php" class="Command">View Profile</a> 
    <a href="admin_edit_profile.php" class="Command">Edit Profile</a>  
    <a href="logout.php" class="logout_Command">Logout</a>
<br />
<br />

<span class="SubHead">Welcome <?php echo $name;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10">
    <tr>
    <td><a href="admin_registered_users.php" class="Command">Registered Users : 
    <?php 
        $x=mysqli_query($conn,"SELECT * FROM students");
        $rows=mysqli_num_rows($x);
        echo $rows;
    ?></a></td>
     <td><a href="admin_available_books.php" class="Command">Available Books :
     <?php
        $x=mysqli_query($conn,"SELECT * FROM books where rfid not in (select bid from issue)");
        $rows=mysqli_num_rows($x);
        echo $rows;
     ?></a></td></tr>
    <tr><td><a href="admin_addBooks.php" class="Command">Add Books</a></td> <td><a href="admin_manage_books.php" class="Command">Manage Books</a></td></tr>
    <tr>
    <td><a href="admin_bookRequests.php" class="Command">Books Requests :
    <?php 
        $x=mysqli_query($conn,"SELECT * FROM request");
        $rows=mysqli_num_rows($x);
        echo $rows;
    ?></a></td>
    <td><a href="admin_issue.php" class="Command">Issued Books :
    <?php
        $x=mysqli_query($conn,"SELECT * FROM issue");
        $rows=mysqli_num_rows($x);
        echo $rows;
    ?>
    </a></td></tr>
</table>
<br />
<br />

</div>
</div>
</body>
</html>