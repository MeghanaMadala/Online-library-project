<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head>
<link rel="stylesheet" href="adminrequest.css">
</head>
<body>
<h2>ISSUE INFO</h3>
<?php

$c=0;
$sql = "SELECT users.user,books.name,books.author,edition,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE issuebook.approve = 'yes' order by issuebook.return ASC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
<th>User</th>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Issue Date</th>
<th>Return Date</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($res))
{
$d=date('Y-m-d');
if($d >= $row['return'])
{
$c= $c + 1;

mysqli_query($db,"UPDATE issuebook SET approve='Expired' where `return`='$row[return]' and approve='yes' limit $c;");
echo $d;
}
?>
<tr>
<td><?php echo $row["user"];?> </td>
<td><?php echo $row["name"];?> </td>
<td><?php echo $row["author"];?> </td>
<td><?php echo $row["edition"];?> </td>
<td><?php echo $row["issue"];?> </td>
<td><?php echo $row["return"];?> </td>
</tr>
<?php
}
}
else
{
echo "No books issued";
}
?>
</table>
<h2>EXPIRED LIST</h2>
<?php

$sql = "SELECT users.user,books.name,books.author,edition,approve,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE issuebook.approve = 'Expired' order by issuebook.return ASC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
<th>User</th>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Approve</th>
<th>Issue Date</th>
<th>Return Date</th>
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
<td><?php echo $row["approve"];?> </td>
<td><?php echo $row["issue"];?> </td>
<td><?php echo $row["return"];?> </td>
</tr>
<?php
}
}
else
{
echo "<br>No books have expired!<br>";
}
?>
</table>

<h2>RETURNED LIST</h2>
<?php
$sql = "SELECT users.user,books.name,books.author,edition,approve,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE issuebook.approve = 'Returned' order by issuebook.return DESC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
<th>User</th>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Approve</th>
<th>Issue Date</th>
<th>Return Date</th>
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
<td><?php echo $row["approve"];?> </td>
<td><?php echo $row["issue"];?> </td>
<td><?php echo $row["return"];?> </td>
</tr>
<?php
}
}
else
{
echo "<br>No books have been returned!<br>";
}
?>
</table>

<center><a href="admin.php"><button class="button">Back to Home </button></a></center>
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
