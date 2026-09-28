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
	echo "<h3><a href='magadd.php' class='u'>Magazine Management</a></h3>";
	echo "<div id='container'>";
?>

<div class="span-24">
	<div class="box-border">

		<form action="?action=insert" method="post">
			<fieldset>
				<legend>Enter The Current Issue Feature Stories</legend>

				<p><label for="issueno" class="bold">Current Issue | </label> <select name="issueno" class="medium"> 
				<?php
				$sql = "SELECT IssueNo FROM issues ORDER BY IssueNo DESC";
				$rs = mysql_query($sql);
				while($row = mysql_fetch_array($rs))
				{ 
					echo "<option value=\"".$row['IssueNo']."\">Issue #".$row['IssueNo']."</option>\n  ";
				}
				?>
				</select> <a href="magadd_issues.php" class="u bold">Add Missing Issue Numbers</a></p>

				<hr />

				<div class="span-10">
					<p><label for="feature1" class="bold">Feature 1 | </label> <input type="text" name="feature1" class="text " /></p>
					<p><label for="author1" class="quiet">Author | </label> <input type="text" name="author1" class="text" /></p>
					<p><label for="photographer1" class="quiet">Photographer | </label> <input type="text" name="photographer1" class="text" /></p>
				</div>
				<div class="span-12 last">
					<label for="summary1" class="bold">Summary | </label><textarea name="summary1" style="height:85px"></textarea>
				</div>

				<hr />

				<div class="span-10">
					<p><label for="feature2" class="bold">Feature 2 | </label><input type="text" name="feature2" class="text" /></p>
					<p><label for="author2" class="quiet">Author | </label><input type="text" name="author2" class="text" /></p>
					<p><label for="photographer2" class="quiet">Photographer | </label><input type="text" name="photographer2" class="text" /></p>
				</div>
				<div class="span-12 last">
					<p><label for="summary2" class="bold">Summary | </label><textarea name="summary2" style="height:85px"></textarea>
				</div>

				<hr />

				<div class="span-10">
					<p><label for="feature3" class="bold">Feature 3 | </label><input type="text" name="feature3" class="text" /></p>
					<p><label for="author3" class="quiet">Author | </label><input type="text" name="author3" class="text" /></p>
					<p><label for="photographer3" class="quiet">Photographer | </label><input type="text" name="photographer3" class="text" /></p>
				</div>
				<div class="span-12 last">
					<label for="summary3" class="bold">Summary | </label><textarea name="summary3" style="height:85px"></textarea>
				</div>

				<hr />

				<div class="span-10">
					<p><label for="feature4" class="bold">Feature 4 | </label><input type="text" name="feature4" class="text" /></p>
					<p><label for="author4" class="quiet">Author | </label><input type="text" name="author4" class="text" /></p>
					<p><label for="photographer4" class="quiet">Photographer | </label><input type="text" name="photographer4" class="text" /></p>
				</div>
				<div class="span-12 last">
					<label for="summary4" class="bold">Summary | </label><textarea name="summary4" style="height:85px"></textarea>
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
	$sql="INSERT INTO features (IssueNo, Article, Author, Photographer, Summary) VALUES ('$_POST[issueno]','$_POST[feature1]','$_POST[author1]','$_POST[photographer1]','$_POST[summary1]')";
	if (!mysql_query($sql,$con)) { die('Database operation failed.'); }
	$sql="INSERT INTO features (IssueNo, Article, Author, Photographer, Summary) VALUES ('$_POST[issueno]','$_POST[feature2]','$_POST[author2]','$_POST[photographer2]','$_POST[summary2]')";
	if (!mysql_query($sql,$con)) { die('Database operation failed.'); }
	$sql="INSERT INTO features (IssueNo, Article, Author, Photographer, Summary) VALUES ('$_POST[issueno]','$_POST[feature3]','$_POST[author3]','$_POST[photographer3]','$_POST[summary3]')";
	if (!mysql_query($sql,$con)) { die('Database operation failed.'); }
	$sql="INSERT INTO features (IssueNo, Article, Author, Photographer, Summary) VALUES ('$_POST[issueno]','$_POST[feature4]','$_POST[author4]','$_POST[photographer4]','$_POST[summary4]')";
	if (!mysql_query($sql,$con)) { die('Database operation failed.'); }

	echo "<div><h3>Magazine Admin [Insert Features]</h3><div class=\"center\"><span class=\"success bold large\">Successfully Added!</span></div><table class=\"small quiet sqlresults\">";
	echo "<tr><td><strong>[issueno] </strong></td><td>".$_POST[issueno]."</td><td><strong>[feature1] </strong></td><td>".$_POST[feature1]."</td><td><strong>[author1] </strong></td><td>".$_POST[author1]."</td><td><strong>[photographer1] </strong></td><td>".$_POST[photographer1]."</td><td><strong>[summary1] </strong></td><td>".$_POST[summary1]."</td></tr>";
	echo "<tr><td><strong>[issueno] </strong></td><td>".$_POST[issueno]."</td><td><strong>[feature2] </strong></td><td>".$_POST[feature2]."</td><td><strong>[author2] </strong></td><td>".$_POST[author2]."</td><td><strong>[photographer2] </strong></td><td>".$_POST[photographer2]."</td><td><strong>[summary2] </strong></td><td>".$_POST[summary2]."</td></tr>";
	echo "<tr><td><strong>[issueno] </strong></td><td>".$_POST[issueno]."</td><td><strong>[feature3] </strong></td><td>".$_POST[feature3]."</td><td><strong>[author3] </strong></td><td>".$_POST[author3]."</td><td><strong>[photographer3] </strong></td><td>".$_POST[photographer3]."</td><td><strong>[summary3] </strong></td><td>".$_POST[summary3]."</td></tr>";
	echo "<tr><td><strong>[issueno] </strong></td><td>".$_POST[issueno]."</td><td><strong>[feature4] </strong></td><td>".$_POST[feature4]."</td><td><strong>[author4] </strong></td><td>".$_POST[author4]."</td><td><strong>[photographer4] </strong></td><td>".$_POST[photographer4]."</td><td><strong>[summary4] </strong></td><td>".$_POST[summary4]."</td></tr>";
	echo "</table></div>";
} ?> 

<?php mysql_close($con); ?>

</body>
</html>
