<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
	include('config.php');
	$body = 'admin';
	include('header.php');
	echo "<h3><a href='subscription.php'>Subscriber Search</a></h3>";
	echo "<div id='container'>";


$var = @$_GET['q'] ;
$trimmed = trim($var);
$type=$_GET['type'];
$limit=10;

if (!$var || !$trimmed) { echo "<div align='center' class='small'>You must search for something.</div>"; }

if ($type == "name") {
	$tyquery= "SELECT * FROM subscribers WHERE Name LIKE \"%$trimmed%\" ORDER BY Name";
	$tyurl="search.php?q=$var&type=$type";
	$bto="<strong>";
	$btc="</strong>";
}

if ($type == "address") {
	$tyquery= "SELECT * FROM subscribers WHERE Address_A LIKE \"%$trimmed%\" ORDER BY Name";
	$tyurl="search.php?q=$var&type=$type";
	$bao="<strong>";
	$bac="</strong>";
}

if ($type == "city") {
	$tyquery= "SELECT * FROM subscribers WHERE city LIKE \"%$trimmed%\" ORDER BY Name";
	$tyurl="search.php?q=$var&type=$type";
	$bco="<strong>";
	$bcc="</strong>";
}

if ($type == "state") {
	$tyquery= "SELECT * FROM subscribers WHERE State LIKE \"%$trimmed%\" ORDER BY Name";
	$tyurl="search.php?q=$var&type=$type";
	$bso="<strong>";
	$bsc="</strong>";
}

if ($type == "email") {
	$tyquery= "SELECT * FROM subscribers WHERE Email LIKE \"%$trimmed%\" ORDER BY Name";
	$tyurl="search.php?q=$var&type=$type";
	$beo="<strong>";
	$bec="</strong>";
}

$query = "$tyquery";
$numresults=mysql_query($query);
$numrows=mysql_num_rows($numresults);

if ($numrows == 0) {
	echo "<p class='small bold'>The search for $trimmed did not match any results.</p>"; 
} 

else {
	if (empty($s)) { $s=0; }

 	$query .= " LIMIT $s,$limit";
  $result = mysql_query($query) or die('Database operation failed.');
	
	echo "<p class='small bold'>Search Results for: &quot;" . $var . "&quot;</p>";

	echo"
  	<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class='border-top small'>
			<tr>
				<th style='visibility:hidden'></th>
    		<th class='firstcol'><b>Name</b></th>
    		<th><b>Address</b></th>
    		<th><b>Email</b></th>
			</tr>
		</table>";

	$count = 1 + $s ;

	while ( $exca = mysql_fetch_array($result)) {
		echo "
			<table class='small'>
				<tr>
					<td style='visibility:hidden'>$count</td>
					<td><a href=\"subscription.php?action=edit&id=$exca[ID]\"><img src='img/icon_edit.gif' /></a> $bto $exca[Name] $btc</td> 
					<td>$bao $exca[Address_A], $bco $exca[city]$bcc, <span class='state'>$bso $exca[State]$bsc</span> $exca[Zip]</td> 
					<td><a href='mailto:$exca[Email]'><img src='img/icon_email.gif' /></a> $beo $exca[Email] $bec</td>
				</tr>";
    $count ++;
		echo "</table>";
	}
}

?>
	</div> <?php // #container ?>
</body> <?php // #admin ?>

</html>
