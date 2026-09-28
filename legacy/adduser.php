<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
	// ********************** ADD USER **********************
	if ( $action == "adduser" ) {
		$uname=mysql_real_escape_string($_POST['uname']);
		$email=mysql_real_escape_string($_POST['email']);
		$gender=mysql_real_escape_string($_POST['gender']);
		$day=mysql_real_escape_string($_POST['day']);
		$month=mysql_real_escape_string($_POST['month']);
		$year=mysql_real_escape_string($_POST['year']);
		$company=mysql_real_escape_string($_POST['company']);
		$address_a=mysql_real_escape_string($_POST['address_a']);
		$address_b=mysql_real_escape_string($_POST['address_b']);
		$city=mysql_real_escape_string($_POST['city']);
		$state=mysql_real_escape_string($_POST['state']);
		$zip=mysql_real_escape_string($_POST['zip']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$bulletin=mysql_real_escape_string($_POST['bulletin']);
		$income=mysql_real_escape_string($_POST['income']);
		$expiration=mysql_real_escape_string($_POST['expiration']);
		include("adduser_form.php"); // form action is doadd_new
	}

	if ( $action == "doadd_new" ) {
		$uname=mysql_real_escape_string($_POST['uname']);
		$email=mysql_real_escape_string($_POST['email']);
		$gender=mysql_real_escape_string($_POST['gender']);
		$day=mysql_real_escape_string($_POST['day']);
		$month=mysql_real_escape_string($_POST['month']);
		$year=mysql_real_escape_string($_POST['year']);
		$company=mysql_real_escape_string($_POST['company']);
		$address_a=mysql_real_escape_string($_POST['address_a']);
		$address_b=mysql_real_escape_string($_POST['address_b']);
		$city=mysql_real_escape_string($_POST['city']);
		$state=mysql_real_escape_string($_POST['state']);
		$zip=mysql_real_escape_string($_POST['zip']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$bulletin=mysql_real_escape_string($_POST['bulletin']);
		$income=mysql_real_escape_string($_POST['income']);
		$interests=$_POST['interested']; if (!$interests) { $interests=""; } else { $interests= implode( ", ", $interests ); }
		$bday="$year-$month-$day";
		$rand=mt_rand(0, 32); $gnrton=md5($rand . time());
		$year=date("Y")+1; $month=date("m"); $day=date("d"); $until="$year-$month-$day";

	 	$query = "SELECT * FROM subscribers WHERE Name='$uname'";
		$result = mysql_query($query) or die('Database operation failed.');
		$num_rows = mysql_num_rows($result);

		if ($num_rows == "0" ) {
			$query = "SELECT * FROM subscribers WHERE Email='$email'";
			$result = mysql_query($query) or die('Database operation failed.');
			$num_rows = mysql_num_rows($result);

			if ($num_rows == "0" ) {
				$query = "INSERT INTO subscribers VALUES('','$uname','$company','$address_a','$address_b','$city','$state','$zip','$until','$gender','$bday','$phone','$email','$income','$interests')";
				$result = mysql_query($query) or die('Database operation failed.');
				$lastid = mysql_insert_id(); // ID from this connection's preceding insert.
				$query = "INSERT INTO sub_details VALUES('','$lastid','$bulletin','0','$gnrton','0','0')";
				$result = mysql_query($query) or die('Database operation failed.');
				echo "<div align='center' class='bold'>The user has been successfully added.</div>";
			}

		else { echo "<div align='center' class='bold'>Error: This email is already registered in the subscribers database.<form action=\"?action=adduser\" method=\"POST\"><input type=\"hidden\" name=\"uname\" value=\"$uname\" /><input type=\"hidden\" name=\"email\" value=\"$email\" /><input type=\"hidden\" name=\"income\" value=\"$income\" /><input type=\"hidden\" name=\"gender\" value=\"$gender\" /><input type=\"hidden\" name=\"day\" value=\"$day\" /><input type=\"hidden\" name=\"month\" value=\"$month\" /><input type=\"hidden\" name=\"year\" value=\"$year\" /><input type=\"hidden\" name=\"company\" value=\"$company\" /><input type=\"hidden\" name=\"address_a\" value=\"$address_a\" /><input type=\"hidden\" name=\"address_b\" value=\"$address_b\" /><input type=\"hidden\" name=\"city\" value=\"$city\" /><input type=\"hidden\" name=\"state\" value=\"$state\" /><input type=\"hidden\" name=\"zip\" value=\"$zip\" /><input type=\"hidden\" name=\"phone\" value=\"$phone\" /><input type=\"hidden\" name=\"bulletin\" value=\"$bulletin\" /><input type=\"Submit\" value=\"Go Back\"  class=\"submit\" /></form></div>"; }
		}

	else { echo "<div align='center' class='bold'>Error: This user is already registered in the subscribers database.<form action=\"?action=adduser\" method=\"POST\"><input type=\"hidden\" name=\"uname\" value=\"$uname\" /><input type=\"hidden\" name=\"email\" value=\"$email\" /><input type=\"hidden\" name=\"income\" value=\"$income\" /><input type=\"hidden\" name=\"gender\" value=\"$gender\" /><input type=\"hidden\" name=\"day\" value=\"$day\" /><input type=\"hidden\" name=\"month\" value=\"$month\" /><input type=\"hidden\" name=\"year\" value=\"$year\" /><input type=\"hidden\" name=\"company\" value=\"$company\" /><input type=\"hidden\" name=\"address_a\" value=\"$address_a\" /><input type=\"hidden\" name=\"address_b\" value=\"$address_b\" /><input type=\"hidden\" name=\"city\" value=\"$city\" /><input type=\"hidden\" name=\"state\" value=\"$state\" /><input type=\"hidden\" name=\"zip\" value=\"$zip\" /><input type=\"hidden\" name=\"phone\" value=\"$phone\" /><input type=\"hidden\" name=\"bulletin\" value=\"$bulletin\" /><input type=\"Submit\" value=\"Go Back\" class=\"submit\" /></form></div>"; }
	} // endif for action = adduser
?>
