<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Room Request</h3>
		<div class="card-tools">
			<!-- <a href="?page=appointment/manage_appointment" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a> -->
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="10%">
					<col width="25%">
					<col width="30%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>For</th>
						<th>Schedule</th>
						<th>Requested By</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT r.*, t.id, brgy.brgyDesc, city.citymunDesc, prov.provDesc from `room_request` r inner join `rooms` t on r.room_type_id = t.id left join
refbrgy as brgy on r.address = brgy.brgyCode left join refcitymun as city on brgy.citymunCode= city.citymunCode left join refprovince as prov on city.provCode=prov.provCode order by FIELD(r.status,0,1,2) asc, unix_timestamp(r.`date_created`) asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo date("M d,Y",strtotime($row['schedule'])) ?></td>
							<td>
								<?php echo $row['Lname'].", ".$row['Fname']." ".$row['Mname']; ?><br>
								<small><?php echo $row['contact'] ?></small> <br>
								<small class="truncate" title="<?php echo strtoupper($row['brgyDesc'].", ".$row['citymunDesc'].", ".$row['provDesc']); ?>"><?php echo strtoupper($row['brgyDesc'].", ".$row['citymunDesc'].", ".$row['provDesc']); ?></small>
							</td>
							
							<td>
								<p class="m-0 truncate"><?php echo $row['email'] ?></p>
							</td>
<br>
							<td>
								<p class="m-0 truncate">Qty. of Chairs = <?php echo $row['chairs'] ?> <br>Qty. of Cloth = <?php echo $row['table_cloth'] ?></p>
							</td>
						
							<td class="text-center">
								<?php if($row['status'] == 1): ?>
									<span class="badge badge-success">Confirmed</span>
								<?php elseif($row['status'] == 2): ?>
									<span class="badge badge-danger">Cancelled</span>
								<?php else: ?>
									<span class="badge badge-primary">Pending</span>
								<?php endif; ?>
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item print_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-print text-info"></span> Print</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Room Request permanently?","delete_room_request",[$(this).attr('data-id')])
		})
		$('.edit_data').click(function(){
			uni_modal("Manage Room Request","room_request/manage_room_request.php?id="+$(this).attr('data-id'),'mid-large')
		})

		$('.print_data').click(function(){
			window.open("room_request/print.php?id="+$(this).attr('data-id'),"_blank");
		})
		$('.table th, .table td').addClass("py-1 px-1 align-middle");
		$('.table').dataTable();
	})
	function delete_room_request($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_room_request",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>