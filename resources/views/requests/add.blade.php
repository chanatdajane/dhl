@extends('app')
@section('title', 'จัดการข้อมูล')
@section('topic', 'จัดการข้อมูล')

@section('content')
{!! Form::open(array('url' => 'requests/save','files'=>true)) !!}
		<div class="form-group col-xs-6">
			<label class="control-label">Photo</label>
			<input id="Photo" name="Photo" type="file" class="file" data-show-upload="false" data-show-caption="true">
		</div><div style="clear:both"><br>
		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="staffID">Staff ID</label>
			  	<input class="form-control" type="text" placeholder="Staff ID" id="staffID" name="staffID" required>
			</div>
		</div><div style="clear:both"><br>
		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Firstname</label>
			  	<input class="form-control" type="text" placeholder="Firstname" id="Firstname" name="Firstname" required>
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Lastname</label>
			  	<input class="form-control" type="text" placeholder="Lastname" id="Lastname" name="Lastname" required>
		  	</div>
		  	<div class="col-xs-2">
			  	<label class="topic-head" for="name">Nickname</label>
			  	<input class="form-control" type="text" placeholder="Nickname" id="Nickname" name="Nickname" required>
		  	</div>
		</div>

		<div style="clear:both"><br>

		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Position</label>
			  	<input class="form-control" type="text" placeholder="Position" id="Position" name="Position" required>
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Department</label>
			  	<input class="form-control" type="text" placeholder="Department" id="Department" name="Department" required>
			</div>
		</div>
		
		<div style="clear:both"><br>

		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Location</label>
			  	<input class="form-control" type="text" placeholder="Location" id="Location" name="Location" required>
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Year of service</label>
			  	<input class="form-control" type="text" placeholder="Year of service" id="yearservice" name="yearservice" required>
			</div>
		</div>
		
		<div style="clear:both"><br>
		<div class="form-group request_choice">
		  	<label class="topic-head">What you may know about me</label> </br>
		  	<div class="request_choice_part">
		  	<br>
			  	<label class="col-xs-1 col-form-label" for="request_choice"></label>
			  	<div class="col-xs-1" style="width: 1%;margin-top: 5px;">
					<label>1)</label>
				</div>
			  	<div class="col-xs-7">
					<input class="form-control" type="text" name="choice_name[0]">
				</div>
				
			</div><br><br>
		</div>
		<div style="clear:both">
		<label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-plus addmorerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label>
		
		<div style="clear:both"><br>
		<!-- <button class="submitrequest btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/requests') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	var i = 1;
    $('.addmorerequest_choice').click(function(){
    	$('.request_choice').append('<div class="request_choice_part"><label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-minus removerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label><div class="col-xs-1" style="width: 1%;margin-top: 5px;"><label>'+(i+1)+')</label></div><div class="col-xs-7"><input class="form-control" type="text" name="choice_name['+i+']"></div></div></div><br><br>');
    	$('.removerequest_choice').click(function(){
	    	$(this).parent().parent().remove();
	    });
	    i++;
    });

    $('.removerequest_choice').click(function(){
    	$(this).parent().parent().remove();
    });


</script>
<style type="text/css">
	input[type=checkbox]
	{
	  zoom: 1.5;
	  margin-left: 5px;
	}
	.topic-head{
		font-weight: bold;
	}

</style>
@endsection