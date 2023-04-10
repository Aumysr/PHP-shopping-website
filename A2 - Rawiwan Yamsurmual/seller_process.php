<!DOCTYPE html>
<html>
<head>
<title>My hiking gear</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

</head>
<body>

<?php
	//redisplay the form 
    function redisplayForm($firstName, $lastName, $phone, $id, $itemName, $pDetails, $pCon){
        ?>
        <h2 style = "text-align:center">Please re-enter the data :) </h2>
        <form name="seller" action="seller.process.php" method="post">
			
        <p>First Name: <input type="text" name="firstName" value="<?php echo $firstName; ?>" /></p>
        <p>Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>" /></p>
		<p>Phone No: <input type="text" name="phone" value="<?php echo $phone; ?>" /></p>
		<p>IDnumber: <input type="text" name="IDnumber" value="<?php echo $id; ?>" /></p>
		<p>Item name: <input type="text" name="itemName" value="<?php echo $itemName; ?>" /></p>
		<p>Product Details: <input type="text" name="pDetails" value="<?php echo $pDetails; ?>" /></p>
		<p>Condition: <input type="text" name="pCon" value="<?php echo $pCon; ?>" /></p>
		
        &nbsp;<input type="submit" name="Submit" value="Register" />
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
    $firstName = validateInput($_POST['firstName'],"First name");
    $lastName = validateInput($_POST['lastName'],"Last name");
	$phone = validateInput($_POST['phone'],"Phone");
	//product details
    $id = validateInput($_POST['id'],"IDnumber");
	$itemName = validateInput($_POST['itemName'],"Item Name");
    $pDetails = validateInput($_POST['pDetails'],"Product Details");
	$pCon = validateInput($_POST['pCon'],"Product Condition");
	
	if ($errorCount>0){
        echo "Please fill up the missing fields below!<br />\n";
		redisplayForm($firstName, $lastName, $phone, $id, $itemName, $pDetails, $pCon);
	}
    else
        echo "Thank you for a registration, " . $firstName . " " . $lastName . ".";
?>

<?php
	//save to the Geardirectory.txt
	if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['id']) 
		&& isset($_POST['itemName']) && isset($_POST['pDetails']) && isset($_POST['pCon'])) {
		$SellerFirst = addslashes($_POST['firstName']);
		$SellerLast = addslashes($_POST['lastName']);
		$SellerPhone = addslashes($_POST['phone']);
		$SellerId = addslashes($_POST['id']);
		$SellerItem = addslashes($_POST['itemName']);
		$SellerDetail = addslashes($_POST['pDetails']);
		$SellerCon = addslashes($_POST['pCon']);
		
		$NewSeller = "$SellerFirst, $SellerLast, $SellerPhone, $SellerId, $SellerItem, $SellerDetail, $SellerCon \n";
		$ProductFile = "GearDirectory.txt";
		if (file_put_contents($ProductFile, $NewSeller, FILE_APPEND) > 0)
			echo "<p>Get ready to meet your customer!</p>\n";
		else
			echo "<p>Registration error!</p>";
	}
	else
		echo "<p>To sign up, enter your name and product details and click the Register button.</p>";
?>


</body>
</html>