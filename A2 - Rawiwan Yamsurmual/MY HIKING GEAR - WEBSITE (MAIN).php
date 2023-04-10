<!DOCTYPE html>
<html>
<head>
<title>My hiking gear</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

</head>
<body>
<h2>Welcome to our hiking gear website</h2>
	<form method="get">
		<input type="submit" name="content" value="Home" />&nbsp;&nbsp;
		<input type="submit" name="content" value="Seller"/>&nbsp;&nbsp;
		<input type="submit" name="content" value="Buyer"/>
</form>

<?php
    if (isset($_GET['content'])) {
        switch ($_GET['content']) {
            case 'Seller':
                include('seller.php');
                break;
            case 'Buyer':
                include('Buyer.php');
                break;
			case 'Home': 
            default:
                include('home.html');
                break;
        }
    }
	else 
        include('home.html');
?>
</body>
</html> 