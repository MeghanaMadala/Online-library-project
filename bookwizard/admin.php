<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Home page</title>
<link rel="stylesheet" href="admin.css">
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
  width: 100px;
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
<div class="btn-group">  
  <a href="adminfine.php"><button>Fine Information</button></a>
  <a href="addbooks.php"><button>Add Books </button></a>
  <a href="adminbooks.php"><button>Books Available </button></a>
 <a href="adminrequest.php"><button>Books Requested </button></a>
 <a href="issueinfo.php"><button>Issue Information </button></a>
  <a href="deletebooks.php"><button>Delete Books </button></a>
</div>
<br><br><br>
<center><a href="userinfo.php"><img src="users.jpg" width="500" height="300"></a></center>

<?php
}
else
{?>
<center><h2>SORRY!YOU ARE NOT LOGGED IN!</h2></center>
<a href="headerpage.html"><button class="button" style="magin:0 auto;">Back to home </button></a>
<?php
}
?>
<button class="btn cart" onclick="location.href='logout.php'">LOGOUT>></button> 
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