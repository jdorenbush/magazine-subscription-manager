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
	echo "<h3><a href='subscription.php'>Subscription Management</a></h3>";
	echo "<div id='container'>";

	if(isset($_GET['action'])) { $action=addslashes($_GET['action']); }
		// if ( $action == "adduser" ) { }
		// if ( $action == "edit" ) { }
		if ( $action == "payments" ) { include('paypal.php'); }
		// if ( $action == "bulletin" ) { }

 		if ( $action == "" ) {

$page=$_GET['page'];
$limit=80;
if ($page==NULL) {
	$page=1;
}
$max_show=2;

$limitvalue = $page * $limit - ($limit);

 $pquery="SELECT COUNT(ID) AS numrows FROM subscribers WHERE ID IN(SELECT det_usid FROM 

sub_details WHERE det_confirm='1' && det_disable='0') ";
 $presult=mysql_query($pquery) or die('Error, could not create pagination');
 $grow=mysql_fetch_array($presult, MYSQL_ASSOC);
 $totalrows = $grow['numrows'];

	if ($totalrows==0) { $display_pagination = 0; } else { $display_pagination = 1; }

$numofpages = ceil($totalrows / $limit); 

if ($numofpages==1) { $display_pagination=0; }

if ($page > 3) {
	$start=$page-1;
	$end=$page+1;
	if ($page==$numofpages) {
		$end=$page;
		$start=$start-1;
	} elseif ($page+1==$numofpages) {
		$end=$page+1;
		$start=$start-1;
	}
} else {
	$start=1;
 if ($totalrows > 20 ) { $end=2; }
 if ($totalrows > 40 ) { $end=3; }
 if ($totalrows > 60 ) { $end=4; }
 if ($totalrows > 80 ) { $end=5; }
}

if ($page>=4) {
	$apagenav='<span class="pagelink"><a href="?page=1">Back</a></span> ';
} else {
	$apagenav='<span class="pagelink">Back</span> ';
}

if ($page < $numofpages) {
	$aend=' <span class="pagelink"><a href="?page='.$numofpages.'">Forward</a></span>';
} else {
	$aend=' <span class="pagelink">Forward</span>';
}


    for($i = $start; $i <= $end; $i++){
        if($i == $page){
            $apagenav .= '<span class="tpagelink">'.$i."</span> ";
        }else{
            $apagenav .= '<span class="pagelink"><a href="?page='.$i.'">'.$i.'</a></span> ';
        }
    }
	$apagenav.=$aend;

	if ($display_pagination==0) {
		$apagenav=NULL;
	}

