<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1dmht87fc8dm42t9.css" />
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			.wrap{
				width: 500px;
			}
			.accordion{
				padding: 0px;
			}
			.accordion>p{
				background: #ccc;
				color: #333;
				padding: 0 0px;
				line-height: 26px;
				margin-top: 5px;
			}
			.accordion>p.active{
				background: blue;
				color: #fff;
			}
			.accordion>p em{
				margin-right: 10px;
			}
			.accordion>div, .accordion>ul{
				/* border: 1px solid blue; */
				display: none;
			}
			.accordion>ul{
				list-style: none;
			}
			.accordion>ul li{
				padding: 0 10px;
				line-height: 26px;
			}
		</style>
	</head>
	<body>
		<div class="wrap">
			<div class="accordion">
				<p><em class="iconfont icon-add"></em>进行操作</p>
				<div class="accordion content">
                    <form method="POST" action="{{ route('needs.update', $need->id )}}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="doby">操作类型：</label>
                            <input type="radio" value="0" name="tuidong" checked>推动
                            <input type="radio" value="1" name="tuidong">协助
                            <input type="radio" value="2" name="tuidong">拒绝
                        </div>
                        <div class="form-group">
                            <label for="doby">执行人：</label>
                            <select  class="form-group" name="doby">
                                @foreach($users as $user)
                                    <option>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">问题描述：</label>
                            <textarea class="form-control" rows="3" placeholder="此处添加问题的描述..." name="description"></textarea>
                        </div>
                            <div class="form-group">
                            <label for="picurl">截图：</label>
                            <textarea class="form-control" rows="3" placeholder="点击添加图片..." name="picurl"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript">
			$(".accordion>p").click(function(){
				if($(this).hasClass("active")){
					$(this).find("em").removeClass("icon-jian").addClass("icon-add");
					$(this).removeClass("active").next().slideUp();
				}
				else{
					$(this).find("em").removeClass("icon-add").addClass("icon-jian");
					$(this).addClass("active").next().slideDown();
				}
			});
		</script>
	</body>
</html>
