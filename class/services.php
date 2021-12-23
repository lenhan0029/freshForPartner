<?php
include '../../connection.php';


class ServiceModel extends Database {

    public function __construct() {
        parent::connect();
    }
    
    public function getAll() {
        $conn = parent::connect();
        $sql = "SELECT * FROM services";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }

    public function getServiceByStoreID($storeid){
        $conn = parent::connect();
        $sql = "SELECT * FROM services WHERE store_id='$storeid'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        return $data;
    }
}