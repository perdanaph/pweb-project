<?php 
require_once("db.php");

//koneksi database
$db = new mysqli(HOST,USERNAME,PASSWORD,DB);
if($db->connect_error){
    http_response_code(500);
    die("Connection failed: {$db->connection_error}");
}

//ambil data dari database
$query = " SELECT * FROM jenis_makanan";
$sql = $db->query($query);
$data = [];
while ($row = $sql->fetch_assoc()){
    array_push($data,$row);
};
header("Content-Type: application/json");
echo json_encode($data);
