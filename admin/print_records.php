<?php include('db_connect.php');?>
<style type="text/css">
	table{
		width:100%;
		border-collapse:collapse;
	}
	tr,td,th{
		border:1px solid black;
	}
	.text-center{
		text-align: center
	}
	.text-right{
		text-align: right
	}
</style>
<?php
session_start();
$from = isset($_POST['from']) ? date('Y-m-d',strtotime($_POST['from'])) :date('Y-m-d', strtotime(date('Y-m-1'))); 
$to = isset($_POST['to']) ? date('Y-m-d',strtotime($_POST['to'])) :date('Y-m-d', strtotime(date('Y-m-1')." +1 month - 1 day"));
?>
<h3 class="text-center"><b>Records as of (<?php echo date("M d,Y",strtotime($from)).' - '.date("M d,Y",strtotime($to)) ?>)</b></p>
<hr>
<table>
	<colgroup>
		<col width="2%">
		<col width="10%">
		<col width="10%">
		<col width="15%">
		<col width="20%">
		<col width="15%">
		<col width="10%">
	</colgroup>
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th class="">Date</th>
			<th class="">Tracking ID</th>
			<th class="">Name</th>
			<th class="">Address</th>
			<th class="">Establishment</th>
			<th class="">Temperature</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
		$ewhere='';
		if($_SESSION['login_establishment_id'] > 0)
			$ewhere = " and t.establishment_id = '".$_SESSION['login_establishment_id']."' ";
		$tracks = $conn->query("SELECT t.*,concat(p.lastname,', ',p.firstname,' ',p.middlename) as name, concat(p.address,', ',p.street,', ',p.baranggay,', ',p.city,', ',p.state,', ',p.zip_code) as caddress,e.name as ename,p.tracking_id FROM person_tracks t inner join persons p on p.id = t.person_id inner join establishments e on e.id = t.establishment_id where date(t.date_created) between '$from' and '$to' $ewhere order by t.id desc");
		while($row=$tracks->fetch_assoc()):
		?>
		<tr>
			
			<td class="text-center"><?php echo $i++ ?></td>
			<td class="">
				 <p> <b><?php echo date("M d,Y h:i A",strtotime($row['date_created'])) ?></b></p>
			</td>
			<td class="">
				 <p> <b><?php echo $row['tracking_id'] ?></b></p>
			</td>
			<td class="">
				 <p> <b><?php echo ucwords($row['name']) ?></b></p>
			</td>
			<td class="">
				 <p> <b><?php echo $row['caddress'] ?></b></p>
			</td>
			<td class="">
				 <p> <b><?php echo ucwords($row['ename']) ?></b></p>
			</td>
			<td class="text-right">
				 <p> <b><?php echo $row['temperature'] ?>&#730;</b></p>
			</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
