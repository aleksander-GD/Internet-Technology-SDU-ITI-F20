<?php

require_once 'db_config.php';

class Database extends DB_Config
{
	public $conn;
	private $charset = "utf8";
	private $options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	public function __construct()
	{
		$dsn = 'mysql:host=' . $this->db_hostname . ';dbname=' . $this->db_name . ';charset=' . $this->charset;

		try {
			$this->conn = new PDO($dsn, $this->db_username, $this->db_password, $this->options);

			if ($this->conn == null) {
				echo 'no connection to database, pdoconnection is null';
				return false;
			}

			return $this->conn;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			echo "ERROR";
		}
	}
	public function __destruct()
	{
		$this->conn = null;
    }
    
    public function getBooksPublishersAuthors() {

        $sql = "SELECT a.author_name, b.book_title, p.publisher_name
                FROM author a, book b, publisher p
                WHERE a.author_id=b.author_id
                AND p.publisher_id=b.publisher_id ";

        $prepare_statement = $this->conn->prepare($sql);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();

        return $query_result;
    }
}