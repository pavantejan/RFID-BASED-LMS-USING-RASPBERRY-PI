<?php
include("settings.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}

$bname=mysqli_real_escape_string($conn,$_POST['bname']);
$author=mysqli_real_escape_string($conn,$_POST['author']);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql= "select * from books where rfid in (select rfid from dummy where name ='book')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result)	;
}
 
$rfid=$row['rfid'];
$sid=$_SESSION['sid'];

//$date=date('Y-m-d H:i:s');

$bn=$_POST['bname'];
if($bn!=NULL)
{
	$p=mysqli_query($conn,"SELECT * FROM books WHERE rfid='$rfid' and name='$bn'");
	if (mysqli_num_rows($p) == 1 )
	{
		$q=mysqli_fetch_array($p);
		$bk=$q['name'];
		$ba=$q['author'];
		$sql=mysqli_query($conn,"INSERT INTO issue(sid,bid,name,author,date) VALUES('$sid','$rfid','$bk','$ba',CURRENT_TIMESTAMP)");
		if($sql)
		{
			$msg="Successfully Issued";
			$sql= mysqli_query($conn,"DELETE FROM dummy WHERE rfid ='$rfid'");
			$row['name']=NULL;
			$row['author']=NULL;
		}
		else
		{
			$msg="Error Please Try Later";
		}
	}
	else{
		$msg="Book is not present in database";
	}
}

if($row['name']==NULL)
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

				<span class="SubHead">Issue Book</span>
				<br />
				<br />
				<form method="post" action="">
					<table border="0" class="table" cellpadding="10" cellspacing="10">
						
						<tr><td></td><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
						
						<tr><td></td><td class="labels">Book Name : </td><td><input type="text" name="bname" class="fields" value= "<?php echo $row ['name']; ?>" size="25" placeholder="Book Name" required="required" /></td></tr>
              
              			<tr><td></td><td class="labels">Author : </td><td><input type="text" name="author" class="fields" value= "<?php echo $row ['author']; ?>" size="25" placeholder="Author" required="required" /></td></tr>

						<tr><td></td><td colspan="2" align="center"><input type="submit" value="ISSUE" class="fields" /></td></tr>
						
						<?php
						$x=mysqli_query($conn,"SELECT * FROM issue where sid='$sid'");
						if( mysqli_num_rows($x) > 0 )
						{?>
							<tr style="background-color:#3996a2"><td>sname</td><td>BookName</td><td>Author</td><td>Time</td></tr>
							<?php
							while($y=mysqli_fetch_array($x))
							{
								echo "<tr style='background-color:#6ac7d4'>";
								echo "<td>".$y['sid']."</td>";
								echo "<td>".$y['name']."</td>";
								echo "<td>".$y['author']."</td>";
								echo "<td>".date("h:ia d-m-Y", strtotime($y['date']))."</td>";
								echo "</tr>";
							}
						}
						?>
					</table>
				</form>
				<br />
				<a href="home.php" class="link">Go Back</a>
				<br />
				<br />

			</div>
		</div>
	</body>
</html>