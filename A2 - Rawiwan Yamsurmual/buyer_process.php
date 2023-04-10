<!DOCTYPE html>
<html>
<head>
<title>Post message</title>
</head>
<body>
<h2>Customer, lets bid the item here! :)</h2>
	<?php
	//redisplay the form 
    function redisplayForm($id, $pPrice, $firstName, $lastName, $phone, $bEmail){
        ?>
        <h2 style = "text-align:center">Please re-enter the data :) </h2>
        <form name="buyer" action="buyer.process.php" method="post">
		
		<p>IDnumber: <input type="text" name="IDnumber" value="<?php echo $id; ?>" /></p>
		<p>Proposed Price: <input type="text" name="pPrice" value="<?php echo $pPrice; ?>" /></p>
        <p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>" /></p>
        <p>Last Name: <input type="text" name="lname" value="<?php echo $lastName; ?>" /></p>
		<p>Phone No: <input type="text" name="phone" value="<?php echo $phone; ?>" /></p>
		<p>Email: <input type="text" name="bEmail" value="<?php echo $bEmail; ?>" /></p>
		
		
        &nbsp;<input type="submit" name="Submit" value="Bid" />
        </form>
<?php
	//check if all field have been filled in
	}
    function displayRequired($fieldName) {
        echo "The field \"$fieldName\" is required.<br />\n";
    }
            
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            displayRequired($fieldName);
            ++$errorCount;
            $retval = "";
        } else { // Only clean up the input if it isn't empty
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return($retval);
    }
            
    $errorCount = 0;
	$id = validateInput($_POST['id'],"IDnumber");
	$pPrice = validateInput($_POST['pPrice'],"Proposed Price");
	// Buyer details
	$firstName = validateInput($_POST['firstName'],"First name");
    $lastName = validateInput($_POST['lastName'],"Last name");
	$phone = validateInput($_POST['phone'],"Phone");
    $bEmail = validateInput($_POST['bEmail'],"Email");

	
	if ($errorCount>0){
        echo "Please fill up the missing fields below!<br />\n";
		redisplayForm($id, $pPrice, $firstName, $id, $lastName, $phone, $bEmail);
	}
    else
        echo "Thank you for bidding with us, " . $firstName . " " . $lastName . ".";
?>

<?php
	//save to the BuyersEOI.txt
	if (isset($_POST['id']) && isset($_POST['pPrice']) && isset($_POST['firstName']) && isset($_POST['lastName']) 
		&& isset($_POST['phone']) && isset($_POST['bEmail'])) {
		$BuyerFirst = addslashes($_POST['firstName']);
		$BuyerLast = addslashes($_POST['lastName']);
		$BuyerPhone = addslashes($_POST['phone']);
		$BuyerEmail = addslashes($_POST['bEmail']);
		$BuyerId = addslashes($_POST['id']);
		$BuyerPrice = addslashes($_POST['pPrice']);
		
		
		$NewBuyer = "$BuyerFirst, $BuyerLast, $BuyerPhone, $BuyerId, $BuyerEmail, $BuyerPrice\n";
		$ProductFile = "BuyersEOI.txt";
		if (file_put_contents($ProductFile, $NewBuyer, FILE_APPEND) > 0)
			echo "<p>How exciting !</p>\n";
		else
			echo "<p>Registration error!</p>";
	}
	else
		echo "<p>To sign up, enter your name and product details and click the Bid button.</p>";
?>
</body>
</html>

