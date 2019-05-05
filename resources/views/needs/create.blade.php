@extends('layouts.default')
@section('title', '新建需求')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="alert alert-success">
      <h5 >需求详情</h5>
    </div>
      <div class="panel-body">

        @include('shared._errors')
        <form method="POST" action="{{ route('needs.store')}}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="program">项目名：</label>
              <input type="text" name="program" class="form-control">
            </div>
            <div class="form-group">
              <label for="game">游戏名：</label>
              <input type="text" name="game" class="form-control">
            </div>
            <div class="form-group">
              <label for="name">需求名：</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="process">流程设计：</label>
              <textarea id="process" class="form-control" rows="3" placeholder="" name="process" ></textarea>
              
                <select id="belong" class="form-group" name="belong">
                    <option value="服务器">服务器</option>
                    <option value="客户端">客户端</option>
                    <option value="平台">平台</option>
                    <option value="测试">测试</option>
                    <option value="策划">策划</option>
                    <option value="其他">其他</option>
                </select>               
                <button id="add" type="button" class="btn btn-primary">添加部门</button>
                <button id="more" type="button" class="btn btn-primary">/</button>
                <button id="next" type="button" class="btn btn-primary">→</button>
                      
            </div>
            <div class="form-group">
              <label for="doby">处理人：</label>
              <select  class="form-group" name="doby">
                  @foreach($users as $user)
                      <option>{{$user->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="description">描述：</label>
              <textarea class="form-control" rows="3" placeholder="此处添加问题的描述..." name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="picurl">图片：</label>
              <textarea class="form-control" rows="3" placeholder="点击添加图片..." name="picurl"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
  </div>
</div>
<script>
window.onload = function(){  
    var process=$("#process").val();
    $("#add").click(function(){
        process+=$("#belong").val();
        $("#process").val(process);
    });
    $("#more").click(function(){
        process+="/";
        $("#process").val(process);
    });
    $("#next").click(function(){
        process+=" → ";
        $("#process").val(process);
    });
}   
</script>
@stop