
 
<?php
include("DBConnection.php");
 
$name=$_POST["name"];
$author=$_POST["author"];

 
$query = "DELETE FROM `books` WHERE name='$name' and author='$author'"; 
$result = mysqli_query($db,$query);
 
?>
<script type="text/javascript">
alert("Book successfully deleted!");
window.location="admin.php"
</script>
 
