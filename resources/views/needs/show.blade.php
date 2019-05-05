@extends('layouts.default')
@section('title', '需求详情')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="alert alert-success">需求详情</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div>
                    <span class="content" >
                        <p style="color:green;font-size:25px">{{ $need->program}}---{{ $need->game}}---{{ $need->name}}</p>
                        <p style="color:green;font-size:15px"> 流      程：{{$need->process}}</p>
                        <p style="color:green;font-size:15px"> 创  建  人：{{$need->createby}} </p>
                        <p style="color:green;font-size:15px"> 创建时间：{{$need->starttime}}</p>
                        <h4 style="color:red;font-size:25px">正在执行：</h4>
                        <p style="color:red"><em>推送人：{{$need->sendby}} </em> <em style="margin-left:20px;">处理人：{{$need->doby}}</em></p>
                        <p style="color:red">描述：{{$need->description}}</p>
                        <p style="color:red">图片：{{$need->pic_url}}</p>
                        <p id="timer"style="color:red">0</p>
                        <script>
                        var time=0;
                        setInterval(() => {
                            time++;
                           $("#timer").text(time);    
                        }, 1000);
                        </script>
                        
                    </span>
                    @include('needs._record')
                    @include('needs._operator')

                </div>
            </div>
        </div>
    </div>
</div>
@stop