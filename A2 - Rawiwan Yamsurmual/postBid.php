<!DOCTYPE html>
<html>
<head>
<title>Post message</title>
</head>
<body>

<h1>Start the Bid </h1>
<form name="Hiking" action="buyer_process.php" method="post">
	<p>IDnumber: <input type="text" placeholder ="XXX-000:XX" name="id" /></p>
	<p>Proposed Price: <input type="text" placeholder ="AUD $" name="pPrice" /></p>
	
	<p>And your contact details</p>
	
    <p>First Name: <input type="text" placeholder ="Add" name="firstName" /></p>
    <p>Last Name: <input type="text" placeholder ="Add" name="lastName" /></p>
	<p>Phone No.: <input type="text" placeholder ="+61" name="phone" /></p>
	<p>Email: <input type="text" placeholder ="Add Email" name="bEmail" /></p>

	
    <p><input type="reset" value="Clear Form" />&nbsp;&nbsp;
    <input type="submit" name="Submit" value="Bid" />
</form>
</p>
</body>
</html>

