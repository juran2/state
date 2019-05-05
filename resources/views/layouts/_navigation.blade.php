<nav class="navbar navbar-default" role="navigation">
	<div>
		<ul class="nav navbar-nav" style="margin-left:240px;">
		@if(Auth::check())
			<!-- <li><a href="">聊天记录(假的)</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					其他
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">没有了</a></li>
				</ul>
			</li> -->
			<li><a style="" href="#">占个位置</a></li>
		@else
			<li ><a>你还没有登陆了</a></li>
		@endif
		</ul>
	</div>
	</div>
</nav>