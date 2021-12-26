<?php 
	$staffs = (new StaffModel())->getAll();
	if (isset($_GET['query'])) {
		# code...
		$query = $_GET['query'];
		if ($query != '') {
			foreach ($staffs as $key => $value) {  
				if (strtolower($staffs[$key]['first_name']) != strtolower($query)) {
					# code...
					unset($staffs[$key]);
				}
			}
		}
		else{
			$staffs = (new StaffModel())->getAll();
		}
		
	}
	else {
		$staffs = (new StaffModel())->getAll();
	}
?>
<div class="members-tools">
	<div class="search-member">
		<input  type="text" id= "search" name="search-staff" placeholder="Search by name or title">
	</div>
	<div onclick="pushToURL();" class="btn btn-Search">Search</div>
	<div class="member-control">
		<a href="./pages/staff/content/addStaff.php">
			<div class="btn btn-Add">Add staff</div>
		</a>
	</div>
</div>
<div class="members-list" id="members-list">
	<?php 
		if (count($staffs) > 0) {
			# code...
			foreach ($staffs as $key => $value) { 
				# code...
				echo "
					<div class='member-container'>
						<div class='member-icon'>
							<i class='fas fa-user-alt'></i>
						</div>
						<div class='member-name'>
							<p class='name'>".$staffs[$key]['first_name']." ".$staffs[$key]['last_name']."</p>
						</div>
						<div class='contact-list'>
							<ul>
								<li class='email'>
									<a href='mailto:".$staffs[$key]['email']."'>".$staffs[$key]['email']."</a>
								</li>
								<li class='phone'>
									<a href='tel:".$staffs[$key]['phone']."'>".$staffs[$key]['phone']."</a>
								</li>
							</ul>
						</div>
					</div>
				";
			}
		}
	?>
	
</div>
<script type="text/javascript">
	function pushToURL() {
		var query = document.getElementById('search').value;
		location.href = "?page=staff&nav=staff-members&query=" + query;
		javascript:void(0);
	}
</script>