<?php
include("settings.php");
session_start();

$aid=mysqli_real_escape_string($conn,$_POST['aid']);
$aname=mysqli_real_escape_string($conn,$_POST['name']);

$sql = "SELECT aid , name FROM admin where aid in (select rfid from dummy where name='admin')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) ==1 ) {
	$row = mysqli_fetch_assoc($result);
}

if($aid==NULL || $_POST['name']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid' AND name='$aname'");
	echo mysqli_num_rows($sql);
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:admin_home.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}

if($row['aid']==NULL)
{
	header("refresh: 1");
}
else{
  header("refresh: 30");
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

<span class="SubHead">Admin Sign In</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Admin ID : </td><td><input type="text" name="aid" class="fields" size="25" value= "<?php echo $row ['aid']; ?>" placeholder="Admin ID" required="required" /></td></tr>
<tr><td class="labels">Admin Name : </td><td><input type="text" name="name" class="fields" size="25" value= "<?php echo $row ['name']; ?>" placeholder="Admin Name" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Sign In" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="Redirect_into_index.php" class="link">Main Page</a>
<br />
<br />

</div>
</div>
</body>
</html>