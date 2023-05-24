<?php

// MySQL connection settings
class Database{
  private $host = 'localhost';
  private $username = 'root';
  private $password = 'root';
  private $database = 'teamnotifierdb';
  private  $conn;
 

  public function __construct()
	{
		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}
	public function getPrivateVariable() {
        return $this->conn;
	}


  public function  select($table, $columns = '*', $where = '')
	{
		 $sql = "SELECT $columns FROM $table";

		if (!empty($where)) {
			$sql .= " WHERE $where";
		}

		$result = mysqli_query($this->conn,$sql);

		if ($result->num_rows > 0) {
			return $result;
		} else {
			return null;
		}
	}
	
	public function close()
	{
		$this->conn->close();
	}

	public function insert($table, $data)
    {
        $keys = array_keys($data);
        $values = array_map(array($this->conn, 'real_escape_string'), array_values($data));
        $sql = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES ('" . implode("','", $values) . "')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}


?>
