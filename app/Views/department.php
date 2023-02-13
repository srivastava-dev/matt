
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Group</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Upload Excel</span>
				</a> -->
			</div>

		
    <?php //var_dump($result);?>
			<a href="group_add" class="btn">Add Group</a>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Add Group</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($result as $r)
							{
							?>
							<tr>
								<td>
									<?php echo $r[ "Name"];
									?>
								</td>
							
								<td><a href="upload/<?php echo $r['Id'];?>" class="btn"  class="btn">Upload Excel</a>
								<a href="editinfo/<?php echo $r['Id'];?>" class="btn"  class="btn">View Uploaded Records</a>
							</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>