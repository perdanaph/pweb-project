<?php 
require_once("db.php");

class Makanan
{
    private $db;

    function __construct()
    {
        //koneksi database
        $this->db = new mysqli(HOST,USERNAME,PASSWORD,DB);
        if($this->db->connect_error){
            http_response_code(500);
            die("Connection failed: {$this->db->connection_error}");
        }
    }
    
    function __destruct()
    {
        $this->db->close();
    }

    function read()
    {
        //ambil data dari database

        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $query = " SELECT * FROM makanan ORDER BY nama_makanan LIMIT {$start}, 6";
        $sql = $this->db->query($query);
        $data = [];
        while ($row = $sql->fetch_assoc()){
            array_push($data, $row);
        }

        //tampilkan data dalam format JSON
        header("Content-Type: application/json");
        echo json_encode($data);
    }

}

$makanan = new Makanan();
$makanan->read();


