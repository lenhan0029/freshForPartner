<?php
    include "./class/staff.php";
    include "./class/services.php";
?>
<div class="newappointment">
    <div class="newappointment_title">
        <h3>New appointment</h3>
        <button><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="newappointment_content">
        <div class="calendar-pickday calendar-filter-item">
            <?php
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
            $next_date = date('Y-m-d', strtotime($date .' +1 day'));
            ?>
            <div class="calendar-pickday-item"><a href="?page=newappointment&prev=1&date=<?=$prev_date;?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
            <div class="calendar-pickday-item"><a href="?page=newappointment&today=1&date=<?=$date;?>">Today</a></div>
            <input type='text' class="calendar-pickday-item" id="appointmentday" value="<?php
                    // $mydate=getdate(date("U"));
                    // echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                    if(isset($_GET['prev'])){
                        echo $prev_date;
                    }else if(isset($_GET['next'])){
                        echo $next_date;
                    }else{
                        echo $date;
                    }
                ?>"/>
            <div class="calendar-pickday-item"><a href="?page=newappointment&next=1&date=<?=$next_date;?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
        </div>
        <div class="newappointment_detail">
            <div class="newappointment_detail_left">
                <div class="left_area">
                    <div class="newappointment_detail_staff">
                        <h5>Staff</h5>
                        <select name="staff_item" id="staff_item">
                            <?php
                                $staff = new StaffModel();
                                $list = $staff->getStaffByStoreID(1);
                                foreach ($list as $key=> $value) {
                                    echo "<option value=". $value[0].">". $value[4] . $value[3] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="newappointment_starttime">
                        <h5>Starttime</h5>
                        <select name="starttime_item" id="starttime_item">
                            <?php
                                for($i=0;$i<=23;$i++)
                                {
                                    echo "<option value=". $i.">". $i .":00</option>";
                                }
                            ?>
                        </select>
                    </div>
                    
                </div>
                <div class="right_area">
                    <div class="newapointment_detail_service">
                        <h5>Services</h5>
                        <select name="service_item" id="service_item">
                            <?php
                                $ser = new ServiceModel();
                                $list = $ser->getServiceByStoreID(1);
                                foreach ($list as $key=> $value) {
                                    echo "<option value=". $value[0].">". $value[2] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="newappointment_endtime">
                        <h5>Endtime</h5>
                        <select name="endtime_item" id="endtime_item">
                            <?php
                                for($i=0;$i<=23;$i++)
                                {
                                    echo "<option value=". $i.">". $i .":00</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
            </div>
            
            <div class="newappointment_detail_right">
                <div class="search_area">
                    <input type="search" name="customer" id="customer" onkeyup="searchCustomer()">
                    <i class='fa fa-search'></i>
                </div>
                <div class="search_customer" id="search_customer">
                    <select name='customer_appointment' id='customer_appointment'>
                        <option value="2" >walk-in<option>
                    </select>
                </div>
            </div>
        </div>
        <div class="area_confirm">
            <button onclick="addNewAppointment()">new appointment</button>
        </div>
    </div>
</div>