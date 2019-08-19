<?php
  /*
   * Archiving Variables
   */
  define( "TMP_DIR", "TMP_DIR" ); # Temporary File Path to save files (Trailing Slash Required)
  define( "DB_USER", "DB_USER" ); # DB User
  define( "DB_PASS", "DB_PASS" ); # DB Pass
  define( "DB_NAME", "DB_NAME" ); # DB Name
  define( "DB_HOST", "DB_HOST" ); # DB Host
  define( "FPREFIX", "FPREFIX" ); # File Prefix

  /*
   * Create File Names
   * One for .sql, other .tgz
   */
  $filename = FPREFIX . date('Y-m-d-H:i:s'); # database dump file
  $file_sql = $filename . ".sql";
  $file_tgz = $filename . ".tgz";

  /*
   * Shell commands for generating the .sql and .tgz files
   */
  $shell_sql = "mysqldump -h ".DB_HOST ." -u ". DB_USER ." --password=". DB_PASS ." ". DB_NAME ." --> ". TMP_DIR . $file_sql; # create the mysql file
  $shell_tgz = "tar -cvzf ". TMP_DIR . $file_tgz ." ". TMP_DIR . $file_sql;  // Shell command to create the backup file we upload to Dropbox
  $shell_rmv = "rm -f ". TMP_DIR . $file_sql;

  /*
   * Try and execute commands
   */
  try {
    exec($shell_sql); // Run shell command to create the .sql file
    exec($shell_tgz); // Run shell command to create the .tgz file
    exec($shell_rmv); // Run shell command to remove the .sql file
  } catch (Exception $e) {
    echo "Failed to create CRM DB Backup or ZIP: " . $e->getMessage() . "\n";
  }
?>