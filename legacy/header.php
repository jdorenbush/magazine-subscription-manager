<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php /*
	PayPal Developer Documentation
		* PayPal IPN (Instant Payment Notification)
		* https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_admin_IPNIntro
		* Sample PHP Code
		*	https://cms.paypal.com/cms_content/US/en_US/files/developer/IPN_PHP_41.txt 

	Database Structure
		*	pen_subscribers
				pID
				pName
				pCompany
				pAddress_A
				pAddress_B
				pcity
				pState
				pZip
				pExpiration
				pSex
				pBirthday
				pIcome
				pInterests
				pPhone
				pEmail
				pBulletin
				code
		*	states
				stateid
				stateab		(Abbreviation)
				statenm		(Full name)
		*	subscribers
				ID
				Name
				Company
				Address_A
				Address_B
				city
				State
				Zip
				Expiration
				Sex
				Birthday
				Phone
				Email
				Income
				Interests
		*	sub_details
				det_id
				det_usid
				det_bulletin
				det_paypal
				det_pcode
				det_confirm
				det_disable
*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Mutineer Admin</title>

	<?php // Load Meta Data ?>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noodp, noydir" />

	<?php // Load CSS ?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="assets/master.css" />

	<?php // Checkbox Select All ?>
	<script type="text/javascript">
		function checkUncheckAll(theElement){var theForm=theElement.form,z=0;
			for(z=0;z<theForm.length;z++){
				if(theForm[z].type=='checkbox'&&theForm[z].name!='checkall'){theForm[z].checked=theElement.checked}
			}
		}
	</script>
</head>

<?php if(isset($body)) echo "<body id='" . $body . "'>"; else echo "<body>"; ?>
	<div id="heading">
	<div class="box">
		<div class="align-left" style="margin-top:10px">
			<a href="subscription.php" class="u bold">Subscription Management</a> | <a href="magadd.php" class="u bold">Magazine Management</a>
		</div>
		
		<?php // Paypal Config and Export ?>
		<div class="align-right">
			<img src="img/paypal.gif" alt="PayPal" class="align-top" /> <a href="subscription.php?action=payments" class="u"><span class="bold">Config</span></a>
			<span style="padding:0 10px" class="small quiet"> | </span> 
			<img src="img/xls.png" alt="XLS" class="middle" /> <a href="xls.php" class="u"><span class="bold">Export</span></a>
			<?php // Search ?>
			<form action="search.php" method="GET" style="margin-top:5px">
				<input type="text" name="q" class="text" />
				<select name="type" class="short">
					<option value="name">Name</option>
					<option value="address">Address</option>
					<option value="city">City</option>
					<option value="state">State</option>
					<option value="email">Email</option>
				</select> 
				<input type="Submit" value="Search" class="submit" />
			</form>
		</div>
		<div class="clear"></div>
	</div>
	</div>
	<hr class="space" />

