<?php include 'db_connect.php' ?>

<?php
$fs = $conn->query("SELECT o.*,fs.art_id,fs.price,a.artist_id,a.art_title FROM orders o inner join arts_fs fs on fs.id = o.art_fs_id inner join arts a on fs.art_id = a.id where o.id = ".$_GET['id']);
foreach($fs->fetch_array() as $k => $v){
    $$k = $v;
}
$user = $conn->query("SELECT * FROM users where id IN ($artist_id,$customer_id)");
while($row = $user->fetch_assoc()){
    $urow[$row['id']] = $row;
}

?>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <p>Cusromer Name: <b><?php echo ucwords($urow[$customer_id]['name']) ?></b></p>
                <p>Cusromer Address: <b><?php echo $urow[$customer_id]['address'] ?></b></p>
                <p>Cusromer Contact #: <b><?php echo $urow[$customer_id]['contact'] ?></b></p>
            </div>
            <div class="col-lg-6">
                <p>Order: <b><?php echo ucwords($art_title." of ".$urow[$artist_id]['name']) ?></b></p>
                <p>Selling Price: <b><?php echo number_format($price,2) ?></b></p>
            </div>
        </div>
        <form action="" id="manage-order">
            <input type="hidden" name="order_id" value="<?php echo  $id ?>">
            <input type="hidden" name="fs_id" value="<?php echo  $art_fs_id ?>">
            <div class="row form-group">
                <div class="col-md-6">
                    <label for="" class="control-label">Status</label>
                    <select name="status" id="" class="custom-select">
                        <option value="0" <?php echo $status == 0 ? "selected" : '' ?>>For Verification</option>
                        <option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Confirmed</option>
                        <option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Cancelled</option>
                        <?php if(in_array($status,array(1,3))): ?>
                        <option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Delivered</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-6" <?php echo (!in_array($status,array(1,3))) ? "style='display:none'" : ''  ?>>
                    <label for="" class="control-label">Delivery Date</label>
                    <input type="date" name="deliver_schedule" id="" class="form-control" value="<?php echo isset($deliver_schedule) ? date("Y-m-d",strtotime(($deliver_schedule))) : '' ?>">
                </div>
            </div>
            
        </form>
    </div>
</div>
<div class="modal-footer display">
    <div class="col-lg-12">
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary float-right mr-2" id='submit' onclick="$('#uni_modal form').submit()">Update</button>
    </div>
</div>
<style>
#uni_modal .modal-footer{
    display:none;
}
.display{
    display:block !important;
}
</style>
<script>
    $('[name="status"]').change(function(){
        if($(this).val() == 1 || $(this).val() == 3){
            $('[name="deliver_schedule"]').parent().show()
        }else{
            $('[name="deliver_schedule"]').parent().hide()
        }
    })
    $('#manage-order').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=update_order',
            method:"POST",
            data:$(this).serialize(),
            success:function(resp){
                if(resp == 1){
                    alert_toast("Order successfully updated","success")
                    setTimeout(function(){
                        location.reload()
                    },1500)
                }
            }
        })
    })
</script>