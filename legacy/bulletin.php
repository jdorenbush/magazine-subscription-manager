<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
	// ********************** EMAIL SUBSCRIBERS **********************
	if ( $action == "bulletin" ) {
 		$query = "SELECT * FROM sub_details WHERE det_bulletin='1'";
 		$result = mysql_query($query) or die('Database operation failed.');
		echo "<h2>List of Subscriber Emails:</h2><textarea cols=\"45\" rows=\"15\">";
		while ( $exca = mysql_fetch_array($result)) {
			$dos = "SELECT * FROM subscribers WHERE ID='$exca[det_usid]'";
   		$tres = mysql_query($dos) or die('Database operation failed.');
			while ( $excb = mysql_fetch_array($tres)) { echo "$excb[Email]\n"; $mails .="$excb[Email], "; }
		}
		echo "
			</textarea><br />
			<img src=\"img/xls.png\" /> <a href=\"xls_bulletin.php\">Download .XLS</a><br />
			<h2>Send Mass-Mail:</h2>
			<form action=\"mass.php\" method=\"POST\">
				<input type=\"hidden\" name=\"emails\" value=\"$mails\" />
				<label>From:</label><input type=\"text\" name=\"from\" size=\"40\" /><br />
				<label>Subject:</label><input type=\"text\" name=\"subject\" size=\"40\" /><br />
				<label>Message:</label><textarea name=\"tmsg\" cols=\"75\" rows=\"7\"></textarea><br />
				<input type=\"submit\" value=\"Send Email\" class=\"submit\" />
			</form>
		";
	}
?>
