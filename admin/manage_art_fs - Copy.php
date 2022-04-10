<?php include 'db_connect.php' ?>
<?php
session_start();
if(isset($_GET['id'])){
$qry = $conn->query("SELECT fs.*,a.art_title,a.art_description,u.name as aname from arts_fs fs inner join arts a on a.id = fs.art_id inner join users u on u.id = a.artist_id  where fs.id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage-art_fs">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
		<div class="form-group">
			<label for="" class="control-label">Arts</label>
			<select name="art_id" id="art_id" class="custom-select select2">
				<option value=""></option>
				<?php  
					$arts = $conn->query("SELECT a.*,u.name as aname FROM arts a inner join users u on u.id = a.artist_id where a.id not in (SELECT art_id FROM arts_fs ".(isset($id) ? " where id != $id " : "")." ) ");
					while($row = $arts->fetch_assoc()):
				?>
					<option value="<?php echo $row['id'] ?>" <?php echo isset($art_id) ? ($art_id == $row['id'] ? "selected" : "disabled") : '' ?>><?php echo ucwords($row['art_title'] . ' of '. $row['aname']) ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Price</label>
			<input type="number" class="form-control text-right" name="price"  value="<?php echo isset($price) ? $price :'' ?>" required>
		</div>
		<?php if(isset($id)): ?>
			<div class="form-group">
				<label for="" class="control-label">Status</label>
				<select class="custom-select" name="status">
					<option value="0">For Sale</option>
					<option value="1">Sold</option>
				</select>
			</div>
		<?php endif; ?>
		
	</form>
</div>
<script>
	$(".select2").select2({
		placeholder:"Please select here",
		width:'100%'
	})
	$('#manage-art_fs').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_art_fs',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				resp=JSON.parse(resp)
				if(resp.status==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				
			}
		})
	})
</script>