@extends('app')
@section('title', 'จัดการข้อมูล')
@section('topic', 'จัดการข้อมูล')
@section('content')

				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" requestsholder="Search">
					</div>
				</form>
				<a href="{{ url('/requests/add') }}" class="btn btn-primary">เพิ่มข้อมูล</a>
				<?php if(count($requests) > 0){ ?>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th>ตำแหน่ง</th>
					    <th>แผนก</th>
					    <th>เพิ่มโดย</th>
					    <th>Qr code</th>
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($requests as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['Firstname']." ".$value['Lastname'] ?></td> 
					    <td><?php echo $value['Position'] ?></td>
					    <td><?php echo $value['Department'] ?></td>
					    <td><?php echo $value['user'] ?></td> 
					    <td><a onclick="showqr(<?php echo $value['ID'] ?>)">view qrcode</a></td>
					    <td style="text-align:center;"><a href="{{ url('/requests/edit') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/requests/delete') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
					  </tr>
					  <div class="qrimg" id="qrimg-<?php echo $value['ID']; ?>" style="display:none;position: fixed;top: 50%;left: 50%;margin-top: -126px;margin-left: -126px;"><?php echo DNS2D::getBarcodeSVG('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."/qrcode/".$value['ID'], "QRCODE",12,12); ?>
					  <?php $i++;} ?>
				</table>
				<?php }else{ ?>
					
				<?php } ?> 
<div class="dimscreen"></div>
<script type="text/javascript">
	function showqr(id){
		$('#qrimg-'+id).show("slow");
		$('.dimscreen').show();
	}
	$('.dimscreen').on('click',function(){
		$('.qrimg').hide("slow");
		$('.dimscreen').hide();
	});
</script>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.qrimg{
	position: fixed;
    top:30px;
    left:30px;
    width:252px;
    height:250px;
    background-color:#fff;
    opacity:1;
    z-index:1002;
}
.dimscreen{
	display: none;
	position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
    background-color:#fff;
    opacity:0.8;
    z-index:1001;
}
</style>

@endsection
