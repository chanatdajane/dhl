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
					    <td style="text-align:center;"><a href="{{ url('/requests/edit') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/requests/delete') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
					  </tr>
					  <?php $i++;} ?>
				</table>
				<?php }else{ ?>
					
				<?php } ?> 

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
</style>

@endsection
