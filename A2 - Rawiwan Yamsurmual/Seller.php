<!DOCTYPE html>
<html>
<head>
<title>My hiking gear</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

</head>
<body>
<h2>Seller, lets sell something!</h2>
<p>Add in your contact details and product descriptions</p>
<form name="Hiking" action="seller_process.php" method="post">
    <p>First Name: <input type="text" placeholder ="Add" name="firstName" /></p>
    <p>Last Name: <input type="text" placeholder ="Add" name="lastName" /></p>
	<p>Phone No.: <input type="text" placeholder ="+61" name="phone" /></p>
	
	<h3>Product details</h3>
	<p>IDnumber: <input type="text" placeholder ="XXX-000:XX" name="id" /></p>
	<p>Item name: <input type="text" placeholder ="Add" name="itemName" /></p>
	<p>Product Details: <input type="text" placeholder ="Add" name="pDetails" /></p>
	<p>Product Condition: <input type="text" placeholder ="NEW or USED" name="pCon" /></p>
	
	
    <p><input type="reset" value="Clear Form" />&nbsp;&nbsp;
    <input type="submit" name="Submit" value="Register" />
</form>


</body>
</html> 