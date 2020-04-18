<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<style>
body{
background-image:url('bookborrowback.jpg');
background-repeat:no-repeat;
background-size:cover;
font-family:"Consolas";
}
input[type=text]
{
border-radius: 25px;
  background-color:#FFE4C4;
  padding: 20px;
  width: 200px;
  height: 20px; 
}
.form{
    display:block;
    float: left;
    font-size:20;
   background-color:#FFD700;
  width: 400px;
  border: 5px;
  padding: 50px;
  margin: 20px;
 border-radius: 25px;
}
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<body>
<?php
if(isset($_SESSION['login_user']))
{?>
<center><h2>BORROW BOOKS</h2></center>
<div class="form">
<form action="" method="post" autocomplete="on">
 

<p>Enter Book Name :</p>
 <input type="text" name="name" required=" "> 

<p> Enter Author :</p>
<input type="text" name="author" required=" ">

<table>
<tr><td><input type="submit" class="button" name="submit" value="Submit"></td>
<td><input type="reset" class="button" value="Reset"></td></tr></table>

</form>
</div>
<?php
if(isset($_POST['submit']))
{
if(isset($_SESSION['login_user']))
{
mysqli_query($db,"INSERT INTO `issuebook` VALUES ('$_SESSION[login_user]','$_POST[name]','$_POST[author]',' ',' ',' ',' ');");
?>
<script type="text/javascript">
window.location="userrequest.php"
</script>
}
else
{
?>
<script type="text/javascript">
alert("You need to login!");
</script>
<?php
}
}
?>
<?php
}
else
{?>
<center><h2>SORRY!YOU ARE NOT LOGGED IN!</h2></center>
<a href="homepage.html"><button class="button" style="margin:0 auto;">Back to home </button></a>

<?php
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