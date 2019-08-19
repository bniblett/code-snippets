<?php
  // Our access token from the Dropbox App Panel
  $accessToken = 'YOUR_DROPBOX_ACCESS_TOKEN';

  /*
   * Backup Options
   *
   */
  $tmpDir = "/home/php/temp_dir/";        // Location of your temp directory
  $user = "DB_USER";                      // Usernamefor database
  $password = "DB_PASSWORD";              // Password for database
  $dbName = "DB_NAME";    // Database name to backup
  $dbHost = "DB_HOST";    // Hostname or IP address where database resides (localhost or xxx.xxx.xxx.xxx)
  $prefix = "db_"; // The compressed file will have this prefix

  // Create the database backup file
  $sqlFile = $tmpDir.$prefix.date('Y_m_d_H:i:s').".sql";  // Name of the .sql file we create for the database
  $backupFilename = $prefix.date('Y_m_d_H:i:s').".tgz";   // Name of the .tgz backup file we upload to Dropbox
  $backupFile = $tmpDir.$backupFilename;  // Path to the backup file in the temp directory

  // Shell commands for generating the .sql and .tgz files
  $createBackup = "mysqldump -h ".$dbHost." -u ".$user." --password=".$password." ".$dbName." --> ".$sqlFile;      // Shell command to create the .sql file for MySQl
  $createZip = "tar -cvzf $backupFile $sqlFile";  // Shell command to create the backup file we upload to Dropbox

  try {
          exec($createBackup);    // Run shell command to create the .sql file
          exec($createZip);       // Run shell command to create the .tgz file
  } catch (Exception $e) {
          echo "Failed to create CRM DB Backup or ZIP: " . $e->getMessage() . "\n";
  }
