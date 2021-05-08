<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}

$sql="select * from dummy where name = ''";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1 ) {
	$row=mysqli_fetch_assoc($result);
}
if($row['rfid']==NULL)
{
	header("refresh: 10");
}

$aid=$_SESSION['aid'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
//$name=$b['name'];
$rfid=$_POST['rfid'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql= mysqli_query($conn,"DELETE FROM dummy WHERE rfid ='$rfid'");
	$row['rfid']=NULL;
	if(mysqli_num_rows(mysqli_query($conn,"select '' from dual where not '$rfid' in (select rfid from books)")))
	{
		$sql=mysqli_query($conn,"INSERT INTO books(rfid,name,author) VALUES('$rfid','$bn','$au')");	
		if($sql)
		{
		$msg="Successfully Added";
		}
	}
	else
	{
		$msg="Book Already Exists";
	}
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

<span class="SubHead">Add Books in Library</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
<tr><td class="labels">RFID No: </td><td><input type="text" name="rfid" placeholder="Enter RFID No" size="25" value= "<?php echo $row ['rfid']; ?>" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Book Name : </td><td><input type="text" name="name" placeholder="Enter Book Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Author Name: </td><td><input type="text" name="auth" placeholder="Enter Author Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="ADD BOOK" class="fields" /></td></tr>
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
