<?php
include 'DBConfig.php';

$userID = $_POST['userID'];
$jobID = $_POST['jobID'];

$usersql = "SELECT * FROM `user` WHERE userID = '$userID'";
$userres = mysqli_query($conn, $usersql);
$usernumrow = mysqli_num_rows($userres);

$jobsql = "SELECT * FROM `jobs` WHERE jobID = '$jobID'";
$jobres = mysqli_query($conn, $jobsql);
$jobnumrow = mysqli_num_rows($jobres);

if ($usernumrow == 1 AND $jobnumrow == 1)
{
	$sql = "UPDATE `jobs` SET `jobStatus`= 1, `jobSeekerID` = $userID WHERE `jobID` = $jobID";
	$res = $conn->query($sql);
	header( "refresh:0.5;url=../listJobs.php" );
	echo ("<script>alert('Applied job successfully!')</script>");
} else {
	header( "refresh:0.5;url=../listJobs.php" );
	echo ("<script>alert('Invalid job ID!')</script>");
}
?>
