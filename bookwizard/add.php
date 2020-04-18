
<?php
include("DBConnection.php");
 
$name=$_POST["name"];
$author=$_POST["author"];
$edition=$_POST["edition"];
$status=$_POST["status"];
 $quantity=$_POST["quantity"];
$query = "insert into books values('$name','$author','$edition','$status','$quantity')"; 
$result = mysqli_query($db,$query);
 
?>
<script type="text/javascript">
alert("Book successfully added!");
window.location="admin.php"
</script>

 
