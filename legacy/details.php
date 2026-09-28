<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<!-- NEED TO CLEAN THIS FILE UP!!! -->


<?php
	// ********************** USER DETAILS **********************
	if ( $action == "details" ) {

 $id=$_GET['id'];

 $query = "SELECT * FROM subscribers WHERE ID='$id'";
 $result = mysql_query($query) or die('Database operation failed.');

 while ( $exca = mysql_fetch_array($result)) {

  echo "
  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
   <tr>
    <td class=\"noborder\">
     Details for <b>$exca[Name]<br /><br /></b>";

  $dos = "SELECT * FROM sub_details WHERE det_usid='$id'";
  $tres = mysql_query($dos) or die('Database operation failed.');

  while ( $excb = mysql_fetch_array($tres)) {

   if ($excb[det_bulletin]=="0") { $bull = "No"; } else { $bull = "Yes"; }
   if ($excb[det_confirm]=="0") { $con = "<a href=\"?action=singleconfirm&confirmall=$exca[ID]\">Click to confirm</a>"; } else { $con = "Confirmed"; }

   echo "
      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"400\">
	<tr>
	 <td width=\"130\" class=\"noborder\">Full Name:</td><td width=\"250\" class=\"noborder\">$exca[Name]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Company:</td><td class=\"noborder\">$exca[Company]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Address 1:</td><td class=\"noborder\">$exca[Address_A]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Address 2:</td><td class=\"noborder\">$exca[Address_B]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">City:</td><td class=\"noborder\">$exca[city]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">State:</td><td class=\"noborder\"><span class='state'>$exca[State]</span></td>
	</tr>
	<tr>
	 <td class=\"noborder\">Zip:</td><td class=\"noborder\">$exca[Zip]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Subscription Expires:</td><td class=\"noborder\">$exca[Expiration]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Gender:</td><td class=\"noborder\">$exca[Sex]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Birthday:</td><td class=\"noborder\">$exca[Birthday]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Phone Number:</td><td class=\"noborder\">$exca[Phone]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Email:</td><td class=\"noborder\">$exca[Email]</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Bulletin Subscription:</td><td class=\"noborder\">$bull</td>
	</tr>
	<tr>
	 <td class=\"noborder\">Confirmed Account:</td><td class=\"noborder\">$con</td>
	</tr>
  </table>";

  }

  echo "
     </td>
    </tr>
   </table>";

 }

 }
?>
