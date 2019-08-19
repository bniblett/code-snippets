<?php
  /*
   * Archiving Variables
   */
  define( "TMP_DIR", "TMP_DIR" ); # Temporary File Path to save file (Trailing Slash Required)
  define( "BASEDIR", "BASEDIR" ); # Base Directory
  define( "FPREFIX", "FPREFIX" ); # File Prefix

  /*
   * Create File Name
   */
  $filename = FPREFIX . date('Y-m-d-H:i:s') .".tgz";

  /*
   * Archive Paths
   */
  $archive = array();
  $archive[] = BASEDIR . "p/a/t/h/";

  /*
   * Shell command to zip and archive path(s)
   */
  $shell = "tar -cvzf ". TMP_DIR . $filename ." ". implode( " ", $archive );

  /*
   * Try and execute command
   */
  try {
    exec($shell); // Run shell command to create the zip archive
  } catch (Exception $e) {
    echo "Failed to ZIP archive the folder(s): " . $e->getMessage() . "\n";
  }
?>