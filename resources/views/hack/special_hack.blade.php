@extends("common.default")
@section("content")
 <div class="row">
 	<div class="col-sm-12">
 		<table id="special_hack" class="table">
 			<thead>
 				<tr>
	 				<th>Serial No.</th>
	 				<th>Event</th>
	 				<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($shacks as $sh)
 					
 					@if(!empty($sh->hack))
 					<tr>
 						<td>{{$sh->hack->serial_number}}</td>
 						<td>{{$sh->event}}</td>
 						<td><a href="{{url("hack/edit",$sh->hack->_id)}}" target="_blank">Edit</a></td>
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
		$("#special_hack").DataTable();
	});
</script>
@stop