<?php

include '../../class/customers.php';
$cus = $_POST['cus'];
$ap = new CustomerModel();
if($cus == ''){
    echo "<select name='customer_appointment' id='customer_appointment'>
    <option value='2' >walk-in<option>
</select>";
}else{
$rs = $ap->getByName($cus);
echo "<select name='customer_appointment' id='customer_appointment'>";
foreach ($rs as $key=> $value) {
    echo "<option>".$value[2]."&nbsp" .$value[4]."&nbsp" .$value[5]."</option>";
}
echo "</select>";
}
?>