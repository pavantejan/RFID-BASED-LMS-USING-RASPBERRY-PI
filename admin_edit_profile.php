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

$sn=$b['name'];
$sc=$b['ContactNumber'];
$sg=$b['email'];

$sn1=$_POST["name"];
$sc1=$_POST["ContactNumber"];
$sg1=$_POST["email"];

if(!empty($_POST)) {
    if($_POST['name']!=$sn || $_POST['ContactNumber']!=$sc || $_POST['email']!=$sg)
{
    $sql=mysqli_query($conn,"update students set name = '$sn1',ContactNumber = '$sc1',email = '$sg1' where aid = '$aid'");
    if($sql)
	{
		$msg="Updated Successfully";
        header("refresh: 5");
	}
}
    else{
        $msg="NO UPDATE";
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
<span class="SubHead">Edit Admin Data</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
<tr><td class="labels">Admin ID &nbsp: </td><td colspan="2" align="center" class="msg"><?php echo $b['aid'] ;?></td></tr>
<tr><td class="labels">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td><td><input type="text" name="name" class="fields" value= "<?php echo $b['name']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
<tr><td class="labels">Contact No &nbsp&nbsp&nbsp: </td><td><input type="text" name="ContactNumber" class="fields" value= "<?php echo $b['ContactNumber']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
<tr><td class="labels">Gmail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td><td><input type="text" name="email" class="fields" value= "<?php echo $b['email']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="UPDATE" class="fields" /></td></tr>
</table>
</form>

<br />
<a href="admin_home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>