@extends('layouts.app')

@section('content')

@section('after_js')
<script>
    var trashUrl = "{{ route('task.delete', '') }}";
</script>

<div class="col-md-8 col-md-offset-2">
	<div class="well">
		<h1 style="text-align: center;">Task List</h1>
	</div>
</div>

<div class="col-md-8 col-md-offset-2">
	@include('_partials.alert')
</div>

<div class="col-md-6 col-md-offset-2">

	@include('_partials.modal')

	<form class="form-horizontal" action="{{ route('task.store') }}" method="POST" id="entry_form">
		{{ csrf_field() }}
		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Task Name</label>
		  <div class="col-sm-8">
		    <input type="text" class="form-control" id="name" placeholder="Task Name" name="name" required="required" />
		  </div>
		</div>

		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Task Description</label>
		  <div class="col-sm-8">
		    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Task Description" required="required"></textarea>
		  </div>
		</div>
		
		<div class="form-group">        
		  <div class="col-sm-offset-4 col-sm-8">
		    <button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</div>
	</form>
</div>


<div class="col-md-8 col-md-offset-2">

	@if($tasks)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Created At</th>
					<th>Operation</th>
				</tr>
			</thead>

			<tbody>
				@foreach($tasks as $task)
				<tr>
					<td>{{ $task->name }}</td>
					<td>{{ $task->description }}</td>
					<td>{{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</td>
					<td>
						<a class="btn btn-link edit" data-fancybox-type="iframe" href="{{url('task/edit',$task->id) }}">Edit</a>

						<a href="javascript:void(0);" data-id="{{ $task->id }}" class="trashCTRL">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

</div>	

@endsection