<?php
include '../../class/appointments.php';
include '../../class/services.php';
$staff = $_POST['staff'];
$service = $_POST['service'];
$start = $_POST['start'];
$end = $_POST['end'];
$cus = $_POST['cus'];
$appointment = new AppointmentModel();
$services = new ServiceModel();
$rs1=$services->getServiceByID($service);
foreach ($rs1 as $key1=> $value1) {
    $total = $value1[3];
}
$rs=$appointment->getMaxID();
foreach ($rs as $key=> $value) {
    $max = $value[0];
}
$max=$max+1;
$ap=array("id"=>$max,"staff"=>$staff,"ser"=>$service,"start"=>$start,"end"=>$end,"cus"=>$cus,"total"=>$total);
$rs1=$appointment->insert($ap);
?>