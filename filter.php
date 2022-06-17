<?php

require_once("db.php");

$namaJenis = ["Appetizer", "main Course", "Dessert"];
$db = new mysqli(HOST,USERNAME,PASSWORD,DB);
if($db->connect_error){
    http_response_code(500);
    die("Connection failed: {$this->db->connection_error}");
}

if (isset($_GET["typing"])) {
    $search = $_GET["typing"];
} elseif (!isset($_GET["typing"])) {
    $search = "";
}
if (isset($_GET["jenis"])) {
    $jenis = $_GET["jenis"];
} elseif (!isset($_GET["jenis"])) {
    $jenis = "";
}
$searchfilter = "/($search)/i";
$jenisfilter = "/^($jenis)$/i";

$data = [];
if ( strlen($jenis) <= 0) :
    if (strlen($search) <= 0) :
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $query = " SELECT * FROM makanan ORDER BY nama_makanan LIMIT {$start}, 6";
        $sql = $db->query($query);
        $data = [];
        while ($row = $sql->fetch_assoc()){
            array_push($data, $row);
        }
    elseif (strlen($search) > 0):
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $query = "SELECT * FROM makanan ORDER BY nama_makanan";
        $sql = $db->query($query);
        $data = [];
        while ($row = $sql->fetch_assoc()){
            if ((preg_match($searchfilter, $row["nama_makanan"])) == !null ):
                array_push($data, $row);
            endif;
        }
    endif;

elseif( strlen($jenis) > 0 ) :
    $start = isset($_GET['start']) ? $_GET['start'] : 0;
    $query = " SELECT * FROM makanan ORDER BY nama_makanan";
    $sql = $db->query($query);
    while ($row = $sql->fetch_assoc()){
        if ((preg_match($jenisfilter, $row["jenis_id"])) == !null ):
            array_push($data, $row);
        endif;
    }
endif;

foreach ($data as $value) :?>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-services">
            <div class="card-services-img">
                <img src="./assets/images/menu-1.jpg" class="card-img-top" alt="Menu-1" />
            </div>
            <div class="card-body">
                <h5 class="card-title"><? $value["nama_makanan"]?></h5>
                <p class="card-text">Cocok untuk makanan penutup.. <a href="#"> more details</a></p>
            </div>
            <div class="card-footer">
                <small>Jenis : <? $namaJenis[($data["jenis_id"])-1] ?> </small>
                <button type="button" class="fa-solid fa-pen-to-square fa-lg btn edit-btn mb-2 mt-2"></button>
                <button type="button" class="fa-solid fa-trash fa-lg btn delete-btn  mb-2 mt-2"></button>
            </div>
        </div>
    </div>
<?php endforeach; ?>

