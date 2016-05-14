<?php

	$toDay = date('d-m-Y');

    $dbhost =   "localhost";
    $dbuser =   "root";
    $dbpass =   "sasabenitez";
    $dbname =   "mega";

    exec("mysqldump --user=$dbuser --password=$dbpass --host=$dbhost $dbname > latest_DB.sql");
    // exec("mysqldump --user=$dbuser --password=$dbpass --host=$dbhost $dbname > ".$toDay."_DB.sql");

echo('<meta http-equiv="refresh" content="0;URL=main.php"/>');
?>