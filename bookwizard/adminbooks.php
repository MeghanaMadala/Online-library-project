<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>

<html>
<head><title>Books</title>
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

<center><h1>BOOKS AVAILABLE</h1></center>
<br>
 
<?php
$query = "SELECT * FROM `books`"; 
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
echo "<center>No books found in the library  </center>" ;
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