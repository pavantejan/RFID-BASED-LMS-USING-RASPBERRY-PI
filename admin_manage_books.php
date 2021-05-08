<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
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

<span class="SubHead">Manage Books</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr style="background-color:#6fe2f1" ><td>Book RFID</td><td>Book Name</td><td>Book Author</td></tr>
<?php
	$x=mysqli_query($conn,"SELECT * FROM books where rfid not in (select bid from issue)");
	while($y=mysqli_fetch_array($x))
	{
        ?>

		<tr>
        <td align='center' class='msg'><?php echo $y['rfid'];?></td>
		<td align='center' class='msg'><?php echo $y['name'];?></td>
		<td align='center' class='msg'><?php echo $y['author'];?></td>
        <td align='center'><a href="admin_edit_books.php?r=<?php echo $y['rfid'];?>" class="link">EDIT</a></td>
        <td align='center'><a href="admin_delete.php?r=<?php echo $y['rfid'];?>" class="link">DELETE</a></td>
        </tr>
<?php
	}
?>

</table>
</form>
<br />
<br />
<a href="admin_home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>
