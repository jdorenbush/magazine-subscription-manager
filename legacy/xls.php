<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php include('config.php');

$result = mysql_query('SELECT * FROM subscribers');
$count = mysql_num_fields($result);

for ($i = 0; $i < $count; $i++){ $header .= mysql_field_name($result, $i)."\t"; }

while($row = mysql_fetch_row($result)){
  $line = '';
  foreach($row as $value){
    if(!isset($value) || $value == ""){
      $value = "\t";
    }else{
      $value = str_replace('"', '""', $value);
      $value = '"' . $value . '"' . "\t";
    }
    $line .= $value;
  }
  $data .= trim($line)."\n";
}

  $data = str_replace("\r", "", $data);

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=subscribers.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $header."\n".$data; 

?> 
