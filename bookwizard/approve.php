<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Approve books</title></head>
<style type="text/css">
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 500px;
	padding: 30px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
	background: #4D4D4D;
	text-transform: uppercase;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #797979;
	font-size: 18px;
	font-weight: 100;
	padding: 20px;
	margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select 
{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	outline: none;
	display: block;
	width: 100%;
	padding: 7px;
	border: none;
	border-bottom: 1px solid #ddd;
	background: transparent;
	margin-bottom: 10px;
	font: 16px Arial, Helvetica, sans-serif;
	height: 45px;
}
.form-style-8 textarea{
	resize:none;
	overflow: hidden;
}
.form-style-8 input[type="button"], 
.form-style-8 input[type="submit"]{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #2CBBBB;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 8px 18px;
	text-decoration: none;
	text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover, 
.form-style-8 input[type="submit"]:hover {
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
}
</style>
</script>
<body>
<h2>APPROVE REQUEST</h2>
<div class="form-style-8">
  <h2>APPROVE BOOKS</h2>
  <form method="post">
    <input type="text" name="approve" placeholder="To Approve, Type Yes " ><br>
    <input type="submit" name="submit" value="Approve" >
  </form>
</div>
<?php
$i= date('Y-m-d');
$r=date('Y-m-d', time() + 86400);
if(isset($_POST['submit']))
{
$result=mysqli_query($db,"SELECT status from books where name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
while($row=mysqli_fetch_assoc($result))
{
if($row['status']=="Available")
{

mysqli_query($db, "UPDATE `issuebook` SET `approve`='yes',`issue`='$i',`return`='$r' WHERE name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
mysqli_query($db,"UPDATE `books` SET `quantity`=quantity-1 WHERE user='$_SESSION[st_name]' and name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
$res=mysqli_query($db,"SELECT quantity from books where name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");

while($row=mysqli_fetch_assoc($res))
{
if($row['quantity']==0)
{
mysqli_query($db,"UPDATE books SET status='Not available' where name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
}
else
{
mysqli_query($db,"UPDATE books SET status='Available' where name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
}
}
?>
<script type="text/javascript">
alert("Update successfully");
window.location="adminrequest.php"
</script>
<?php
}
else
{
echo "The book requested is not available. Request denied!";
mysqli_query($db, "UPDATE `issuebook` SET `approve`='No' WHERE name='$_SESSION[bname]' and author='$_SESSION[bauthor]';");
}
}
}
?>
</body>
</html>
<?php
}
else
{?>
<center><h2>SORRY!YOU ARE NOT LOGGED IN!</h2></center>
<a href="headerpage.html"><button class="button" style="magin:0 auto;">Back to home </button></a>

<?php
}
?>