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
				width: 700px;
			}
			.accordion{
				padding: 0px;
			}
			.accordion>p{
				background: #ccc;
				color: #333;
				padding: 0 0px;
				line-height: 26px;
				/* margin-top: 5px; */
			}
			.accordion>p.active{
				background: blue;
				color: #fff;
			}
			.accordion>p em{
				/* margin-right: 10px; */
			}
			.accordion>div, .accordion>ul{
				/* border: 1px solid blue; */
				display: none;
			}
			.accordion>ul{
				list-style: none;
			}
			.accordion>ul li{
				/* padding: 0 10px; */
				line-height: 26px;
			}
		</style>
	</head>
	<body>
		<div class="wrap">
			<div class="accordion">
				<p><em class="iconfont icon-add"></em>流程记录</p>
				<div id="another"class="accordion content">
                @foreach(json_decode($need->records,true) as $index=>$record)   <!--字符串转数组后不能直接赋值，只能拿来遍历 -->
                    @if(is_array($record))
                    <h4 style="color:gray">{{$index}}</h4>
                    <h5 style="color:gray">推送人：{{$record['sendby']}} 处理人：{{$record['doby']}}</h5>
                    <h5 style="color:gray">问题描述：{{$record['description']}}</h5>
                    <h5 style="color:gray">图片：{{$record['picurl']}}</h5>
                    <h5 style="color:gray">创建时间：{{$record['starttime']}}</h5>  <!--这里由于时间格式抛出过异常 -->
                    <h5 style="color:gray">结束时间：{{$record['endtime']}}</h5>
                    @endif
                @endforeach
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript">
			$("#another").click(function(){
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
