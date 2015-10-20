<?php
$conn = mysqli_connect("localhost","root","","internships");
if(!$conn)
{
	echo "Error : Unable to connect to database, please try again";
}
$ip=$_SERVER['REMOTE_ADDR'];

if($_POST['id'])
{
$id=$_POST['id'];
$id = mysqli_escape_String($conn,$id);
//Verify IP address in Voting_IP table
$ip_sql=mysqli_query($conn,"select ip_add from data where id='$id' and ip_add='$ip'");
$count=mysqli_num_rows($ip_sql);

if($count==0)
{
// Update Vote.
$sql = "update data set upvote=upvote+1,ip_add='$ip' where id='$id'";
mysqli_query($conn,$sql);
// Insert IP address and Message Id in Voting_IP table.

echo "<script>alert('Thanks for the vote');</script>";
}
else
{
echo "<script>alert('You have already voted');</script>";
}
echo "Upvote";

}
?>