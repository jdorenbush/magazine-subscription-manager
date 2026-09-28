<?php
/* Sanitized legacy portfolio source. Not a runnable or production-safe release.
 * Publication edits are documented in ../CHANGES.md.
 * This unconditional stop is intentional; do not remove it to deploy this code.
 */
exit('Archived source for review only. See README.md.');
?>
<?php
  $host = 'DB_HOST_REMOVED';
  $user = 'DB_USER_REMOVED';
  $pass = 'DB_PASSWORD_REMOVED';
  $name = 'DB_NAME_REMOVED';

  $cnn = mysql_connect($host, $user, $pass) or die ('Error connecting to mysql');
  mysql_select_db($name);
?>
