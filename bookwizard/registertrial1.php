<?php
session_start(); 
include("DBConnection.php");
?>
<html>
<head>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign Up</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<form method="post">
                                              <div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input name="user" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="password" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input name="npassword" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input name="email" type="text" class="input" pattern="(\w+?@\w+?\x2E.+)" required>
				<br>
				<div class="group">
					<input type="submit" class="button" name="submit" onsubmit="account.html" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					
				</div>
			</div>
			</form>
			
		</div>
	</div>
</div>


<?php

if(isset($_POST['submit']))
{
$count=0;
$sql="SELECT USER FROM `users`";
$res=mysqli_query($db,$sql);


$user=$_POST["user"];
$password=$_POST["password"];
$email=$_POST["email"];


while($row=mysqli_fetch_assoc($res))
{
if($row['user']==$_POST['user'])
{
$count=$count+1;
}
}
if($count==0)
{
mysqli_query($db,"INSERT INTO `users` VALUES ('$user','$password','$email'); ");
$_SESSION['login_user'] = $_POST['user'];

?>
<script type="text/javascript">
alert("Registration successful!");
window.location="homepage.php"
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert("The username already exists!");
</script>
<?php
}
}
?>

</body>
</html>