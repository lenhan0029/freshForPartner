<<<<<<< HEAD
<?php
include '../../connection.php';


class ServiceModel extends Database {

    public function __construct() {
        parent::connect();
    }
    
    public function getAll() {
        $conn = parent::connect();
        $sql = "SELECT * FROM customer";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
    public function getInfoByID($cusid) {
        $conn = parent::connect();
        $sql = "SELECT * FROM customer WHERE customer_id='$cusid'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
=======
<?php
include '../../connection.php';


class CustomerModel extends Database {

    public function __construct() {
        parent::connect();
    }
    
    public function getAll() {
        $conn = parent::connect();
        $sql = "SELECT * FROM customer";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
    public function getInfoByID($cusid) {
        $conn = parent::connect();
        $sql = "SELECT * FROM customer WHERE customer_id='$cusid'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
    public function getByName($name){
        $conn = parent::connect();
        $sql = "SELECT * FROM customer WHERE last_name like '%$name%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
>>>>>>> 316b73a1408f4b8018e2ef5d2d3da49b38a82227
}