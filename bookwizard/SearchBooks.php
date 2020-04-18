<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Search Books</title>
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
    
    font-size:20;
   background-color:#FFD700;
  width: 710px;
  border: 5px;
  padding: 50px;
  margin: 90px;
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
</head>
<body>
<center><h1>SEARCH BOOKS</h1></center>
<div class="form">
<form action = "DisplayBooks.php" method="post">

Enter the title of the book to be searched :
<input type="text" name="search" size="48" required>
<br></br>
<input type="submit" name="submit" class="button" value="submit">
<input type="reset" class="button" value="Reset">


</form>
</div>
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
