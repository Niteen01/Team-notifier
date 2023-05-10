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

  public function  select($table, $columns = '*', $where = '')
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
	// $desc = $_POST['desc'];
	// 	$newtask = $_POST['new-task'];
	// 	$tag = $_POST['tag'];
	// 	$deadline = $_POST['deadline'];
	// 	$time = $_POST['time'];

	// public function Insert()
	// {	
		
	// 	mysqli_query($this->conn , "INSERT INTO `lists`(`title`, `tag`, `date`, `time`, `description`) VALUES ('$newtask','$tag','$deadline','$time','$desc')");

	// }

	// public function close()
	// {
	// 	$this->conn->close();
	// }

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

// Usage example:
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_task = $_POST['new-task'];
    $tag = $_POST['tag'];
    $deadline = $_POST['deadline'];
    $reminder = $_POST['reminder'];
    $description = $_POST['description'];

    $data = array(
        'new_task' => $new_task,
        'tag' => $tag,
        'deadline' => $deadline,
        'reminder' => $reminder,
        'description' => $description
    );

    $db->insert('lists', $data);
}





$lists = $db->select('lists', '*', 'progress = 0');

foreach ($lists as $list) {
	echo $list['title'] . ' - ' . $list['tag'] .$list['date'] .$list['time'] . $list['description'] . '<br>';
}

$db->mysqli_close();

?>
