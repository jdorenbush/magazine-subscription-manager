<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
	// ********************** EDIT USER **********************
	if ( $action == "edit" ) {
		$id=$_GET['id'];

 		$query = "SELECT * FROM subscribers WHERE ID='$id'";
 		$subscriber_result = mysql_query($query) or die('Database operation failed.');

 		$query = "SELECT * FROM sub_details WHERE det_usid='$id'";
 		$result = mysql_query($query) or die('Database operation failed.');

 		$bulletins=mysql_result($result,0,"det_bulletin");

 		if ($bulletins == "1" ) { $bullcode = "<input type=\"radio\" name=\"bulletin\" value=\"1\" checked />Yes <input type=\"radio\" name=\"bulletin\" value=\"0\" />No"; }
 		if ($bulletins == "0" ) { $bullcode = "<input type=\"radio\" name=\"bulletin\" value=\"1\" />Yes <input type=\"radio\" name=\"bulletin\" value=\"0\" checked />No"; }

 		while ($row = mysql_fetch_array($subscriber_result)) { echo "<form id=\"subForm\" action=\"?action=doedit\" method=\"POST\"> 
			<input type=\"hidden\" name=\"ID\" value=\"$id\" />
			<label>Name </label><input type=\"text\" name=\"uname\" value=\"$row[Name]\" class=\"required\" /><br />
			<label>Email </label><input type=\"text\" name=\"email\" value=\"$row[Email]\" class=\"required email\" /><br />
			<label>Gender</label><input type=\"text\" name=\"gender\" value=\"$row[Sex]\" /><br />
			<label>Birthday</label><input type=\"text\" name=\"birthday\" value=\"$row[Birthday]\" /><br />
			<label>Company</label><input type=\"text\" name=\"company\" value=\"$row[Company]\" /><br />
			<label>Address 1</label><input type=\"text\" name=\"address_a\" value=\"$row[Address_A]\" class=\"required\" /><br />
			<label>Address 2</label><input type=\"text\" name=\"address_b\" value=\"$row[Address_B]\" /><br />
			<label>City </label><input type=\"text\" name=\"city\" value=\"$row[city]\" class=\"required\" /><br />
			<label>State </label><input type=\"text\" name=\"state\" value=\"$row[State]\" class=\"required\" /><br />
			<label>ZIP Code</label><input type=\"text\" name=\"zip\" value=\"$row[Zip]\" class=\"required\" /><br />
			<label>Phone Number </label><input type=\"text\" name=\"phone\" value=\"$row[Phone]\" /><br />
			<label>Income Range </label><input type=\"text\" name=\"income\" value=\"$row[Income]\" /><br />
			<label>Interested In </label><input type=\"text\" name=\"interested\" value=\"$row[Interests]\" /><br />
			<label>Exp Date</label><input type=\"text\" name=\"expiration\" value=\"$row[Expiration]\" /><br />
			<label>Bulletin Subscriber </label>$bullcode<br /><br />
			<input type=\"Submit\" value=\"Edit\" class=\"submit\" />
		</form>";
 		}
	} // endif for action = edit

	if ( $action == "doedit" ) {
		$id=mysql_real_escape_string($_POST['ID']);
		$uname=mysql_real_escape_string($_POST['uname']);
		$email=mysql_real_escape_string($_POST['email']);
		$gender=mysql_real_escape_string($_POST['gender']);
		$birthday=mysql_real_escape_string($_POST['birthday']);
		$expiration=mysql_real_escape_string($_POST['expiration']);
		$company=mysql_real_escape_string($_POST['company']);
		$address_a=mysql_real_escape_string($_POST['address_a']);
		$address_b=mysql_real_escape_string($_POST['address_b']);
		$city=mysql_real_escape_string($_POST['city']);
		$state=mysql_real_escape_string($_POST['state']);
		$zip=mysql_real_escape_string($_POST['zip']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$income=mysql_real_escape_string($_POST['income']);
		$interests=mysql_real_escape_string($_POST['interested']);
		$bulletin=mysql_real_escape_string($_POST['bulletin']);

		$query = "UPDATE subscribers SET ID='$id', Name='$uname', Company='$company', Address_A='$address_a', Address_B='$address_b', city='$city', State='$state', Zip='$zip', Expiration='$expiration', Sex='$gender', Birthday='$birthday', Phone='$phone', Email='$email', Income='$income', Interests='$interests' WHERE ID='$id'";
		$result = mysql_query($query) or die('Database operation failed.');

		$query = "UPDATE sub_details SET det_bulletin='$bulletin' WHERE det_usid='$id'";
		$result = mysql_query($query) or die('Database operation failed.');
		echo "<div align='center' class='bold'>The user has been updated.</div>";
	} // endif for action = doedit
?>
