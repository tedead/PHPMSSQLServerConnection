<?php

class SqlConnection
{
	public static function connectWithCreds($server, $database, $user, $password)
	{
		$connectionInfo = array( "Database"=>"$database", "UID"=>"$user", "PWD"=>"$password");
		return sqlsrv_connect($server, $connectionInfo);
	}
}

?>