<?php
session_start(); 
include("DBConnection.php");
?>
<head>
<title>Account</title>
<style>
.btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
position: absolute;
top: 10px;
right: 10px;
}
.cart {
  border-color: #ff9800;
  color: orange;
}
.cart:hover {
  background: #ff9800;
  color: white;
}
.button {
  border-radius: 4px;
  background-color:Aquamarine ;
  border: none;
color:white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  cursor: pointer;
  margin: 5px;
}
.button:hover {
  background-color: #dc143c;}

</style>
</head>
<body style="font-family:Comic Sans MS;background-color:brown">
<img src="bookwizard.jpg" width="100%" height="250">
<?php
if(isset($_SESSION['login_user']))
{?>
<center style="font-size:100%;">

<table align="center">
<tr><td><a href="books.php"><img src="mybooks.jpg" width="500" height="300"></a></td>
<td><a href="http://localhost/bookwizard/bookborrow.php"><img src="bookborrow.jpg" width="500" height="300"></a></td></tr>
<tr><td><a href="bookreturn.php"><img src="bookreturn.jpg" width="500" height="300"></a></td>
<td><a href="fine.php"><img src="fine.jpg" width="500" height="300"></a></td></tr>
</table>
<?php
}
else
{?>
<center><h2>SORRY!YOU ARE NOT LOGGED IN!</h2></center>
<a href="homepage.html"><button class="button" style="magin:0 auto;">Back to home </button></a>

<?php
}
?>
<button class="btn cart" onclick="location.href='logout.php'">LOGOUT>></button> 
</body>
</html>