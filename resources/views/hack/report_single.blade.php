@extends("common.default")
@section("content")
 <div class="row">
 	<div class="col-sm-12">
 		<table id="ownership_hack" class="table">
 			<thead>
 				<tr>
	 				<th>Report Reason</th>
	 				<th>User's Name</th>
	 				<th>Reported On</th>
	 				
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($shacks as $shack)
 					<?php 
 						if (empty($shack->reason)) {
 							$title="NA";
 						}else{
 							$title=$shack->reason->title;
 						}
 						if (empty($shack)) {
 							$created_on="NA";
 						}else{
 							$created_on=$shack->created_at;
 						}
 						if (empty($shack->user)) {
 							$user="NA";
 						}else{
 							$title=$shack->user->name;
 						}
 					?>
 					@if(!empty($shack))
 					<tr>
 						<td>{{$title}}</td>
 						<td>{{$user}}</td>
 						<td>{{$created_on}}</td>
 						
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