/*
$result = mysql_query("SELECT * FROM sub_details");

echo "<table border='1'>
<tr>
<th>User ID</th>
<th>PayPal Code</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['det_usid'] . "</td>";
  echo "<td>" . $row['det_pcode'] . "</td>";
  echo "</tr>";
  }
echo "</table><br /><br />";
*/

 $query = "SELECT * FROM subscribers WHERE ID IN(SELECT det_usid FROM sub_details WHERE det_confirm='0' && det_disable='0') ORDER BY Name ASC";
 $result = mysql_query($query) or die('Database operation failed.');
 $num_rows = mysql_num_rows($result);

 if ($num_rows == "0") {

 } else {

 echo "<form action=\"?action=multiconfirm\" method=\"POST\">
  <table class='small' border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
   <tr>
    <th class='firstcol'><b>Name</b></th>
    <th><b>Address</b></th>
    <th><b>City</b></th>
    <th><b>State</b></th>
		<th><b>Zip</b></th>
		<th><b>Email</b></th>
    <!--<td><b>Expiration</b></th>-->
    <th colspan=\"2\"></th>
   </tr>";


 while ( $exca = mysql_fetch_array($result)) {

    echo "
   <tr>
    <td class='highlight'><a href=\"?action=details&id=$exca[ID]\"><img src=\"img/icon_contacts.png\" alt=\"\" style=\"vertical-align:middle;padding-left:2px\" /> $exca[Name]</a></td>
    <td class='highlight'>$exca[Address_A]</td>
    <td class='highlight'>$exca[city]</td>
    <td class='highlight'><span class='state'>$exca[State]</span></td>
		<td class='highlight'>$exca[Zip]</td>
		<td class='highlight'>$exca[Email]</td>
    <!--<td>$exca[Expiration]</td>-->
    <td class='highlight'> <input type=\"checkbox\" name=\"confirmall[]\" value=\"$exca[ID]\"> </td>
    <td class='highlight'> <a href=\"?action=delete&id=$exca[ID]\"><img src=\"img/icon_delete.png\" alt=\"\" style=\"vertical-align:middle\" /></a> </td>
   </tr>";

 }

 echo "
		<tr>
		<td colspan='6' class='noborder'><span style='float:right;padding:3px 3px 0 0' class='case bold unsmall'>Select All</span></td>
		<td class='noborder'><input type=\"checkbox\" name=\"checkall\" onclick=\"checkUncheckAll(this);\"/></td>
		<td class='noborder'><input type=\"image\" src=\"img/icon_ok.png\" value=\"C\" class=\"submit\" style=\"vertical-align:middle\"></td>
		</tr>
  </table>
	</form>";

 }
 $query = "SELECT * FROM subscribers WHERE ID IN(SELECT det_usid FROM sub_details WHERE det_confirm='1' && det_disable='0') ORDER BY Name ASC LIMIT $limitvalue, $limit";
 $result = mysql_query($query) or die('Database operation failed.');
 $num_rows = mysql_num_rows($result);

 if ($num_rows == "0") {

 } else {

 echo "
  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class='border-top small'>
   <tr>
    <th class='firstcol'><b>ID #</b></th>
    <th><b>Name</b></th>
    <th><b>Address</b></th>
    <th><b>City</b></th>
    <th><b>State</b></th>
    <th><b>Expiration</b></th>
    <th colspan=\"2\"></th>    
   </tr>";


 while ( $exca = mysql_fetch_array($result)) {

    echo "
   <tr>
    <td>$exca[ID]</td>
    <td><a href=\"?action=details&id=$exca[ID]\"><img src='img/icon_contacts.png' style='vertical-align:middle' /> $exca[Name]</a></td>
    <td>$exca[Address_A]</td>
    <td>$exca[city]</td>
    <td><span class='state'>$exca[State]</span></td>
    <td>$exca[Expiration]</td>
    <td> <a href=\"?action=edit&id=$exca[ID]\"><img src='img/icon_edit.png' style='vertical-align:middle' /></a> </td>
    <td> <a href=\"?action=delete&id=$exca[ID]\"><img src='img/icon_delete.png' style='vertical-align:middle' /></a> </td>
   </tr>";
 }

 echo "</table>";
}

echo '<div class="space-1"></div><div class="center">'.$apagenav.'</div>';

 }
	// if ( $action == "details" ) { }

	// ********************** CONFIRM MULTIPLE USERS **********************
	if ( $action == "multiconfirm" ) {
 		$confirmall=$_POST['confirmall'];
  	if (!$confirmall) { echo "<div align='center' class='bold'>You have to select a user to confirm.</div>"; }
		else {
			$vars=$_POST['confirmall'];
  		$vars= implode( ",", $vars );
 	 		$split = explode(',', $vars);
			while(list($key,$value) = each($split)) { $query = "UPDATE sub_details SET det_confirm='1' WHERE det_usid='$value'"; $result = mysql_query($query) or die('Database operation failed.'); }
  		echo "<div align='center' class='bold'>Subscribers successfully confirmed.</div>";
		}
	}

	// ********************** CONFIRM USER **********************
 	if ( $action == "singleconfirm" ) {
		$confirmall=$_GET['confirmall'];
		if (!$confirmall) { echo "<div align='center' class='bold'>You have to select a user to confirm.</div>"; } 
		else {
  		$vars=$_GET['confirmall'];
  		$query = "UPDATE sub_details SET det_confirm='1' WHERE det_usid='$vars'";
  		$result = mysql_query($query) or die('Database operation failed.');
			echo "<div align='center' class='bold'>Subscribers successfully confirmed.</div>";
  	}
	}

	// ********************** DELETE USER **********************
	if ( $action == "delete" ) {
		$id=$_GET['id'];
  	$query = "UPDATE sub_details SET det_disable='1' WHERE det_usid='$id'";
  	$result = mysql_query($query) or die('Database operation failed.');
		echo "<div align='center' class='bold'>Subscribers successfully removed.</div>";
	}

?>

	</div> <?php // #container ?>
</body> <?php // #admin ?>

</html>
