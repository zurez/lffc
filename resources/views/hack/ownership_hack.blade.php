@extends("common.default")
@section("content")
 <div class="row">
 	<div class="col-sm-12">
 		<table id="ownership_hack" class="table">
 			<thead>
 				<tr>
	 				<th>Serial No.</th>
	 				<th>Type</th>
	 				<th>Category</th>
	 				<th>Reported Count</th>
	 				<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($shacks as $hack)
 					
 					@if(!empty($hack))
 					<tr>
 						<td>{{$hack->serial_number}}</td>
 						<td>{{$hack->hack_type}}</td>
 						<td>{{$hack->category}}</td>
 						<td>{{count($hack->reported_hacks)}}</td>
 						<td><a href="{{url("hack/edit",$hack->_id)}}" target="_blank">Edit</a></td>
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