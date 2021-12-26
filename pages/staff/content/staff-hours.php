<?php 
	//get Staffs from PHP push to JS
	$staffs = (new StaffModel())->getAll();
	$staffs_working = (new StaffModel());
	echo "
	<script type='text/javascript'>
		const staffs = [];
		const staffs_working = [];
	";
	for ($i=0; $i < count($staffs); $i++) { 
        # code...
        $working_temp = $staffs_working->getStaffWorkingByID($staffs[$i]['id']);
        echo "
        staffs.push(".json_encode($staffs[$i]).");
        ";
        if ($working_temp == 1) {
        	# code...
        }
        else {
	        for ($i=0; $i < count($working_temp); $i++) { 
	        	# code...
	        	echo "staffs_working.push(".json_encode($working_temp[$i]).");";
	        }//cần coi lại
    	}
    }
    echo "</script>";
?>
<div class='hours-tools'>
	<div class="staff-options">
		<select id="staff">
			
		</select>
	</div>
	<div class="date-time">
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
	</div>
</div>
<div class="schedule-wrapper">
	<div class="schedule-table">
		<div class="schedule-staff">
			<table class="employee-table">
				<thead>
					<tr style="height: 40px;">
						<th>Staff</th>
						<th>Mon 27 Dec</th>
						<th>Tuesday 28 Dec</th>
						<th>Wednesday 29 Dec</th>
						<th>Thursday 30 Dec</th>
						<th>Friday 31 Dec</th>
						<th>Saturday 1 Jan</th>
						<th>Sunday 2 Jan</th>
					</tr>
				</thead>
				<tbody>
					<tr style="height: 40px;">
						<td class="employee-name">
							<div class="name">Thinh</div>
							<small>9h</small>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-16:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours"></div>
						</td>
					</tr>
					<tr style="height: 40px;">
						<td class="employee-name">
							<div class="name">Son</div>
							<small>9h</small>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours">10:00-17:00</div>
						</td>
						<td class="employee-hours">
							<div class="hours"></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Staffs arrays is variable staffs
	var staff_select = document.getElementById('staff');
	const optionEl = document.createElement("option");
	optionEl.innerHTML = "All staffs";
	optionEl.value="All staffs";
	staff_select.appendChild(optionEl);
	//show option of staff
	for (var i = staffs.length - 1; i >= 0; i--) {
		const optionEl = document.createElement("option");
		optionEl.innerHTML = staffs[i]['3'];
		optionEl.value=staffs[i]['0'];
		staff_select.appendChild(optionEl);
	}
</script>