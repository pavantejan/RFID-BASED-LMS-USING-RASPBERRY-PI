<?php
include("settings.php");
session_start();

$sid=mysqli_real_escape_string($conn,$_POST['id']);
$sname=mysqli_real_escape_string($conn,$_POST['name']);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT sid , name FROM students where sid in (select rfid from dummy where name='student')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1 ) {

    $row = mysqli_fetch_assoc($result);  
  }
  
if($sid==NULL || $_POST['name']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid' AND name='$sname'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['id'];
    header("location:home.php");
	}
	else
	{
    $msg="Incorrect Details";
	}
}

if($row['sid']==NULL)
{
	header("refresh: 1");
}
else{
  header("refresh: 30");
}
mysqli_close($conn);
?>

<!DOCTYPE >
  <html >
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
          <span class="SubHead">Student Sign In</span>
          <br />
          <br />

          <form method="post" action="">
            <table border="0" cellpadding="4" cellspacing="4" class="table">

              <tr><td colspan="2" align="center" class="msg"><?php echo $msg ?></td></tr>
              
              <tr><td class="labels">Student ID : </td><td><input type="text" name="id" class="fields" value= "<?php echo $row ['sid']; ?>" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
              
              <tr><td class="labels">Name : </td><td><input type="text" name="name" class="fields" value= "<?php echo $row ['name']; ?>" size="25" placeholder=" Name " required="required" /></td></tr>
              
              <tr><td colspan="2" align="center"><input type="submit" value="Sign In" class="fields" /></td></tr>
            </table>
          </form>

          <br />
          <br />
          <a href="Redirect_into_admin.php" class="link">Admin Sign In</a>
          <br />
          <br />

        </div>
      </div>
    </body>
  </html>