
@extends('layouts.app')

<div class="col-md-6">

	<form class="form-horizontal" action="{{ route('task.update') }}" method="POST" id="edit_form">
			{{ csrf_field() }}
		<div class="form-group">
		  <label class="control-label col-sm-2 col-md-offset-2" for="email">Task Name</label>
		  <div class="col-sm-8">
		    <input type="text" class="form-control" id="name" placeholder="Task Name" name="name" value="{{ $task->name }}" required="required" />
		  </div>
		</div>

		<div class="form-group">
		  <label class="control-label col-sm-2 col-md-offset-2" for="email">Task Description</label>
		  <div class="col-sm-8">
		    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Task Description" required="required">{{ $task->description }}</textarea>
		    <input type="hidden" name="id" value="{{ $task->id }}">
		  </div>
		</div>
		
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-8">
		    <!-- <button type="submit" class="btn btn-primary" onClick="$.fancybox.close();">Update</button> -->
			<input type="submit" name="submit" class="btn btn-primary" value="Update" >
		  </div>
		</div>
	</form>

</div>