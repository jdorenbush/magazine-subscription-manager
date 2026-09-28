<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
	// ********************** PAYPAL CONFIGURATION **********************
	if ( $action == "payments" ) {
  	$query = "SELECT * FROM payments_config ORDER BY pc_id DESC LIMIT 1";
  	$result = mysql_query($query) or die('Database operation failed.');
  	echo "<h2>PayPal Configuration</h2>";
		while ( $exca = mysql_fetch_array($result)) { echo "
			<form action='?action=upd_pay' method='POST' style='padding-left:5px' class='small'>
				<label class='long'>Item Name</label>
				<input type='text' name='name' value='$exca[pc_name]' class='span-8' />
				<br /><br />

				<label class='long'>API Transaction URL</label>
				<input type='text' name='api' value='$exca[pc_urlp]' class='span-8' />
				<br /><br />

				<label class='long'>Account ID</label>
				<input type='text' name='paypal' value='$exca[pc_bmail]' class='span-8' />
				<br /><br />
				
				<label class='long'>Price</label>
				<input type='text' name='total' value='$exca[p_amount]' class='span-4' style='background-color: #ddd' />
				<br /><br />
				
				<input type='Submit' value='Update Settings' class='bold large submit' />
			</form> ";
		}
	}

	if ( $action == "upd_pay" ) {
  		$name=$_POST['name'];
  		$api=$_POST['api'];
  		$paypal=$_POST['paypal'];
  		$total=$_POST['total'];
  		$query = "UPDATE payments_config SET pc_name='$name', pc_urlp='$api', pc_bmail='$paypal', p_amount='$total'";
  		$result = mysql_query($query) or die('Database operation failed.');
		echo "<div align='center' class='bold'>The settings have been successfully updated.</div>";
	}
?>
