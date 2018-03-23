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
	 				<th>Report Count</th>
	 				<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($shacks as $shack)
 					
 					@if(!empty($shack))
 					<tr>
 						<td>{{$shack->hack->serial_number}}</td>
 						<td>{{$shack->hack->hack_type}}</td>
 						<td>{{$shack->hack->category}}</td>
 						<td>
	 						<a href="{{url("hack/report/single",$shack->hack->_id)}}" target="_blank">
	 						{{$shack->count}}
	 						</a>
 						</td>
 						<td><a href="{{url("hack/edit",$shack->hack->_id)}}" target="_blank">Edit</a>
 						<a href="{{url("hack/resolve",$shack->hack->_id)}}" target="_blank">Resolve</a>
 						<a href="{{url("hack/report/view",$shack->hack->_id)}}" target="_blank">View</a>
 						</td>
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