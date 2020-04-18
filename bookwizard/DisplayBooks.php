<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Search Results</title>
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
.schemes th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.schemes tr:hover {background-color: #DAA520;}
</style>
</head>
<body>
<center><h2>SEARCH RESULTS</h2></center>
<br>
<?php
$search = $_POST["search"];
 
$query = "select * from books where name like '%$search%'";

$result = mysqli_query($db,$query);
 
if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)
 
{
?>
 
<table class="schemes">
 
<tr>
<th> Name </th>
<th> Author </th>
<th> Edition </th>
<th> Status </th>
<th> Quantity </th>
</tr>
 
<?php while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row["name"];?> </td>
<td><?php echo $row["author"];?> </td>
<td><?php echo $row["edition"];?> </td>
<td><?php echo $row["status"];?> </td>
<td><?php echo $row["quantity"];?> </td>
</tr>
<?php
}
}
else
echo "<center>No books found in the library by the name $search </center>" ;
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