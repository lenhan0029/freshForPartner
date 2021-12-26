<?php 
	include "./class/staff.php";
?>
<div class="staff-container">
	<div class="staff-nav">
		<ul>
		<?php 
			if(isset($_GET['nav'])) {
				$nav = $_GET['nav'];
				if ($nav == "staff-hours") {
					echo "
								<li>
									<a class= 'active' href='?page=staff&nav=staff-hours'>
										Staff working hours
									</a>
								</li>
								<li>
									<a href='?page=staff&nav=staff-members'>
										Staff working members
									</a>
								</li>
							</ul>
						</div>
						<div class='line'></div>
						<div class='staff-content'>";
						include_once("./pages/staff/content/staff-hours.php");
						echo "</div>";
				}
				else{
					echo "		
								<li>
									<a href='?page=staff&nav=staff-hours'>
										Staff working hours
									</a>
								</li>
								<li>
									<a class= 'active' href='?page=staff&nav=staff-members'>
										Staff working members
									</a>
								</li>
							</ul>
						</div>
						<div class='line'></div>
						<div class='staff-content'>";
						include_once("./pages/staff/content/staff-members.php");
						echo "</div>";
				}
			}
			else{
				echo "
							<li>
								<a class= 'active' href='?page=staff&nav=staff-hours'>
									Staff working hours
								</a>
							</li>
							<li>
									<a href='?page=staff&nav=staff-members'>
										Staff working members
									</a>
							</li>
						</ul>
					</div>
					<div class='line'></div>
					<div class='staff-content'>";
					include_once("./pages/staff/content/staff-hours.php");
					echo "</div>";
			}
				
		?>
</div>