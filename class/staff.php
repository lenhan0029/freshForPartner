<?php
class StaffModel extends Database {

    public function __construct() {
        parent::connect();
    }

    public function getAll() {
        $conn = parent::connect();
        $sql = "SELECT * FROM staffs";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }

    public function getStaffByStoreID($storeid){
        $conn = parent::connect();
        $sql = "SELECT * FROM staffs WHERE store_id='$storeid'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        return $data;
    }
    
    public function getStaffWorkingByID($id){
        $conn = parent::connect();
        $sql = "SELECT * FROM staff_working WHERE updated_at=(SELECT MAX(updated_at) FROM staff_working WHERE staff_id=$id)";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        if(!isset($data)){
            return 1;
        }
        return $data;
    }
    public function getStaffAppointmentByID($id){
        $conn = parent::connect();
        $sql = "SELECT * FROM appointments WHERE staff_id='$id'";
        $result = mysqli_query($conn,$sql);
        // $data[] = [];
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        if(!isset($data)){
            return 1;
        }
        return $data;
    
    }
    public function getStaffAppointmentByIDAndTime($id, $time){
        $conn = parent::connect();
        $sql = "SELECT * FROM appointments WHERE staff_id='$id' AND HOUR(start_time)=$time";
        $result = mysqli_query($conn,$sql);
        // $data[] = [];
        while($row = mysqli_fetch_array($result)){
           $data[] = $row;
        }
        if(!isset($data)){
            return 1;
        }
        return $data;
    }
}