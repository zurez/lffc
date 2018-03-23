@extends("common.default")
@section("content")
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    {!! Form::open(array("url"=>url("tag/new"),"method"=>"POST",
    "class"=>"form ")) !!}
    <input type="text" name="tag" placeholder="Title"  class="form-control"><br>

    <input type="submit" name="" class="btn btn-primary" value="Save Tag">
    {!! Form::close() !!}

@stop