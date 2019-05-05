@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>注册</h5>
    </div>
    <div class="panel-body">
    @include('shared._errors')
      <form method="POST" action="{{ route('users.store') }}">
      {{ csrf_field() }}
          <div class="form-group">
            <label for="name">名字：</label>
            <input type="text" name="name" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="belong">部门：</label>
            <select class="form-group" name="belong">
                <option value="服务器">服务器</option>
                <option value="客户端">客户端</option>
                <option value="平台">平台</option>
                <option value="测试">测试</option>
                <option value="策划">策划</option>              
            </select>
          </div>
          
          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="">
          </div>

          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="">
          </div>

          <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" value="">
          </div>

          <button type="submit" class="btn btn-primary">注册</button>
      </form>
    </div>
  </div>
</div>
@stop