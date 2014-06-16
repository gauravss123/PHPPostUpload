PHPPostUpload
=============
A script written in php to upload files to a server.
Contains 5 files as of now (will be reduced)
1. upload_forms.php
   Contains the form to select and start uploading files. Also contains the PHP script for moving files from temporary location to a permanent      storage
2. upload.php
   Calculates the % of data transferred, using the PHP's session upload facility (http://www.php.net//manual/en/session.upload-progress.php)
3. upload2.php
   PHP script to return the array in $_SESSION global variable containing the status of update.

4. upload3.php
   PHP script to return names of files uploaded successfully or not (returning the error description as well)

5. script.js
   Makes ajax requests to upload.php,upload2.php,upload3.php to display values
