<?php
    include "./class/staff.php";
?>

<div class="calendar-content">
    <div class="calendar-filter">
        <select class="calendar-filter-item">
            <option>Working staff</option>
        </select>
        <div class="calendar-pickday calendar-filter-item">
            <?php
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
            $next_date = date('Y-m-d', strtotime($date .' +1 day'));
            ?>
            <div class="calendar-pickday-item"><a href="?page=calendar&prev=1&date=<?=$prev_date;?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
            <div class="calendar-pickday-item"><a href="?page=calendar&today=1&date=<?=$date;?>">Today</a></div>
            <div class="calendar-pickday-item" id="day">
            <?php
                    // $mydate=getdate(date("U"));
                    // echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                    if(isset($_GET['prev'])){
                        echo $prev_date;
                    }else if(isset($_GET['next'])){
                        echo $next_date;
                    }else{
                        echo $date;
                    }
                ?>
            </div>
            <div class="calendar-pickday-item"><a href="?page=calendar&next=1&date=<?=$next_date;?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
        </div>
        <select class="calendar-filter-item">
            <option>ADD</option>
            <option>New Appointment</option>
        </select>
    </div>
    
    <div class="calendar-table">
        <table class="table table-fixed">
            <thead class="thead-dark">
                <tr>
                <th class='cell' scope="col" disabled>#</th>
        <?php
            $staff = new StaffModel;
            $list = $staff->getStaffByStoreID(1);
            $sl=0;
            foreach ($list as $key=> $value) {
                $sl=$sl+1;
                echo "<th class='minimal-width cell' scope='col'>" . $value[3] . "</th>";
            }
        
            
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                
            for($i=0;$i<=23;$i++){
                    
                echo "<tr>";
                echo "<th class='table-cell cell' scope='col'>" . $i . ":00" . "</th>";
                foreach ($list as $key2=> $value2)
                {
                    $list1 = $staff->getStaffAppointmentByIDAndTime($value2[0],$i);
                    if($list1==1){
                        $working = $staff->getStaffWorkingByID($value2[0]);
                        if($working==1){
                            echo "<th class='table-cell cell no-working minimal-width' scope='col' style='background-color: rgb(20, 203, 203);'></th>";
                        }else{
                        foreach ($working as $key4=> $value4){
                            $ds = DateTime::createFromFormat("Y-m-d H:i:s", $value4[2]);
                            $de = DateTime::createFromFormat("Y-m-d H:i:s", $value4[3]);
                            $start = $ds->format('H');
                            $end = $de->format('H');
                            if($i<$start || $i>$end){
                                echo "<th class='table-cell cell no-working minimal-width' scope='col' style='background-color: rgb(20, 203, 203);' ></th>";
                            }else{
                                echo "<th class='table-cell cell minimal-width' scope='col'><a href='?page=newappointment&id=". $value2[0] ."&time=". $i ."'>có làm</a></th>";
                            }
                        }
                        }
                    }else{
                        foreach ($list1 as $key3=> $value3){
                        echo "<th class='table-cell cell minimal-width' scope='col'><a href='?page=detailappointment&id=". $value2[0] ."&time=". $i ."'>".$value3[4]."</a></th>";
                    }
                }
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>