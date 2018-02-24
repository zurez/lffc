<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	{!! Form::open(array("url"=>url("notify"),"method"=>"POST")) !!}
	<input type="text" name="image" placeholder="Image URL"><br>
	<input type="text" name="title" placeholder="Title of Notification"><br>
	<input type="text" name="body" placeholder="Message Body"><br>
	<input type="submit" name="">
	{!! Form::close() !!}
</div>
</body>
</html>