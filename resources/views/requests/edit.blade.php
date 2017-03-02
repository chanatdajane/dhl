@extends('app')
@section('title', 'จัดการข้อมูล')
@section('topic', 'จัดการข้อมูล')

@section('content')
{!! Form::open(array('url' => 'requests/save','files'=>true)) !!}
		<?php echo Form::text('ID',$requests[0]['ID'], array('style' => 'display:none')); ?>
		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Firstname</label>
			  	<input class="form-control" type="text" placeholder="Firstname" id="Firstname" name="Firstname" required value="<?php echo $requests[0]['Firstname'] ?>">
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Lastname</label>
			  	<input class="form-control" type="text" placeholder="Lastname" id="Lastname" name="Lastname" required value="<?php echo $requests[0]['Lastname'] ?>">
		  	</div>
		  	<div class="col-xs-2">
			  	<label class="topic-head" for="name">Nickname</label>
			  	<input class="form-control" type="text" placeholder="Nickname" id="Nickname" name="Nickname" required value="<?php echo $requests[0]['Nickname'] ?>">
		  	</div>
		</div>

		<div style="clear:both"><br>

		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Position</label>
			  	<input class="form-control" type="text" placeholder="Position" id="Position" name="Position" required value="<?php echo $requests[0]['Position'] ?>">
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Department</label>
			  	<input class="form-control" type="text" placeholder="Department" id="Department" name="Department" required value="<?php echo $requests[0]['Department'] ?>">
			</div>
		</div>
		
		<div style="clear:both"><br>

		<div class="form-group">
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Location</label>
			  	<input class="form-control" type="text" placeholder="Location" id="Location" name="Location" required value="<?php echo $requests[0]['Location'] ?>">
			</div>
			<div class="col-xs-5">
			  	<label class="topic-head" for="name">Year of service</label>
			  	<input class="form-control" type="text" placeholder="Year of service" id="yearservice" name="yearservice" required value="<?php echo $requests[0]['yearservice'] ?>">
			</div>
		</div>

		<div style="clear:both"><br>
		<div class="form-group request_choice">
		  	<label class="topic-head">What you may know about me</label> </br>
		  	<div class="request_choice_part">
		  	<br>
			  	<label class="col-xs-1 col-form-label" for="request_choice"></label>
			</div>
			<?php foreach($requests['requests_choice'] as $key=>$value){ ?>
				<div class="request_choice_part">
			  	<br>
				  	<label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-minus removerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label>
				  	<div class="col-xs-1" style="width: 1%;margin-top: 5px;">
						<label><?php echo ($key+1); ?>)</label>
					</div>
				  	<div class="col-xs-7">
						<input class="form-control" type="text" name="choice_name[<?php echo $key; ?>]" value="<?php echo $value['name'] ?>">
					</div>
					
				</div><br><br>
			<?php } ?>
		</div>
		<div style="clear:both">
		<label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-plus addmorerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label>
		<div style="clear:both"><br>

		<div style="clear:both"><br>

		{!! Form::submit('Update', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/requests') }}" class="btn btn-danger">Cancel</a>

{!! Form::close() !!}

<script type="text/javascript">
	var i = <?php echo count($requests['requests_choice']); ?>;
    $('.addmorerequest_choice').click(function(){
    	$('.request_choice').append('<div class="request_choice_part"><label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-minus removerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label><div class="col-xs-1" style="width: 1%;margin-top: 5px;"><label>'+(i+1)+')</label></div><div class="col-xs-7"><input class="form-control" type="text" name="choice_name['+i+']"></div></div><br><br>');
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

</style>
@endsection