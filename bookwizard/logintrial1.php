<?php
session_start();
include("DBConnection.php");

if(isset($_POST['submit']))
{
$count=0;
$res=mysqli_query($db,"SELECT * FROM `users` WHERE user='$_POST[user]' AND password='$_POST[password]';");
$count=mysqli_num_rows($res);

if($count==0)
{
?>
<script type="text/javascript">
alert("The username and password doesnot match!");
</script>
<?php
}
else
{
$_SESSION['login_user'] = $_POST['user'];

?>
<script type="text/javascript">
window.location="homepage.php"
</script>
<?php
}

}

?>
<html>
<head>
<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
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
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" name="submit"  value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="registertrial1.php">New user?Register now!</a>
				</div>
			</div>
			</form>
			
		</div>
	</div>
</div>
</body>
</html>