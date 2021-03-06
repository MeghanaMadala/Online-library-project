<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>

<html>
<head><title>My Books</title>
<style>
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

.container{
    display:block;
    font-size:20;
 width:90%; margin:0 auto;
 border-radius: 25px;

}
.schemes {
  font-family: "Consolas";
color:black;
  border-collapse: collapse;
  width: 100%;
}

.schemes td, .schemes th {
  border: 1px solid #ddd;
  padding: 8px;
}

.schemes tr:nth-child(even){background-color: #f2f2f2;}
.schemes tr:nth-child(odd){background-color: #dcdcdc;}

.schemes tr:hover {background-color: #DAA520;}

.schemes th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<?php
$sql = "SELECT books.name,books.author,edition,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE users.user='$_SESSION[login_user]' and issuebook.approve = 'yes' order by issuebook.return ASC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Issue Date</th>
<th>Return Date</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($res))
{
?>
<tr>
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
$sql = "SELECT books.name,books.author,edition,approve,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE users.user='$_SESSION[login_user]' and issuebook.approve = 'Expired' order by issuebook.return ASC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
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
$sql = "SELECT books.name,books.author,edition,approve,issue,issuebook.return FROM users inner join issuebook ON users.user=issuebook.user inner join books ON issuebook.name=books.name AND issuebook.author=books.author WHERE users.user='$_SESSION[login_user]' and issuebook.approve = 'Returned' order by issuebook.return DESC";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0)
{
?>
<table class="schemes">
<tr>
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
<center><a href="homepage.php"><button class="button">Back to Home </button></a></center>
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