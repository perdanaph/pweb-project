<?php

require_once ('./db.php');

class Food
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(HOST, USERNAME, PASSWORD, DB);
        if ($this->db->connect_error) {
            http_response_code(500);
            die("Koneksi Gagal: {$this->db->connect_error}");
        }
    }

    function read()
    {
        sleep(2);
        $start = isset($_GET['start']) ? $_GET['start'] : 0; // variabel start akan mengambil data dari veriabel $_GET['start']
        // isset untuk melakukan pengecekan apakah ada variabel $_GET['start'] jika ada maka $_GET['start'] akan diambil jika tidak ada maka $_GET['start'] akan diset ke 0
        $query = "SELECT * FROM film ORDER BY title ASC LIMIT {$start}, 12"; // query untuk mengambil data dari database
        $sql = $this->db->query($query); //variabel $sql digunakan untuk mengirim query (perintah) dari variabel $query ke database
        $data = []; //list penampung
        // Lakukan looping untuk setiap baris dari database yang diambil
        while ($row = $sql->fetch_assoc()) // pada lopping hasil query yang didapat dari variabel $sql dimasukkan kedalam varibel $row dan diubah kedalam list assosiatif melalui method fetch_assoc.
        {
            if (file_exists("./assets/{$row['film_id']}.jpg")){
                // Melakukan pengecekan jika ada file dengan berdasarkan film_id dari database
                $row['thumbnail'] = "./assets/{$row['film_id']}.jpg";
            } else{
                $row['thumbnail'] = "./assets/noimage.jpg";
            }
            array_push($data, $row); 
            //hasil list asosiatif dimasukkan kedalam list penampung yaitu pada list variabel $data.
        }

        // mengkonversi list asosiatif kedalam json agar dapat dibaca oleh program saat menggunakan asyc
        header("Content-Type: application/json"); 
        //untuk memberi tahu jenis data yang diterima
        echo json_encode($data); 
        //mencetak hasil dalam bentuk json.
    }
}