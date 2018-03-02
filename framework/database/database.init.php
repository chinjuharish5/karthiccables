<?php

class Database {
	private $host, $dbUsername, $dbPassword, $dbName;
	public $conn;
	
	public function __construct($host, $dbUsername, $dbPassword, $dbName) {
		$this->host = $host;
		$this->username = $dbUsername;
		$this->password = $dbPassword;
		$this->dbName = $dbName;
		$this->connect();
	}
	
	public function connect(){
		
		$conn = @mysqli_connect( $this->host, $this->username, $this->password, $this->dbName );
		if (mysqli_connect_error()) {
			throw new Exception ( "Unable to connect!". mysqli_connect_errno() );
		}
		
		if (!mysqli_select_db ( $conn, $this->dbName )) {
			throw new Exception ( "Invalid database!" );
		}
		$this->connection = $conn;
	}
	
	public function executeQuery($query) {
		try {
			$results = @mysqli_query ( $this->connection, $query );
			if (! $results) {
				throw new Exception ( "Error in query " . $query );
			}
			return $results;
		} catch ( Exception $ex ) {
			$resultSet = @mysqli_query($this->connection, 'SHOW FULL PROCESSLIST');
			var_export($resultSet,true);
		}
	}	
	
	public function fetchQuery($query) {
		try {
			$results = @mysqli_query ( $this->connection, $query );
			if($results->num_rows > 0) {
				//return mysqli_fetch_assoc($results);
				return mysqli_fetch_all($results,MYSQLI_ASSOC);
			} 
			return array();
			//return $results;
		} catch ( Exception $ex ) {
			$resultSet = @mysqli_query($this->connection, 'SHOW FULL PROCESSLIST');
			var_export($resultSet,true);
		}
	}		
	
	public function getLastInsertId() {
		return @mysqli_insert_id($this->connection);
	}
}