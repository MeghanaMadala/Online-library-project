<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head>
<link rel="stylesheet" href="fine.css">
</head>
<body>
<?php
if(isset($_SESSION['login_user']))
{
$day=0;
$res=mysqli_query($db,"SELECT * from issuebook where user='$_SESSION[login_user]' and approve='Expired';");
while($row=mysqli_fetch_assoc($res))
{
$d=strtotime($row['return']);
$c= strtotime($row['returned']);
$diff=$c-$d;
if($diff>=0)
{
$day = $day+floor($diff/(60*60*24)); 
$_SESSION['day']=$day;
}
}
echo "<h3>Your fine is:<br>Rs. ".($day*10)." /- </h3>";
}
?>
<form method="post">
<center><h2>PAY FINE</h2></center>
<center><table><br><br>
<tr><td><button type="submit" name="submit" class="button"><?php echo "Pay Rs. ".($day*10)." /- "; ?> </button>
</td></center>
</form>
</div>
<?php
$x=$day*10;
if(isset($_POST['submit']))
{
if($x==0)
{
?>
<script type="text/javascript">
alert("You don't need to pay any fine!");
</script>
<?php
}
else
{
mysqli_query($db,"INSERT INTO `fine` VALUES ('$_SESSION[login_user]','$x');");

?>
<script type="text/javascript">
alert("Fine payed successfully!");
<?php
$_SESSION['day']=0;
?>
window.location="account.php"
</script>
<?php

}
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