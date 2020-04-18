<?php
session_start(); 
include("DBConnection.php");
if(isset($_SESSION['login_user']))
{
?>
<html>
<head><title>Terms and Conditions</title>
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
</style>
</head>
<body style="font-family:Comic Sans MS;background-color:brown;color:white">
<img src="terms.jpg" width="100%" height="250">
<h2 style="color:yellow">General Conditions</h2>
<p> -> All users of the Library are required to sign in and out on arrival and departure <br>
    ->One account may be legally used by one person only.<br>
    -> Login ID and password must not be disclosed to strangers for the user's safety.<br>
->Mobile phones and personal music players may not be used in the Library<br>
->Conversation should be kept to a minimum to avoid disturbing other users.<br>
->Smoking, eating and drinking are not permitted</p>
<h2 style="color:yellow">Borrowing Conditions</h2>
<p>->Members of the Institute may borrow up to five items for a three-week loan period. Items may be renewed for another two loan periods of three weeks each, provided that the items have not been requested by another user.<br>

->Once an item has reached its renewal limit, it must be returned to the Library and may not be borrowed again by the same user until it has been back in the Library and available to other users for at least one week.<br>

->It is the borrower's responsibility to ensure that items are returned to the Library on time; overdue fines will be charged on late returns or renewals (please see "Renewals and fines" below).<br>

->Persistent failure to adhere to the borrowing policy will result in the permanent withdrawal of borrowing privileges.<br>
->Non-members may use the Library for reference but may not borrow items.</p>
<h2 style="color:yellow">Renewals and fines</h2>
<p>
    ->Borrowed items must be returned or renewed by 5:00pm on the due date.<br>
    ->Renewals may be made in person, by telephone and by email during Library opening hours. Alternatively renewals can be made via the Library catalogue; this requires a borrowing card number and a PIN. Please contact Library staff if a new PIN is required.<br>
    ->Fines for overdue items are charged at a rate of 20/- per item per day.<br>
    ->Fines must be paid before further books are borrowed or existing loans renewed.<br>
    ->Items lost or damaged while on loan will be charged to the borrower at the full replacement cost, together with delivery charges where applicable, plus a 50/- administrative fee.<br>
    ->Items not renewed (if applicable) or returned to the Library after 3 reminder notices have been issued (without an explanation from the borrower) will be deemed to have been lost by the borrower and will be charged as above. A 50/- administration fee will be charged per staff transaction necessitated by the unexplained non-return of Library materials after 3 automated reminders (e.g. e-mails/letters, invoices, ordering replacement copies, etc.)<br>
</p>
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
