<?php
include '../../connection.php';


class AppointmentModel extends Database {

    public function __construct() {
        parent::connect();
    }

    public function getAll() {
        $conn = parent::connect();
        $sql = "SELECT * FROM appointments";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }

    public function getStaffByCustomerID($cusid){
        $conn = parent::connect();
        $sql = "SELECT * FROM appointments WHERE customer_id='$cusid'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        if($data==[]){
            return 1;
        }
        return $data;
    }
    public function insert($ap) {
        $conn = parent::connect();
        $sql1 = "INSERT INTO appointments VALUES('".$ap['id']."','".$ap['cus']."',
                                         '1','".$ap['staff']."',
                                         '".$ap['start']."','".$ap['end']."','".$ap['total']."','','','')";
        $result1 = mysqli_query($conn, $sql1);
        $sql2 = "INSERT INTO appointment_detail VALUES('".$ap['ser']."','".$ap['id']."',
                                        '','','')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result1){
            echo"<script>alert('Thêm thành công');</script>";
          
        }
        else {
            echo $result1;
        }
    }
    public function getMaxID(){
        $conn = parent::connect();
        $sql = "SELECT MAX(id) FROM appointments";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }
}