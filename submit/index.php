<?php
$conn = mysqli_connect("localhost","root","","internships");
if(!$conn)
{
	echo "you are fucked";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>InternHunt</title>
<meta charset="utf-8">
<meta content="Internships in India - curated by humans." name="description">
<meta content="Internships, intern" name="keywords">
<meta content="website" property="og:type">
<meta content="Curated by humans. Stop wasting your time searching a thousand different sites. We curate all the internships in India and provide them to you in a simple format. Subscribe to our daily or weekly newsletter for internships direct to your inbox." property="og:description">
<meta content="Internships in India" property="og:title">
<meta content="" property="og:image">
<meta content="http://internhunt.in/" property="og:url">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;
}

.container-footer {
  width: auto;
  max-width: 680px;
  padding: 0 15px;
}
.container-footer .text-muted {
  margin: 20px 0;
}

code {
  font-size: 80%;
}

[class^="fa fa-circle"], [class*=" fa fa-circle"] {
    display: inline-block;
    width: 100%;
}

[class^="fa fa-rocket"], [class*=" fa fa-rocket"] {
    display: inline-block;
    width: 100%;
}

*.icon-orange {color: #ffa500}
*.icon-red {color: red}
*.icon-green {color: green}
*.icon-red {color: grey}

.table {
	width: 70%;
	float:left;
}
.tabletwo {
	width:28%;
	float:right;
}

.table tbody tr.promoted > td {
	background-color: #fcf8e3;	
}

.promoted-text {
	color: #ffa500;
	font-style: italic;
	}
	.posts--group--header {
    margin: 25px 0 15px;
    text-align: center;
}
.posts--group--header {
    text-align: center;
}
.title.v-big {
    font-size: 20px;
    font-weight: 600;
    line-height: 24px;
    margin-bottom: 10px;
    text-transform: uppercase;
}
.title--subtext {
    color: #bbbbbb;
    font-size: 13px;
    font-weight: normal;
    line-height: 13px;
    margin-left: 8px;
}
.title {
    color: black;
    font-size: 18px;
    font-weight: 600;
    line-height: 22px;
    margin: 0 0 3px;
}
#sidebar, .sidebar {
    float: right;
    margin: 0 0 15px;
    overflow: hidden;
    width: 300px;
}
#sidebar .module.community-bulletin {
    background-color: #fff8dc;
    border: 1px solid #e0dcbf;
    color: #444;
    padding: 10px;
}
.module {
    word-wrap: break-word;
}
.module {
    margin-bottom: 1.5em;
}
#sidebar .related, #sidebar .linked {
    font-size: 13px;
}
.related {
    font-size: 12px;
    line-height: 1.3;
}

#sidebar .module.community-bulletin .bulletin-title {
    font-size: 13px;
}
.module.community-bulletin .bulletin-title:first-child {
    margin-top: 0;
}
.module.community-bulletin .bulletin-title {
    color: #777;
    font-weight: normal;
    margin-top: 15px;
}
.module .spacer {
    margin-bottom: 8px;
}

.module.community-bulletin .bulletin-item-type {
    color: #828282;
}
.bulletin-item-type {
    float: left;
    width: 12%;
}
#sidebar .related a, #sidebar .linked a {
    font-size: 13px;
}
.module.community-bulletin .question-hyperlink {
    font-weight: normal;
}
.related a {
    font-size: 12px;
    font-weight: normal;
}
.answer-hyperlink, .question-hyperlink {
    color: #07c;
    line-height: 1.3;
    margin-bottom: 1.2em;
}
.question-hyperlink {
    font-size: 16px;
    font-weight: 400;
}
a {
    color: #07c;
    text-decoration: none;
}
a {
    cursor: pointer;
    text-decoration: none;
}

div.favicon {
    display: inline-block;
}
.bulletin-item-content {
    float: left;
    width: 88%;
}
.cbt {
    clear: both;
}

#sidebar .module.community-bulletin .bulletin-title {
    font-size: 13px;
}
.module.community-bulletin .bulletin-title {
    color: #777;
    font-weight: normal;
    margin-top: 15px;
}
</style>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=442861082492923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
<h2>InternHunt</h2>
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
<li>
<a href="./submit">Submit an Internship</a>
</li>
</ol>
<div style="width:50%;margin-bottom:15px;margin-left:150px;">
<form role="form">
    <div class="form-group">
      <label for="email">Intership Title:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
	<div class="form-group">
	<label for="pwd">Semester: </label>
	<label class="checkbox-inline"><input type="radio" name="sem" value=""> Fall</label>
<label class="checkbox-inline"><input type="radio" name="sem" value=""> Winter</label>
</div>
	<div class="form-group">
	<label for="comment">Why This Internship:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
	</div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
</div>
<footer class="footer">
<div class="container-footer">
<p class="text-muted">
© 2015 Internhunt -
<a href="./terms">Terms and Conditions</a>
-
<a target="_top" href="mailto:.com?Subject=Promoted Job">Promote an Internship</a>
-
<a href="http://facebook.com/internhunt">Fan Page</a>
</p>
</div>
</footer>
</body>
</html>
