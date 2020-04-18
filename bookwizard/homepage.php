<?php
session_start(); 
?>
<html>
<head><title>Home page</title>
<link rel="stylesheet" href="homepage.css">
<style>
.btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
position: absolute;
top: 10px;
right: 10px;
}
.cart {
  border-color: #ff9800;
  color: orange;
}
.cart:hover {
  background: #ff9800;
  color: white;
}
.button {
  border-radius: 4px;
  background-color:Aquamarine ;
  border: none;
color:white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 100px;
  cursor: pointer;
  margin: 5px;
}
.button:hover {
  background-color: #dc143c;}
</style>
</head>
<body style="font-family:Comic Sans MS;background-color:brown">
<img src="bookwizard.jpg" width="100%" height="250">
<?php
if(isset($_SESSION['login_user']))
{?>
<div class="btn-group">
  
  <a href="books.php"><button>Books Available </button></a>
<a href="userrequest.php"><button>My Requests </button></a>
  <a href="fine.php"><button>Fine </button></a>
  <a href="terms.php"><button>Terms and conditions </button></a>
<a href="SearchBooks.php"><button>Search Books </button></a>

</div>
<marquee bgcolor="yellow","direction="right">GET A MEMBERSHIP TODAY AND AVAIL THOUSANDS OF PREMIUM BOOKS FROM BESTSELLING AUTHORS!!!</marquee>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="book1.jpg" style="width:100%;height:500">
  <div class="text">A READER LIVES A THOUSAND LIVES!.</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="book2.jpg" style="width:100%;height:500">
  <div class="text">Know the right book for you!</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="book3.jpg" style="width:100%;height:500">
  <div class="text">Thousands of volumes to choose from!</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="ab1.jpg" style="width:100%;height:500">
  <div class="text">BOOKS FROM ALL GENRES.</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="ab2.jpg" style="width:100%;height:500">
  <div class="text">NEW BOOK ARRIVALS EVERDAY!</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="ab3.jpg" style="width:100%;height:500">
  <div class="text">EASY RETURN POLICY WITH 2 WEEKS EXTRA TIME FOR PREMIUM USERS!</div>
</div>

</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
 <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<p id="date"></p>
<script>
document.getElementById("date").innerHTML = Date();
</script>
<center style="font-size:100%;">

<table align="center">
<tr><td><a href="mybooks.php"><img src="mybooks.jpg" width="500" height="300"></a></td>
<td><a href="http://localhost/bookwizard/bookborrow.php"><img src="bookborrow.jpg" width="500" height="300"></a></td></tr>
<tr><td><a href="bookreturn.php"><img src="bookreturn.jpg" width="500" height="300"></a></td>
<td><a href="fine.php"><img src="fine.jpg" width="500" height="300"></a></td></tr>
</table>
<?php
}
else
{?>
<center><h2>SORRY!YOU ARE NOT LOGGED IN!</h2></center>
<a href="headerpage.html"><button class="button" style="magin:0 auto;">Back to home </button></a>

<?php
}
?>
<button class="btn cart" onclick="location.href='logout.php'">LOGOUT>></button> 
</body>
</html>