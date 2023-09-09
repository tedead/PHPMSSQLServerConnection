<?php

/*
To get MS SQL drivers set up:

Download the SQL drivers from https://learn.microsoft.com/en-us/iis/application-frameworks/install-and-configure-php-on-iis/install-the-sql-server-driver-for-php
My PHP is 8.0.26 with Thread Safety enabled.
 
So I put these into my 8.0.26 php.ini file
	extension=php_sqlsrv_80_ts_x64.dll
	extension=php_pdo_sqlsrv_80_ts_x64.dll

I also added these to the apache php.ini file, then refreshed (restarted) everything.
*/

	include "sqlServer.php";
	
	$server = "xxx";
	$database = "xxx"; 
	$user = "xxx";
	$password = "xxx";
	
	try
	{
		$sqlServer = new SqlConnection();
	
		$conn = $sqlServer::connectWithCreds($server, $database, $user, $password);
	
		if($conn) 
		{
			$sql = "INSERT INTO PHPUsersTest(UserName, Password, FirstName, LastName, Email, ActiveInd) SELECT 'test', 'test', 'test', 'test', 'test@test.net', 1";
			//$params = array(1, "some data");

			$stmt = sqlsrv_query($conn, $sql);
			
			if($stmt === false) 
			{		
				die( print_r( sqlsrv_errors(), true)); 
			}
			else
			{
				echo "Test user successfully inserted.<br />";
			}
		}
		else
		{
			echo "Connection could not be established.<br />";
			die( print_r( sqlsrv_errors(), true));
		}
	}
	catch (Exception $e)
	{
		echo 'Error: ' . $e->getMessage();
	}
?>