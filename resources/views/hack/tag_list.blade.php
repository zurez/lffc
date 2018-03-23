@extends("common.default")
@section("content")
 <div class="row">
 	<div class="col-sm-12">
 		<a class="pull-right btn btn-primary" href="{{url("tag/new")}}" target="_blank">
 			Add New Tag
 		</a>
 	</div>
 </div>
 <div class="row">
 	<div class="col-sm-12">
 		<table id="ownership_hack" class="table">
 			<thead>
 				<tr>
	 				<th>Title</th>
	 				
	 				
	 				
	 				<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($tags as $tag)
 					
 					@if(!empty($tag))
 					<tr>
 						<td>{{$tag->tag}}</td>
 						
 						
 						<td>--</td>
 					</tr>
 					@endif
 				@endforeach
 			</tbody>
 		</table>
 	</div>
 </div>
@stop
@section("script")
<script type="text/javascript">
	$(document).ready(function(){
		$("#ownership_hack").DataTable();
	});
</script>
@stop