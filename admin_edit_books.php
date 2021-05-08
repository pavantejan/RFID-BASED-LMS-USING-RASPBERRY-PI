<?php
include("settings.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$r=$_GET['r'];
$a=mysqli_query($conn,"SELECT * FROM books WHERE rfid='$r'");
$b=mysqli_fetch_array($a);

$srfid=$b['rfid'];
$sn=$b['name'];
$sa=$b['author'];

$srfid1=$_POST["rfid"];
$sn1=$_POST["name"];
$sa1=$_POST["author"];

if(!empty($_POST)) {
    if($_POST['name']!=$sn || $_POST['author']!=$sa || $_POST['rfid']!=$srfid)
{
    $sql=mysqli_query($conn,"update books set rfid ='$srfid1',name = '$sn1',author = '$sa1' where rfid = '$r'");
    if($sql)
	{
		$msg="Updated Successfully";
        header("location:admin_manage_books.php");
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
<span class="SubHead">Edit Book Data</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
<tr><td class="labels">Book ID &nbsp: </td><td><input type="text" name="rfid" class="fields" value= "<?php echo $b['rfid']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
<tr><td class="labels">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td><td><input type="text" name="name" class="fields" value= "<?php echo $b['name']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
<tr><td class="labels">Contact No &nbsp&nbsp&nbsp: </td><td><input type="text" name="author" class="fields" value= "<?php echo $b['author']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>

<tr><td colspan="2" align="center"><input type="submit" value="UPDATE" class="fields" /></td></tr>
</table>
</form>

<br />
<a href="admin_manage_books.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>