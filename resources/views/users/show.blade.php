@extends('layouts.default')
@section('title', '$user->name')
@section('content')
<div class="col-md-offset-2 col-md-8">
  <a class="btn btn-success" href="{{route('needs.create')}}">发布需求</a>
  <div class="panel panel-default">
    <div class="alert alert-success">
      <h5>与我相关</h5>
    </div>
    <div class="panel-body"> 
    @if (count($dobys) > 0)
        <ol class="statuses">
          @foreach ($dobys as $need)
            @include('needs._need')
          @endforeach
        </ol>      
    @endif 
    </div>
  </div>
  <div class="panel panel-default">
    <div class="alert alert-success">
      <h5>我发布的</h5>
    </div>
    <div class="panel-body"> 
    @if (count($sendbys) > 0)
        <ol class="statuses">
          @foreach ($sendbys as $need)
            @include('needs._need')
          @endforeach
        </ol>      
    @endif  
    </div>
  </div>
  <div class="panel panel-default">
    <div class="alert alert-success">
      <h5>所有需求</h5>
    </div>
    <div class="panel-body">  
    @if (count($needs) > 0)
        <ol class="statuses">
          @foreach ($needs as $need)
            @include('needs._need')
          @endforeach
        </ol>      
    @endif  
    </div>
  </div>
</div>
@stop