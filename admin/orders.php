<?php include('db_connect.php');?>

<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Order</b>
						<span class="">

							<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_art_fs">
					<i class="fa fa-plus"></i> New</button>
				</span>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Cavas Information</th>
									<th class="">Customer</th>
									<th class="">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$users = $conn->query("SELECT * FROM users ");
								while($row = $users->fetch_assoc()){
									$uname[$row['id']] = ucwords($row['name']);
								}
								$arts = $conn->query("SELECT * FROM arts ");
								while($row = $arts->fetch_assoc()){
									$art_arr[$row['id']] = $row;
								}
								$fs = $conn->query("SELECT o.*,fs.art_id FROM orders o inner join arts_fs fs on fs.id = o.art_fs_id order by o.id desc ");
								while($row=$fs->fetch_assoc()):
									
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p>Title: <b><?php echo ucwords($art_arr[$row['art_id']]['art_title']) ?></b></p>
										 <p><small>Artist: <b><?php echo ucwords($uname[$art_arr[$row['art_id']]['artist_id']]) ?></b></small></p>
										 <p><small>Description:</small></p>
									</td>
									<td class="text-right">
										 <p> <b><?php echo  ucwords($uname[$row['customer_id']]) ?></b></p>
									</td>
									<td class="text-center">
										 <?php if($row['status'] == 0): ?>
										 	<span class="badge badge-secondary">For Verification</span>
										 <?php elseif($row['status'] == 1): ?>
										 	<span class="badge badge-primary">Confirmed</span>
										<?php elseif($row['status'] == 2): ?>
										 	<span class="badge badge-danger">Cancelled</span>
										<?php elseif($row['status'] == 3): ?>
										 	<span class="badge badge-success">Deliverd</span>
										 <?php endif; ?>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_art_fs" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
										<?php if(in_array($row['status'],array(0,2))): ?>
										<button class="btn btn-sm btn-outline-danger delete_art_fs" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										 <?php endif; ?>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_art_fs').click(function(){
		uni_modal("New Entry","manage_art_fs.php")
	})
	
	$('.edit_art_fs').click(function(){
		uni_modal("Order Details","manage_order.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_art_fs').click(function(){
		_conf("Are you sure to delete this Person?","delete_art_fs",[$(this).attr('data-id')])
	})

	function delete_art_fs($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_order',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>