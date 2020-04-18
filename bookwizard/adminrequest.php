<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Admin Request</title>
<link rel="stylesheet" href="adminrequest.css">
</head>
<body>
<img src="breq.jpg" width="100%" height="300">
<?php
 $sql= "SELECT users.user,books.name,books.author,edition,status FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE issuebook.approve = ''";
$res= mysqli_query($db,$sql); 
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
<th>User</th>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Status</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($res))
{
?>
<tr>
<td><?php echo $row["user"];?> </td>
<td><?php echo $row["name"];?> </td>
<td><?php echo $row["author"];?> </td>
<td><?php echo $row["edition"];?> </td>
<td><?php echo $row["status"];?> </td>
</tr>
<?php
}
}
else
{
echo "No requests found";
}
?>
</table>
<h2><b> Approve books?</b></h2>
<form class="form-inline" method="post">
  <label for="user">User:</label>
  <input type="text"  placeholder="Enter username" name="user">
  <label for="name">Book name:</label>
  <input type="text" placeholder="Enter Book Name" name="name">
 <label for="author">Author:</label>
  <input type="text" placeholder="Enter Author" name="author">
  <button type="submit" name="submit">Submit</button>
</form>
<?php
if(isset($_POST['submit']))
{
$_SESSION['st_name']=$_POST['user'];
$_SESSION['bname']=$_POST['name'];
$_SESSION['bauthor']=$_POST['author'];
?>
<script type="text/javascript">
window.location="approve.php"
<?php
}
?>
</script>
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