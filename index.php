<?php
require './external/Carbon.php';

use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>InternHunt</title>
<meta charset="utf-8">
<meta name="description" content="Internships in India - curated by humans.">
<meta content="website" property="og:type">
<meta content="Curated by humans. Stop wasting your time searching a thousand different sites. We curate all the internships in India and provide them to you in a simple format." property="og:description">
<meta content="Internships in India" property="og:title">
<meta content="" property="og:image">
<meta content="http://internhunt.in/" property="og:url">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="./css/main.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69029327-1', 'auto');
  ga('send', 'pageview');

</script>
<style type="text/css">
.notice::after {
    clear: both;
    content: "";
    display: table;
}
.notice.v-colorset-blue {
    background-color: #44b6f1;
}
.notice {
    line-height: 20px;
    margin: 20px 0 10px;
    min-height: 36px;
    padding: 24px 54px 24px 20px;
    position: relative;
}
.notice--container {
    padding: 0 44px 0 20px;
}
.ama-event-detail--header--heading {
    box-sizing: border-box;
    margin: 0 auto;
    max-width: 960px;
    min-width: 350px;
    padding: 0 10px;
    position: relative;
}
.notice.v-colorset-blue .notice--text {
    color: #f2f2f2;
}
.notice--text {
    display: block;
    float: left;
    font-size: 16px;
    line-height: 24px;
    padding: 6px;
    text-align: left;
}
b, strong {
    font-weight: bold;
}
.btn-no-shadow {
    box-shadow: 0 0 0 rgba(0, 0, 0, 0);
}
.btn-primary-ghost {
    background: transparent none repeat scroll 0 0;
    color: #215f1e;
    transition: background 0.2s ease-in-out 0s, border 0.2s ease-in-out 0s;
}
</style>
</head>
<body>
<?php
$conn = mysqli_connect("localhost","root","","internships");
if(!$conn)
{
	echo "<div class=\"oaerror danger\"><strong>Error :</strong> Unable to connect to database, please try again</div>";
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=442861082492923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
<h1>InternHunt</h1>
<p>The Internship Finder you always wanted, Curated by humans</p>
<div class="alert alert-info" role="alert">
<a href="./#">One place to find all meaningful and worthy Internships.</a>
<div class="fb-like" data-href="http://internhunt.in" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
</div>
<ol class="breadcrumb">
<li>
<a href="http://internhunt.in">Home</a>
</li>
<li>
<a href="./about">About</a>
</li>
</ol>
<?php
$day =  Carbon::now()->day;
$month = Carbon::now()->month;
if($month == 1){
	$month = "January";
}
else if($month == 2){
	$month = "February";
}
else if($month == 3){
	$month = "March";
}
else if($month == 4){
	$month = "April";
}
else if($month == 5){
	$month = "May";
}
else if($month == 6){
	$month = "June";
}
else if($month == 7){
	$month = "July";
}
else if($month == 8){
	$month = "August";
}
else if($month == 9){
	$month = "September";
}
else if($month == 10){
	$month = "October";
}
else if($month == 11){
	$month = "November";
}
else if($month == 12){
	$month = "December";
}
if($day == 2){
	$day = $day."nd";
}
else if($day == 1){
	$day = $day."ST";
}
else{
	$day = $day."TH";
}
?>
<div class="posts--group--header">
<time class="posts--date" datetime="<?php echo Carbon::now(); ?>">
<h4 class="title v-big">
<span>Today</span>
<span class="title--subtext"><?php echo $month; ?> <?php echo $day; ?></span>
</h4>
</time>
</div>
<table class="table table-hover">
<thead>
<tr>
<th>Title & Company</th>
<th style="text-align:center;">Category</th>
<th style="text-align:center;">Place</th>
<th style="text-align:center;">Semester</th>
<th style="text-align:center;">Paid</th>
<th style="text-align:right;">Apply</th>
</tr>
</thead>
<tbody>
<?php
if (isset($_GET['place'])) {
	$place = mysqli_real_escape_string($conn, $_GET['place']);
	if(preg_match("/^[a-zA-Z ]+$/", $place))  {
 	//check company exists
	$check = mysqli_query($conn, "SELECT * FROM data WHERE place='$place' ORDER BY id DESC");
	if (mysqli_num_rows($check)>=1) {
	while($get = mysqli_fetch_assoc($check)){
	$id = $get['id'];
	$title = $get['title'];	
	$company = $get['company'];
	$category = $get['category'];
	$place = $get['place']; 
	$semester = $get['semester'];  
	$paid = $get['paid'];  
	$url = $get['url']; 
	$featured = $get['Featured'];
	$upvote = $get['upvote'];
	if($featured == "yes" || $featured == "YES" || $featured == "Yes"){
							$echo_featured = "class='promoted'";
							$feat = "<p class='promoted-text'>
<i class='fa fa-bullhorn fa-1x'></i>
Featured Internship
</p>";
						}
						else {
							$echo_featured = "";
							$feat = "";
						}
						if($paid == "yes" || $paid == "YES" || $paid == "Yes"){
							$echo_paid = "<i class='fa fa-inr fa-2x icon-green'></i>";
						}
						else {
							$echo_paid ="<i class='fa fa-inr fa-2x icon-grey'></i>";
						}
	 echo "
<tr $echo_featured>
<td>
$feat
<p>$title</p>
<p>
<small>
<a href='index.php?company=$company'>$company</a>
</small>
</p>
<p>
<a class='btn btn-no-shadow btn-primary btn-xs btn-primary-ghost vote' id='$id' name='up' href=''>Upvote</a>
$upvote Points
</p>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?category=$category'>$category</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?place=$place'>$place</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?semester=$semester'>$semester</a>
</td>
<td data-value='0' style='text-align:center; vertical-align: middle;'>
$echo_paid
</td>
<td style='text-align:right; vertical-align: middle;'>
<a target='blank' rel='nofollow' href='$url?ref=internhunt'>
<i class='fa fa-rocket fa-2x icon-orange'></i>
</a>
</td>
</tr>
	 ";
	}
	}
	}
}
else if (isset($_GET['category'])) {
	$category = mysqli_real_escape_string($conn, $_GET['category']);
	if (ctype_alnum($category)) {
 	//check company exists
	$check = mysqli_query($conn, "SELECT * FROM data WHERE category='$category' ORDER BY id DESC");
	if (mysqli_num_rows($check)>=1) {
	while($get = mysqli_fetch_assoc($check)){
	$id = $get['id'];
	$title = $get['title'];	
	$company = $get['company'];
	$category = $get['category'];
	$place = $get['place']; 
	$semester = $get['semester'];  
	$paid = $get['paid'];  
	$url = $get['url']; 
	$featured = $get['Featured'];
	$upvote = $get['upvote'];
	if($featured == "yes" || $featured == "YES" || $featured == "Yes"){
							$echo_featured = "class='promoted'";
							$feat = "<p class='promoted-text'>
<i class='fa fa-bullhorn fa-1x'></i>
Featured Internship
</p>";
						}
						else {
							$echo_featured = "";
							$feat = "";
						}
						if($paid == "yes" || $paid == "YES" || $paid == "Yes"){
							$echo_paid = "<i class='fa fa-inr fa-2x icon-green'></i>";
						}
						else {
							$echo_paid ="<i class='fa fa-inr fa-2x icon-grey'></i>";
						}
	 echo "
<tr $echo_featured>
<td>
$feat
<p>$title</p>
<p>
<small>
<a href='index.php?company=$company'>$company</a>
</small>
</p>
<p>
<a class='btn btn-no-shadow btn-primary btn-xs btn-primary-ghost vote' id='$id' name='up' href=''>Upvote</a>
$upvote Points
</p>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?category=$category'>$category</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?place=$place'>$place</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?semester=$semester'>$semester</a>
</td>
<td data-value='0' style='text-align:center; vertical-align: middle;'>
$echo_paid
</td>
<td style='text-align:right; vertical-align: middle;'>
<a target='blank' rel='nofollow' href='$url?ref=internhunt'>
<i class='fa fa-rocket fa-2x icon-orange'></i>
</a>
</td>
</tr>
	 ";
	}
	}
	}
}
else if (isset($_GET['company'])) {
	$company = mysqli_real_escape_string($conn, $_GET['company']);
	if (ctype_alnum($company)) {
 	//check company exists
	$check = mysqli_query($conn, "SELECT * FROM data WHERE company='$company' ORDER BY id DESC");
	if (mysqli_num_rows($check)>=1) {
	while($get = mysqli_fetch_assoc($check)){
	$id = $get['id'];
	$title = $get['title'];	
	$company = $get['company'];
	$category = $get['category'];
	$place = $get['place']; 
	$semester = $get['semester'];  
	$paid = $get['paid'];  
	$url = $get['url']; 
	$featured = $get['Featured'];
	$upvote = $get['upvote'];
	if($featured == "yes" || $featured == "YES" || $featured == "Yes"){
							$echo_featured = "class='promoted'";
							$feat = "<p class='promoted-text'>
<i class='fa fa-bullhorn fa-1x'></i>
Featured Internship
</p>";
						}
						else {
							$echo_featured = "";
							$feat = "";
						}
						if($paid == "yes" || $paid == "YES" || $paid == "Yes"){
							$echo_paid = "<i class='fa fa-inr fa-2x icon-green'></i>";
						}
						else {
							$echo_paid ="<i class='fa fa-inr fa-2x icon-grey'></i>";
						}
	 echo "
<tr $echo_featured>
<td>
$feat
<p>$title</p>
<p>
<small>
<a href='index.php?company=$company'>$company</a>
</small>
</p>
<p>
<a class='btn btn-no-shadow btn-primary btn-xs btn-primary-ghost vote' id='$id' name='up' href=''>Upvote</a>
$upvote Points
</p>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?category=$category'>$category</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?place=$place'>$place</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?semester=$semester'>$semester</a>
</td>
<td data-value='0' style='text-align:center; vertical-align: middle;'>
$echo_paid
</td>
<td style='text-align:right; vertical-align: middle;'>
<a target='blank' rel='nofollow' href='$url?ref=internhunt'>
<i class='fa fa-rocket fa-2x icon-orange'></i>
</a>
</td>
</tr>
	 ";
	}
	}
	}
}
else {
$getposts = mysqli_query($conn,"SELECT * FROM data ORDER BY upvote DESC") or die(mysql_error());
$posts = mysqli_num_rows($getposts);
if($posts == 0){
	echo " No posts are there bro!";
}
else {
while ($row = mysqli_fetch_array($getposts,MYSQLI_ASSOC)) {
						$id = $row['id'];
						$title = $row['title'];	
						$company = $row['company'];
						$category = $row['category'];
						$place = $row['place']; 
						$semester = $row['semester'];  
						$paid = $row['paid'];  
						$url = $row['url']; 
						$featured = $row['Featured'];
						$upvote = $row['upvote'];
						
						if($featured == "yes" || $featured == "YES" || $featured == "Yes"){
							$echo_featured = "class='promoted'";
							$feat = "<p class='promoted-text'>
<i class='fa fa-bullhorn fa-1x'></i>
Featured Internship
</p>";
						}
						else {
							$echo_featured = "";
							$feat = "";
						}
						if($paid == "yes" || $paid == "YES" || $paid == "Yes"){
							$echo_paid = "<i class='fa fa-inr fa-2x icon-green'></i>";
						}
						else {
							$echo_paid ="<i class='fa fa-inr fa-2x icon-grey'></i>";
						}
	 echo "
<tr $echo_featured>
<td>
$feat
<p>$title</p>
<p>
<small>
<a href='index.php?company=$company'>$company</a>
</small></p>
<p>
<a class='btn btn-no-shadow btn-primary btn-xs btn-primary-ghost vote' id='$id' name='up' href=''>Upvote</a>
$upvote Points
</p>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?category=$category'>$category</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?place=$place'>$place</a>
</td>
<td style='text-align:center; vertical-align: middle;'>
<a href='index.php?semester=$semester'>$semester</a>
</td>
<td data-value='0' style='text-align:center; vertical-align: middle;'>
$echo_paid
</td>
<td style='text-align:right; vertical-align: middle;'>
<a target='blank' rel='nofollow' href='$url?ref=internhunt'>
<i class='fa fa-rocket fa-2x icon-orange'></i>
</a>
</td>
</tr>
	 ";
	 }
}
}
?>

</tbody>
</table>

<table class="tabletwo">
<div id="sidebar">
<div class="module community-bulletin" data-tracker="cb=1">
<div class="related">
<div class="bulletin-title"> Improve Your Skills </div>
<hr>
<div class="spacer">
<div class="bulletin-item-content">
<a class="question-hyperlink" href="http://meta.stackoverflow.com/questions/307513/the-power-of-teams-a-proposed-expansion-of-stack-overflow?cb=1">The Power of Teams: A Proposed Expansion of Stack Overflow</a>
</div>
<br class="cbt">
</div>
</div>
</div>
</div>
<div id="sidebar">
<div class="module community-bulletin" data-tracker="cb=1">
<div class="related">
<div class="bulletin-title"> Other Stuff </div>
<hr>
<div class="spacer">
<div class="bulletin-item-content">
<a class="question-hyperlink" href="http://meta.stackoverflow.com/questions/307513/the-power-of-teams-a-proposed-expansion-of-stack-overflow?cb=1">The Power of Teams: A Proposed Expansion of Stack Overflow</a>
</div>
<br class="cbt">
</div>
</div>
</div>
</div>
</table>
</div>
<script type="text/javascript">
$(function() {
$(".vote").click(function()
{
var id = $(this).attr("id");
var name = $(this).attr("name");
var dataString = 'id='+ id ;
var parent = $(this);

if (name=='up')
{
$.ajax({
type: "POST",
url: "up_vote.php",
data: dataString,
cache: false,

success: function(html)
{
parent.html(html);
}
});
}
return false;
});
});
</script>
<footer class="footer">
<div class="container-footer">
<p class="text-muted">
© 2015 Internhunt.in -
<a href="./terms">Terms and Conditions</a>
-
<a target="_top" href="mailto:rahulkapoorbbps@outlook.com?Subject=Promoted Job">Promote an Internship</a>
-
<a target="_blank" href="https://www.facebook.com/pages/Intern-Hunt/1022256721128835">Fan Page</a>
</p>
</div>
</footer>
</body>
</html>
