<?php
/*
 * Utility routines for MySQL.
 */

class MySQL_class {
	var $db, $id, $result, $rows, $data, $a_rows;
	var $user, $pass, $host;

	/* Make sure you change the USERNAME and PASSWORD to your name and
	 * password for the DB
	 */



	function Create () {
		if (!$this->user) {
			# Set this to your default username
			$this->user = "_jovanbosman";
		}
		if (!$this->pass) {
			# Set this to your default password
			$this->pass = "378f54c9381c2391898ca5578b707361";
		}
		if (!$this->host) {
			# Set this to your default database host
			$this->host = "localhost:3306";
		}
		if (!$this->db) {
			# Set this to your default database
			$this->db = "jovanbosman";
		}
		$this->id = @mysql_pconnect($this->host, $this->user, $this->pass) or
			MySQL_ErrorMsg("Unable to connect to MySQL server: $this->host : '$SERVER_NAME'");
		$this->selectdb($this->db);
	}

	function SelectDB ($db) {
		@mysql_select_db($db, $this->id) or
			MySQL_ErrorMsg ("Unable to select database: $db");
	}

	# Use this function is the query will return multiple rows.  Use the Fetch
	# routine to loop through those rows.
	function Query ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform query: $query");
		$this->rows = @mysql_num_rows($this->result);
		$this->a_rows = @mysql_affected_rows($this->id);
	}

	# Use this function if the query will only return a
	# single data element.
	function QueryItem ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform query: $query");
		$this->rows = @mysql_num_rows($this->result);
		$this->a_rows = @mysql_affected_rows($this->id);
		$this->data = @mysql_fetch_array($this->result) or
			MySQL_ErrorMsg ("Unable to fetch data from query: $query");
		return($this->data[0]);
	}

	# This function is useful if the query will only return a
	# single row.
	function QueryRow ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform query: $query");
		$this->rows = @mysql_num_rows($this->result);
		$this->a_rows = @mysql_affected_rows($this->id);
		$this->data = @mysql_fetch_array($this->result) or
			MySQL_ErrorMsg ("Unable to fetch data from query: $query");
		return($this->data);
	}

	function Fetch ($row) {
		@mysql_data_seek($this->result, $row) or
			MySQL_ErrorMsg ("Unable to seek data row: $row");
		$this->data = @mysql_fetch_array($this->result) or
			MySQL_ErrorMsg ("Unable to fetch row: $row");
	}

	function Insert ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform insert: $query");
		$this->a_rows = @mysql_affected_rows($this->id);
	}

	function InsertID () {
		return mysql_insert_id();
	}

	function Update ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform update: $query");
		$this->a_rows = @mysql_affected_rows($this->id);
	}

	function Delete ($query) {
		$this->result = @mysql_query($query, $this->id) or
			MySQL_ErrorMsg ("Unable to perform Delete: $query");
		$this->a_rows = @mysql_affected_rows($this->id);
	}
}

/* ********************************************************************
 * MySQL_ErrorMsg
 *
 * Print out an MySQL error message
 *
 */

function MySQL_ErrorMsg ($msg) {
	# Close out a bunch of HTML constructs which might prevent
	# the HTML page from displaying the error text.
	echo("</ul></dl></ol>\n");
	echo("</table></script>\n");
	# Display the error message
	$text  = "<EM class=error>";
	$text .= "You have a database error. Check the SQL syntax: <BR>";
	$text .= "</EM>\n" . mysql_error();
	
	die($text);
}


?>