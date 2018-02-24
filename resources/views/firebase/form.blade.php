@extends("common.default")
@section("content")

	{!! Form::open(array("url"=>url("notify"),"method"=>"POST",
	"class"=>"form ")) !!}

	<input type="text" name="image" placeholder="Image URL" class="form-control"><br>
	<input type="text" name="title" placeholder="Title of Notification" class="form-control"><br>
	<textarea type="text" name="body" placeholder="Message Body"
	class="form-control" 
	></textarea><br>
	<input type="submit" name="" class="btn btn-primary">
	{!! Form::close() !!}

@stop