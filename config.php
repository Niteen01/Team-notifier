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

  public function select($table, $columns = '*', $where = '')
	{
		$sql = "SELECT $columns FROM $table";

		if (!empty($where)) {
			$sql .= " WHERE $where";
		}

		$result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
			$rows = array();

			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}

			return $rows;
		} else {
			return null;
		}
	}

	public function close()
	{
		$this->conn->close();
	}

}

// Usage example:
$db = new Database();
$lists = $db->select('lists', '*', 'progress = 0');

foreach ($lists as $list) {
	echo $list['title'] . ' - ' . $list['tag'] .$list['date'] .$list['time'] . $list['description'] . '<br>';
}

$db->close();

?>

