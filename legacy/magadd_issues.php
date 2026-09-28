<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php 
	include ('magadd_config.php'); 
	if(isset($_GET['action'])) { $action=addslashes($_GET['action']); }
	$body = 'magadd';
	include ('header.php'); 
	echo "<h3><a href='magadd_issues.php' class='u'>Magazine Issue No. Management</a></h3>";
	echo "<div id='container'>";
?>

<div class="span-24">
	<div class="box-border">

		<form action="?action=insert" method="post">
			<fieldset>
				<legend>Add Issues</legend>
				<div class="span-10">
					<p><label for="IssueNo" class="bold">Issue Number | </label> <select name="IssueNo" class="medium">
						<option value="28">Issue #28</option><option value="29">Issue #29</option><option value="30">Issue #30</option>
						<option value="31">Issue #31</option><option value="32">Issue #32</option><option value="33">Issue #33</option>
						<option value="34">Issue #34</option><option value="35">Issue #35</option><option value="36">Issue #36</option>
						<option value="37">Issue #37</option><option value="38">Issue #38</option><option value="39">Issue #39</option>
						<option value="40">Issue #40</option>
					</select></p>
					<p><label for="Month" class="bold">Issue Season | </label> <select name="Month" class="medium">
						<option value="Summer">Summer</option>
						<option value="Fall">Fall</option>
						<option value="Winter">Winter</option>
						<option value="Spring">Spring</option>
					</select></p>
					<p><label for="Year" class="bold">Issue Year | </label> <select name="Year" class="medium">
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
					</select></p>
				</div>

				<hr />

				<p class="center large"><input type="submit" name="submit" value="Add" /></p>

			</fieldset>
		</form>

	</div> <?php // End DIV 'Box' ?>
</div>	<?php // End DIV 'Span-24' ?>

<div class="clear"></div>

</div> <?php // End DIV 'Container' ?>

<hr class="space-2" />

<!-- ============== INSERT ============== -->
<?php if ( $action == "insert" ) {
	$sql="INSERT INTO issues (IssueNo, Month, Year) VALUES ('$_POST[IssueNo]','$_POST[Month]','$_POST[Year]')";
	if (!mysql_query($sql,$con)) { die('Database operation failed.'); }

	echo "<div><h3>Magazine Admin [Insert Issues]</h3><div class=\"center\"><span class=\"success bold large\">Successfully Added!</span></div><table class=\"small quiet sqlresults\">";
	echo "<tr><td><strong>[IssueNo] </strong></td><td>".$_POST[IssueNo]."</td><td><strong>[Month/Season] </strong></td><td>".$_POST[Month]."</td><td><strong>[Year] </strong></td><td>".$_POST[Year]."</td></tr>";
	echo "</table></div>";
} ?> 

<?php mysql_close($con); ?>

</body>
</html>
